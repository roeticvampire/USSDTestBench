<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

// Comment these lines to hide errors
//We're assuming we have two Candidates

//7004359495, PIN 123456, 5000.00
//9988776655, PIN 010101, 2000.00


if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to the Mobile Payments\n";
    $response .= "Please enter your PIN";

} else if ($text == "123456"&&$phoneNumber=="+917004359495") {
    // Business logic for first level response
    $response = "CON Nice we can go ahead \n";
    $response .= "1. Account number \n";


}
else if ($text == "010101"&&$phoneNumber=="+919988776655") {
    // Business logic for first level response
    $response = "CON Select an Option \n";
    $response .= "1. Check Account Balance \n";
    $response .= "2. Send Payment \n";


} else if ($text == "123456*1") {
    $response = "END Your account balance is Rs. 5000";

}else if ($text == "010101*1") {
    $response = "END Your account balance is Rs. 2000";

} else if($text == "123456*2*+919988776655") { 
    $response = "CON Enter Amount for Payment";

}else if($text == "123456*2*+919988776655*2000") {  
    $response = "CON Paying Rs.2000 to +919988776655\n";
    $response .= "Press 1 to confirm";

}else if($text == "123456*2*+919988776655*2000*1") {  
    $response = "END Paid Rs.2000 to +919988776655\n";
    $response .= "Remaining Balance: Rs. 3000";

}else {
    $response = "END Invalid Response. Process Terminated.\n";
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
