<?php 
function feedback_response($message,$code){
    $x = json_encode(["code"=>$code,"message"=>$message],JSON_PRETTY_PRINT); 
    return print($x); 
    #return echo(json_encode(["code"=>$code,"message"=>$message],JSON_PRETTY_PRINT)); 
}

function api_feedback_response($data, $status = 200) {
    http_response_code($status);
    echo json_encode([
        'status' => $status,
        'data' => $data
    ]);
}
/*

Here’s a comprehensive list of common HTTP status codes, including both successful responses and error codes, along with brief explanations for each:

    ### 1xx: Informational Responses
    - **100 Continue:** The server has received the initial part of the request and the client can continue.
    - **101 Switching Protocols:** The server is switching protocols as requested by the client.
    
    ### 2xx: Successful Responses
    - **200 OK:** The request was successful.
    - **201 Created:** The request was successful and a resource was created.
    - **202 Accepted:** The request has been accepted for processing, but the processing is not complete.
    - **204 No Content:** The request was successful, but there is no content to send in the response.
    
    ### 3xx: Redirection Messages
    - **301 Moved Permanently:** The resource has been permanently moved to a new URL.
    - **302 Found:** The resource is temporarily located at a different URL.
    - **304 Not Modified:** The resource has not been modified since the last request.
    
    ### 4xx: Client Error Responses
    - **400 Bad Request:** The server could not understand the request due to invalid syntax.
    - **401 Unauthorized:** Authentication is required and has failed or has not yet been provided.
    - **403 Forbidden:** The server understands the request but refuses to authorize it.
    - **404 Not Found:** The server cannot find the requested resource.
    - **405 Method Not Allowed:** The request method is not allowed for the requested resource.
    - **409 Conflict:** The request could not be completed due to a conflict with the current state of the resource.
    - **422 Unprocessable Entity:** The request was well-formed but could not be processed.
    
    ### 5xx: Server Error Responses
    - **500 Internal Server Error:** The server encountered a situation it doesn't know how to handle.
    - **501 Not Implemented:** The server does not support the functionality required to fulfill the request.
    - **503 Service Unavailable:** The server is not ready to handle the request, often due to maintenance or overload.
    - **504 Gateway Timeout:** The server, while acting as a gateway, did not receive a timely response from the upstream server.
    
    ### Usage in API Responses
    
    You can incorporate these status codes into your API responses to accurately reflect the outcome of requests. For example:
    
    When handling different scenarios, you can return appropriate status codes from your API to indicate success or the type of error encountered.
*/

function api_success_letter($message){
    $e = api_feedback_response($message,200); 
    exit(); 
}

function api_lost_error($message){
    $e = api_feedback_response($message,301); 
    exit(); 
}

function api_client_error($message){
    $e = api_feedback_response("Internal Error: ".$message,422); 
    exit(); 
}

function api_error($message){
    $e = api_feedback_response("Server Error: ".$message,500); 
    exit(); 
}

?>