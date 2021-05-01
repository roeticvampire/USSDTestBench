<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

// Comment these lines to hide errors

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to the Mobile UPI Payments\n";
    $response .= "Please enter your PIN";

} else if ($text == "123456"&&$phoneNumber=="+917004359495") {
    // Business logic for first level response
    $response = "CON Nice we can go ahead \n";
    $response .= "1. Account number \n";


} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "END Your phone number is ".$phoneNumber;

} else if($text == "1*1") { 
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber  = "ACC1001";

    // This is a terminal request. Note how we start the response with END
    $response = "END Your account number is ".$accountNumber;

}else {
    $response = "END Invalid bruh \n";
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
