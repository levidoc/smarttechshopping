<?php 

function github_module_repository_create($repoName, $description,$homepage, $private, $hasIssues, $hasProjects, $hasWiki, $token='DEFERED'){
    // GitHub API URL
    $url = "https://api.github.com/user/repos";

    if ($token == "DEFERED"){
        @trigger_error('Could Not Authenticate Token'); 
    }
    
    // Prepare the data for the POST request
    $data = [
        'name' => $repoName,
        'description' => $description,
        'homepage' => $homepage,
        'private' => $private,
        'has_issues' => $hasIssues,
        'has_projects' => $hasProjects,
        'has_wiki' => $hasWiki
    ];
    
        // Initialize cURL session
        $ch = curl_init($url);
    
        // Set cURL options
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Accept: application/vnd.github+json",
            "Authorization: Bearer $token",
            "X-GitHub-Api-Version: 2022-11-28",
            "Content-Type: application/json",
            "User-Agent: PHP-cURL" 
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        
        // Execute the cURL request
        $response = curl_exec($ch);
        
        // Check for errors
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        } else {
            // Output the response
            //echo $response;
        }
    
        // Close the cURL session
        curl_close($ch);
}

?>