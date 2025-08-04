<?php
// sync_project_local.php

#   TITLE   : Module Sync Service   
#   DESC    : Automatically update the scripts for the servers. This will be the Push to Repository script 
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2025/06/29

// Define paths for configuration and log files
define('BIN_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'patch_bin');
define('LOCAL_CONFIG_FILE', BIN_DIR . DIRECTORY_SEPARATOR . 'local_config.php');
define('LOCAL_LOG_FILE', BIN_DIR . DIRECTORY_SEPARATOR . 'local_sync.log');
define('LOCAL_MANIFEST_FILE', __DIR__ . DIRECTORY_SEPARATOR . 'local_manifest.json'); // Manifest in main script directory

// Ensure bin directory exists
if (!is_dir(BIN_DIR)) {
    @mkdir(BIN_DIR, 0755, true);
}

// Generate local_config.php if it doesn't exist
if (!file_exists(LOCAL_CONFIG_FILE)) {
    $lc_setup = "<?php
    // GitHub Configuration
    define('GITHUB_PERSONAL_ACCESS_TOKEN', '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'); // Replace with your PAT
    define('GITHUB_OWNER', 'varsitymarket-technologies'); // e.g., 'my-org' or 'john-doe'
    define('GITHUB_REPO', 'sync_vmtech_website_manager');      // e.g., 'project-sync'
    define('GITHUB_BRANCH', 'main');                    // Target branch

    // Local Project Path
    define('PROJECT_LOCAL_PATH', dirname(__DIR__)); #Consider Backing Up Everything

    // Remote MySQL Configuration
    define('DB_HOST', '');
    define('DB_USER', '');
    define('DB_PASS', '');
    define('DB_NAME', '');
    define('DB_PORT',''); 

    // Log file for local operations
    define('LOG_FILE', '" . LOCAL_LOG_FILE . "'); // Use the defined constant

    // --- DO NOT EDIT BELOW THIS LINE ---
    // GitHub API Base URL
    define('GITHUB_API_URL', 'https://api.github.com');
    ?>";
    
    $e = file_put_contents(LOCAL_CONFIG_FILE, $lc_setup);
    if ($e === false) {
        die("Error: Could not write local_config.php. Check permissions for " . BIN_DIR . "\n");
    }
}

// Initialize local_sync.log if it doesn't exist
if (!file_exists(LOCAL_LOG_FILE)) {
    @file_put_contents(LOCAL_LOG_FILE, ''); // Start with empty log
}

// Initialize local_manifest.json if it doesn't exist
if (!file_exists(LOCAL_MANIFEST_FILE)) {
    @file_put_contents(LOCAL_MANIFEST_FILE, '{}');
}

require_once LOCAL_CONFIG_FILE;

// --- Utility Functions ---

/**
 * Logs messages to a file and outputs to console.
 * @param string $message The message to log.
 */
function log_message($message)
{
    file_put_contents(LOG_FILE, date('[Y-m-d H:i:s] ') . $message . PHP_EOL, FILE_APPEND);
    echo "\t".$message . PHP_EOL; // Also output to console
}

/**
 * Makes a cURL request to the GitHub API.
 * @param string $method HTTP method (GET, POST, PUT, DELETE, PATCH).
 * @param string $path API endpoint path (e.g., /repos/{owner}/{repo}/git/refs/heads/master).
 * @param array $data Data to send as JSON.
 * @param string $token GitHub Personal Access Token.
 * @return mixed Decoded JSON response or false on failure.
 */
function github_api_request($method, $path, $data = [], $token)
{
    $url = GITHUB_API_URL . $path;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/vnd.github+json",
        "Authorization: Bearer $token",
        "X-GitHub-Api-Version: 2022-11-28",
        "Content-Type: application/json",
        "User-Agent: PHP-cURL" 
    ]);

    switch ($method) {
        case 'POST':
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case 'PATCH':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case 'PUT':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case 'DELETE':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
    }

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    if ($response === false) {
        log_message("cURL Error for {$method} {$url}: {$error}");
        return false; // Return false on cURL execution error
    }

    $decoded_response = json_decode($response, true);

    if ($http_code < 200 || $http_code >= 300) {
        $error_message = isset($decoded_response['message']) ? $decoded_response['message'] : 'Unknown error';
        log_message("GitHub API Error for {$method} {$url} (HTTP {$http_code}): {$error_message}");
        log_message("GitHub API Response Body: " . $response); // Log full response for crucial debugging
        return false;
    }

    return $decoded_response;
}

/**
 * Gets the SHA of a reference (branch).
 * @return string|false The commit SHA or false on error.
 */
