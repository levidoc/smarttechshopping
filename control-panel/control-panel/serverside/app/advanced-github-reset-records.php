<?php 

$gitcontrol_file = dirname(dirname(dirname(dirname(__FILE__))))."/module.github.control.php";

@include_once $gitcontrol_file; 
@include_once $package_file; 

$domain = get_system_domain_network(); 
$request = get_domain_request(); 

$subdomain = $request.'.'.$domain; 

#Return The Website To The Domain
try {
    $session = new varsitymarket_github_services(get_github_tokens()); 

    #Create Custom Domain 
    $cname_record = github_credentials().".github.io"; 
    @$session->configure_subdomain($subdomain,$cname_record); 

    #Reconfigure Github Pages 
    $session->enable_domain(strtolower($subdomain)); 

    echo "PROCEED";
} catch (\Throwable $th) {
    echo "ERROR";     
}


?> 