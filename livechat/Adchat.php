<?php
$chatFile = '../livechat/chat.json';

$message = $_GET['msg'];
$user = 'Admin';
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
if (isset($chat[$user])) {
    // User already has chat data, add the new message to their existing chat
    $chat[$user]['messages'][] = ['message' => $message, 'time' => $currentTime];
} else {
    // User does not have chat data, create a new entry for them
    $chat[$user] = [
        'user' => $user,
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
