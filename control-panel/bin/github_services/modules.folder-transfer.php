<?php 
function readAllFolderContents($folderPath) {
    // Check if the folder exists
    if (!is_dir($folderPath)) {
        return "The specified folder does not exist.";
    }

    // Initialize an array to hold the contents
    $contents = [];
    $stack = [$folderPath]; // Initialize the stack with the starting folder

    while (!empty($stack)) {
        // Get the current folder from the stack
        $currentFolder = array_pop($stack);

        // Scan the current directory
        $items = scandir($currentFolder);

        // Loop through the items
        foreach ($items as $item) {
            // Exclude the current (.) and parent (..) directory entries
            if ($item !== '.' && $item !== '..') {
                $fullPath = $currentFolder . DIRECTORY_SEPARATOR . $item;
                
                if (is_dir($fullPath)) {
                    // If it's a directory, push it onto the stack
                    $stack[] = $fullPath;
                } else {
                    // If it's a file, add it to the contents array
                    //$fullPath = $item; 
                    $contents[] = $fullPath;
                }
            }
        }
    }

    return $contents;
}

// Example usage
$folderPath = dirname(__FILE__).'';

$folderPath = "C:/xampp/htdocs/varsitymarket.co.za/installer_guide/skynet/"; 
$source = "C:/xampp/htdocs/varsitymarket.co.za/installer_guide/skynet/\index.html"; 

$x = substr($source,strlen($folderPath),(strlen($source) - strlen($folderPath))); 
echo ($x); 
exit(); 

$contents = readAllFolderContents($folderPath);

if (is_array($contents)) {
    echo "Contents of the folder and subfolders:\n";
    print_r($contents);
} else {
    echo $contents; // Display error message if applicable
}

?>