<?php

// --- HIDING DATA ---
function hideDataInImage($imagePath, $dataToHide, $outputImagePath) {
    // 1. Load the image
    $image = imagecreatefrompng($imagePath); // Use PNG for better LSB integrity

    if (!$image) {
        die("Error: Could not load image from $imagePath");
    }

    $width = imagesx($image);
    $height = imagesy($image);

    // Convert data to a binary string
    $binaryData = '';
    foreach (str_split($dataToHide) as $char) {
        $binaryData .= str_pad(decbin(ord($char)), 8, '0', STR_PAD_LEFT);
    }

    // Add a null terminator or magic number to signify end of data (important for extraction)
    $binaryData .= str_repeat('0', 8 * 3); // Example: 3 null bytes (24 zeros) as end marker

    $dataIndex = 0;
    $dataLength = strlen($binaryData);

    // 3. Iterate through pixels
    for ($y = 0; $y < $height; $y++) {
        for ($x = 0; $x < $width; $x++) {
            if ($dataIndex >= $dataLength) {
                // All data embedded
                break 2; // Break out of both loops
            }

            // 4. Extract RGB Components
            $rgb = imagecolorat($image, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;

            // 5. Embed Data into LSBs (using Blue channel for simplicity)
            // Get the bit to embed
            $bitToEmbed = (int)$binaryData[$dataIndex];

            // Change the LSB of the Blue channel
            // If current LSB is different from bitToEmbed, adjust the channel value
            if (($b % 2) != $bitToEmbed) { // Check if LSB is odd (1) or even (0)
                if ($bitToEmbed == 1) {
                    $b++; // Make it odd
                } else {
                    $b--; // Make it even
                }
            }

            // Ensure color channel stays within valid range (0-255)
            $b = max(0, min(255, $b));

            // Create new color and set pixel
            $newColor = imagecolorallocate($image, $r, $g, $b);
            imagesetpixel($image, $x, $y, $newColor);

            $dataIndex++;
        }
    }

    // 6. Save the Modified Image
    imagepng($image, $outputImagePath);
    imagedestroy($image);

    return true;
}

// --- EXTRACTING DATA (Conceptual) ---
function extractDataFromImage($imagePath) {
    $image = imagecreatefrompng($imagePath);

    if (!$image) {
        die("Error: Could not load image from $imagePath");
    }

    $width = imagesx($image);
    $height = imagesy($image);

    $extractedBinaryData = '';
    $endMarkerLength = 8 * 3; // Length of our end marker (3 null bytes)
    $currentNullBytes = 0;

    for ($y = 0; $y < $height; $y++) {
        for ($x = 0; $x < $width; $x++) {
            $rgb = imagecolorat($image, $x, $y);
            $b = $rgb & 0xFF; // Get Blue channel

            // Extract the LSB of the Blue channel
            $extractedBit = $b % 2;
            $extractedBinaryData .= $extractedBit;

            // Check for end marker
            if (substr($extractedBinaryData, -$endMarkerLength) === str_repeat('0', $endMarkerLength)) {
                // Found the end marker, trim it off
                $extractedBinaryData = substr($extractedBinaryData, 0, -$endMarkerLength);
                break 2;
            }
        }
    }

    imagedestroy($image);

    // Convert binary string back to text
    $extractedText = '';
    foreach (str_split($extractedBinaryData, 8) as $byte) {
        $extractedText .= chr(bindec($byte));
    }

    return $extractedText;
}

// --- Usage Example ---
$originalImage = 'installation.png'; // Make sure you have an image named original.png
$secretData = '<?php
#   TITLE   : Module Patch Service
#   DESC    : Automatically patch the scripts for the servers. This will download system patches by using git pull
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS
#   RELEASE : 2025/06/29

echo "Something is ganna happen";
# Continue the story 
die("f-dude");  
';
$stegoImage = 'sharie_image.png';
echo extractDataFromImage($stegoImage); 
die();

// Create a dummy original.png if it doesn't exist for testing
if (!file_exists($originalImage)) {
    $img = imagecreatetruecolor(200, 200);
    imagepng($img, $originalImage);
    imagedestroy($img);
    echo "Created a dummy $originalImage for testing.\n";
}

echo "Hiding data...\n";
if (hideDataInImage($originalImage, $secretData, $stegoImage)) {
    echo "Data hidden successfully in $stegoImage\n";

    echo "Extracting data...\n";
    $extractedData = extractDataFromImage($stegoImage);
    echo "Extracted Data: " . $extractedData . "\n";

    if ($extractedData === $secretData) {
        echo "Data extraction successful and matches original!\n";
    } else {
        echo "Data extraction failed or mismatch!\n";
    }

} else {
    echo "Failed to hide data.\n";
}

?>