function get_ref_sha()
{
    log_message("Fetching ref SHA for branch: " . GITHUB_BRANCH);
    $path = "/repos/" . GITHUB_OWNER . "/" . GITHUB_REPO . "/git/refs/heads/" . GITHUB_BRANCH;
    $response = github_api_request('GET', $path, [], GITHUB_PERSONAL_ACCESS_TOKEN);
    if ($response && isset($response['object']['sha'])) {
        log_message("Ref SHA found: " . $response['object']['sha']);
        return $response['object']['sha'];
    } else {
        log_message("Failed to get ref SHA for branch " . GITHUB_BRANCH . ". Response: " . json_encode($response));
        return false;
    }
}

/**
 * Gets the tree SHA from a commit SHA.
 * @return string|false The tree SHA or false on error.
 */
function get_tree_sha($commit_sha)
{
    log_message("Fetching tree SHA for commit: " . $commit_sha);
    $path = "/repos/" . GITHUB_OWNER . "/" . GITHUB_REPO . "/git/commits/" . $commit_sha;
    $response = github_api_request('GET', $path, [], GITHUB_PERSONAL_ACCESS_TOKEN);
    if ($response && isset($response['tree']['sha'])) {
        log_message("Tree SHA found: " . $response['tree']['sha']);
        return $response['tree']['sha'];
    } else {
        log_message("Failed to get tree SHA for commit " . $commit_sha . ". Response: " . json_encode($response));
        return false;
    }
}

/**
 * Creates a new blob (file content) on GitHub.
 * @param string $content The file content.
 * @return string|false The blob SHA or false on error.
 */
function create_blob($content)
{
    $path = "/repos/" . GITHUB_OWNER . "/" . GITHUB_REPO . "/git/blobs";
    $data = [
        'content' => base64_encode($content),
        'encoding' => 'base64'
    ];
    $response = github_api_request('POST', $path, $data, GITHUB_PERSONAL_ACCESS_TOKEN);
    if ($response && isset($response['sha'])) {
        return $response['sha'];
    } else {
        log_message("Failed to create blob.");
        return false;
    }
}

/**
 * Creates a new tree on GitHub.
 * @param string $base_tree_sha The SHA of the tree to base the new tree on.
 * @param array $tree_items Array of tree objects (path, mode, type, sha).
 * @return string|false The new tree SHA or false on error.
 */
function create_tree($base_tree_sha, $tree_items)
{
    log_message("Attempting to create new tree.");
    log_message("Base Tree SHA for new tree: " . ($base_tree_sha ?: 'NULL/Empty')); // Log base_tree_sha
    log_message("Number of tree items to commit: " . count($tree_items));

    // Log a sample of tree items for debugging
    if (!empty($tree_items)) {
        log_message("Sample of first 5 tree items (path and SHA):");
        foreach (array_slice($tree_items, 0, 5) as $index => $item) {
            log_message("  Item " . ($index + 1) . ": Path='" . ($item['path'] ?? 'N/A') . "', SHA='" . ($item['sha'] ?? 'null (deleted)') . "'");
        }
        if (count($tree_items) > 5) {
            log_message("  ... and " . (count($tree_items) - 5) . " more items.");
        }
    } else {
        log_message("No tree items to commit. This might be an issue if changes were detected.");
    }

    $path = "/repos/" . GITHUB_OWNER . "/" . GITHUB_REPO . "/git/trees";
    $data = [
        'base_tree' => $base_tree_sha,
        'tree' => $tree_items
    ];
    $response = github_api_request('POST', $path, $data, GITHUB_PERSONAL_ACCESS_TOKEN);
    if ($response && isset($response['sha'])) {
        log_message("New tree created with SHA: " . $response['sha']);
        return $response['sha'];
    } else {
        log_message("Failed to create new tree. See previous logs for GitHub API error details.");
        return false;
    }
}

/**
 * Creates a new commit on GitHub.
 * @param string $tree_sha The SHA of the tree for this commit.
 * @param string $parent_sha The SHA of the parent commit.
 * @param string $message The commit message.
 * @return string|false The new commit SHA or false on error.
 */
function create_commit($tree_sha, $parent_sha, $message)
{
    log_message("Creating new commit with tree: {$tree_sha} and parent: {$parent_sha}");
    $path = "/repos/" . GITHUB_OWNER . "/" . GITHUB_REPO . "/git/commits";
    $data = [
        'message' => $message,
        'tree' => $tree_sha,
        'parents' => [$parent_sha]
    ];
    $response = github_api_request('POST', $path, $data, GITHUB_PERSONAL_ACCESS_TOKEN);
    if ($response && isset($response['sha'])) {
        log_message("New commit created with SHA: " . $response['sha']);
        return $response['sha'];
    } else {
        log_message("Failed to create new commit.");
        return false;
    }
}

/**
 * Updates a branch reference to point to a new commit.
 * @param string $commit_sha The SHA of the new commit.
 * @return bool True on success, false on error.
 */
