<?php
$chatFile = '../livechat/chat.json';

$message = $_GET['msg'];
$email = $_GET['email'];
// Set the time zone to Sri Lanka
date_default_timezone_set('Asia/Colombo');

// Get the current time in Sri Lanka time zone
$currentTime = date('H:i');

// Read existing chat data from the JSON file
$chatData = file_get_contents($chatFile);
$chat = json_decode($chatData, true);

if ($chat === null) {
    // If the JSON data is invalid or doesn't exist, initialize an empty array
    $chat = [];
}

// Check if the user's email already has chat data
if (isset($chat[$email])) {
    // User already has chat data, add the new message to their existing chat
    $chat[$email]['messages'][] = ['message' => $message, 'time' => $currentTime];
} else {
    // User does not have chat data, create a new entry for them
    $chat[$email] = [
        'email' => $email,
        'messages' => [
            ['message' => $message, 'time' => $currentTime]
        ]
    ];
}

// Encode the entire chat data, including the new message, back to JSON
$encodedData = json_encode($chat, JSON_PRETTY_PRINT); // Use JSON_PRETTY_PRINT for a formatted JSON

// Write the updated chat data back to the JSON file
file_put_contents($chatFile, $encodedData . "\n");

echo "success";



/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $user = $_SESSION['ud']['email'];

    $chat = json_decode(file_get_contents($chatFile), true);
    $chat[] = ['user' => $user, 'message' => $message];
    file_put_contents($chatFile, json_encode($chat));
}*/

/*if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $chat = json_decode(file_get_contents($chatFile), true);
    header('Content-Type: application/json');
    echo json_encode($chat);
}*/
