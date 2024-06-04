<?php

// Function to get the client IP address
function get_client_ip() {
    $ip_address = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ip_address = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ip_address = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ip_address = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ip_address = $_SERVER['REMOTE_ADDR'];
    else
        $ip_address = 'UNKNOWN';
    return $ip_address;
}

// Function to log visitor IP and time
function log_visitor() {
    $ip_address = get_client_ip();
    $time = date('Y-m-d H:i:s');
    $log_entry = "IP: $ip_address - Time: $time\n";
    file_put_contents('visitor_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
}

// Call the log_visitor function to log the visitor
log_visitor();

?>