function update_ref($commit_sha)
{
    log_message("Updating branch " . GITHUB_BRANCH . " to commit: " . $commit_sha);
    $path = "/repos/" . GITHUB_OWNER . "/" . GITHUB_REPO . "/git/refs/heads/" . GITHUB_BRANCH;
    $data = [
        'sha' => $commit_sha,
        'force' => true // Use with caution! Forces update even if history diverges.
    ];
    $response = github_api_request('PATCH', $path, $data, GITHUB_PERSONAL_ACCESS_TOKEN);
    if ($response) {
        log_message("Branch updated successfully.");
        return true;
    } else {
        log_message("Failed to update branch reference.");
        return false;
    }
}

/**
 * Connects to Remote MySQL and updates the latest commit SHA.
 * @param string $commit_sha The new commit SHA to store.
 * @return bool True on success, false on error.
 */
function update_remotemysql($commit_sha)
{
    return false; 
}

$intro_text = " 
##############################################

    -- Developer Console --
    -- Configure the varsitymarket ecosystem. With this command line tool 

##############################################
\t__     ___    ____  ____ ___ _______   __
\t\ \   / / \  |  _ \/ ___|_ _|_   _\ \ / /
\t \ \ / / _ \ | |_) \___ \| |  | |  \ V /
\t  \ V / ___ \|  _ < ___) | |  | |   | |
\t   \_/_/   \_\_| \_\____/___| |_|   |_|
\t
\t __  __    _    ____  _  _______ _____
\t|  \/  |  / \  |  _ \| |/ / ____|_   _|
\t| |\/| | / _ \ | |_) | ' /|  _|   | |
\t| |  | |/ ___ \|  _ <| . \| |___  | |
\t|_|  |_/_/   \_\_| \_\_|\_\_____| |_|
\t
\t _            _                 _             _
\t| |_ ___  ___| |__  _ __   ___ | | ___   __ _(_) ___  ___
\t| __/ _ \/ __| '_ \| '_ \ / _ \| |/ _ \ / _` | |/ _ \ / __|
\t| ||  __/ (__| | | | | | | (_) | | (_) | (_| | |  __/\__ \
\t \__\___|\___|_| |_|_| |_|\___/|_|\___/ \__, |_|\___||___/
\t                                        |___/
\t[SYNC-SERVICES] => sync_vmtech_marketplace
\tCreated By Hardy Hastings                                        
\tThis is a verified Console Application
";

echo($intro_text);
sleep(5); 

// --- Main Script Logic ---

log_message("Starting project sync from local machine...");

// 1. Load existing manifest
$local_manifest = [];
if (file_exists(LOCAL_MANIFEST_FILE)) {
    $content = file_get_contents(LOCAL_MANIFEST_FILE);
    $local_manifest = json_decode($content, true);
    if (!is_array($local_manifest)) {
        log_message("Warning: local_manifest.json is corrupted or empty. Rebuilding.");
        $local_manifest = [];
    } else {
        log_message("Loaded " . count($local_manifest) . " items from local_manifest.json.");
    }
} else {
    log_message("local_manifest.json not found. A new one will be created upon successful sync.");
}


// 2. Scan project files and calculate current hashes
$current_files = [];
if (!is_dir(PROJECT_LOCAL_PATH)) {
    log_message("Error: Project directory '" . PROJECT_LOCAL_PATH . "' not found. Please create it and place your files inside.");
    exit(1);
}

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator(PROJECT_LOCAL_PATH, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

foreach ($iterator as $file) {
    if ($file->isFile()) {
        $relativePath = str_replace(PROJECT_LOCAL_PATH . DIRECTORY_SEPARATOR, '', $file->getPathname());
        $current_files[$relativePath] = md5_file($file->getPathname());
    }
}
log_message("Scanned " . count($current_files) . " files from project directory.");


// 3. Determine changes (added, modified, deleted)
$added_files = [];
$modified_files = [];
$deleted_files = [];

// Check for added and modified
foreach ($current_files as $path => $hash) {
    if (!isset($local_manifest[$path])) {
        $added_files[] = $path;
        log_message("Detected ADDED: " . $path);
    } elseif ($local_manifest[$path] !== $hash) {
        $modified_files[] = $path;
        log_message("Detected MODIFIED: " . $path);
    }
}

// Check for deleted
foreach ($local_manifest as $path => $hash) {
    if (!isset($current_files[$path])) {
        $deleted_files[] = $path;
        log_message("Detected DELETED: " . $path);
    }
}

if (empty($added_files) && empty($modified_files) && empty($deleted_files)) {
    log_message("No changes detected. Exiting.");
    exit(0);
}

log_message("Changes detected. Proceeding with GitHub sync...");

// 4. Get current GitHub branch info
$parent_commit_sha = get_ref_sha();
if (!$parent_commit_sha) {
    log_message("CRITICAL ERROR: Could not get current branch SHA for '" . GITHUB_BRANCH . "'. This usually means the branch does not exist or the repository is empty.");
    log_message("Please ensure your GitHub repository has at least one commit on the '" . GITHUB_BRANCH . "' branch.");
    exit(1);
}

$base_tree_sha = get_tree_sha($parent_commit_sha);
if (!$base_tree_sha) {
    log_message("CRITICAL ERROR: Could not get base tree SHA from current commit (" . $parent_commit_sha . "). This commit might be corrupted or not exist.");
    exit(1);
}

$tree_items = [];
$new_manifest = []; // Build new manifest as we go

// Process added and modified files
foreach (array_merge($added_files, $modified_files) as $path) {
    $full_path = PROJECT_LOCAL_PATH . DIRECTORY_SEPARATOR . $path;
    $content = file_get_contents($full_path);
    if ($content === false) {
        log_message("WARNING: Could not read file content for " . $full_path . ". Skipping this file.");
        continue; // Skip this file if content can't be read
    }

    $blob_sha = create_blob($content);
    if (!$blob_sha) {
        log_message("CRITICAL ERROR: Failed to create blob for " . $path . ". Aborting sync.");
        exit(1); // Exit if blob creation fails
    }
    $tree_items[] = [
        'path' => str_replace('\\', '/', $path), // GitHub API expects forward slashes
        'mode' => '100644', // File mode for regular files
        'type' => 'blob',
        'sha' => $blob_sha
    ];
    $new_manifest[$path] = $current_files[$path]; // Add to new manifest
}

// Process deleted files
foreach ($deleted_files as $path) {
    $tree_items[] = [
        'path' => str_replace('\\', '/', $path),
        'mode' => '100644', // Mode doesn't strictly matter for deletion, but required
        'type' => 'blob',
        'sha' => null // Set SHA to null to delete the file
    ];
    // Do NOT add to new manifest
}

if (empty($tree_items) && (empty($added_files) && empty($modified_files) && empty($deleted_files))) {
    // This case should ideally be caught by the "No changes detected" check earlier,
    // but as a safeguard, if tree_items is empty after processing, there's nothing to commit.
    log_message("No actual file changes to commit after processing (e.g., only unreadable files were skipped). Exiting.");
    exit(0);
}


// 5. Create new tree
$new_tree_sha = create_tree($base_tree_sha, $tree_items);
if (!$new_tree_sha) {
    log_message("CRITICAL ERROR: Failed to create new tree. See previous logs for GitHub API error details. Aborting sync.");
    exit(1); // Re-enable exit on failure
}

// 6. Create new commit
$commit_message = "Automated sync: " . date('Y-m-d H:i:s');
if (!empty($added_files)) $commit_message .= "\nAdded: " . implode(', ', $added_files);
if (!empty($modified_files)) $commit_message .= "\nModified: " . implode(', ', $modified_files);
if (!empty($deleted_files)) $commit_message .= "\nDeleted: " . implode(', ', $deleted_files);

$new_commit_sha = create_commit($new_tree_sha, $parent_commit_sha, $commit_message);
if (!$new_commit_sha) {
    log_message("CRITICAL ERROR: Failed to create new commit. Aborting sync.");
    exit(1);
}

// 7. Update branch reference
if (!update_ref($new_commit_sha)) {
    log_message("CRITICAL ERROR: Failed to update branch reference. Aborting sync.");
    exit(1);
}

log_message("Successfully pushed changes to GitHub. New commit SHA: " . $new_commit_sha);

// 8. Update local manifest
// Ensure new_manifest contains all current files, including those not changed in this run
foreach ($current_files as $path => $hash) {
    $new_manifest[$path] = $hash;
}
file_put_contents(LOCAL_MANIFEST_FILE, json_encode($new_manifest, JSON_PRETTY_PRINT));
log_message("Local manifest updated.");
log_message("Sync process completed successfully.");


# Exension For Future Use
# Curl Post to an api endpoint to notify about the sync completion
$api_endpoint = "https://vmlite.api.varsitymarket.work/"; // Replace with your
$api_data = [
    'status' => 'success',
    'trigger' => 'webaction',
    'username' => 'hastings',
    'password' => 'password',
    'action' => 'patch-update',
    'commit_sha' => $new_commit_sha,
    'message' => 'Project sync completed successfully.'
];
$ch = curl_init($api_endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($api_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);
$response = curl_exec($ch);
if ($response === false) {
    log_message("Error notifying API endpoint: " . curl_error($ch));
} else {
    log_message("API notification response: " . $response);
}
// Close cURL handle
curl_close($ch);

?>