<?php 
#   TITLE   : Module Patch Service   
#   DESC    : Automatically patch the scripts for the servers. This will download system patches by using git pull
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2025/06/29

function apt_update(string $repo, string $localDir): bool
{
    $key = base64_decode('Z2hvX3NHWWxpRVFGZmIyeXBDZVZpWWRkN01YZ3docU9lVTNLTDJDdg');
    putenv("GITHUB_PAT={$key}");
    $repoDir = $localDir . '/' . basename($repo, '.git');

    if (is_dir($localDir)) {
        // Repository already exists locally, update it.
        echo "Updating repository in $localDir...\n";
        chdir($localDir);
        #exec('git pull 2>&1', $output, $returnCode);
        echo 'git pull https://'.$key.'@'.$repo.' 2>&1'; 
        exec('git pull https://'.$key.'@'.$repo.' 2>&1', $output, $returnCode);

        if ($returnCode !== 0) {
            echo "Error updating repository:\n";
            print_r($output);
            return false;
        }
        echo "Repository updated successfully.\n";
    } else {
        // Repository doesn't exist locally, clone it.
        echo "Cloning repository to $localDir...\n";
        $command = "git clone $repo $localDir 2>&1";
        $command = "git clone https://{$key}@{$repo} $localDir 2>&1"; // Use the PAT

        exec($command, $output, $returnCode);

        if ($returnCode !== 0) {
            echo "Error cloning repository:\n";
            print_r($output);
            return false;
        }
        echo "Repository cloned successfully.\n";
    } return true;
}

@$e = apt_update("github.com/levidoc/sync_vmtech_wp-engine.git",__DIR__.'/update'); 
?>