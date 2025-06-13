<?php
// api.php - Main API endpoint for TRMNL device communication
// This file handles requests from TRMNL devices and returns JSON responses

// Set the content type to JSON - this tells the browser/device what type of data we're sending
header('Content-Type: application/json');

// Enable CORS (Cross-Origin Resource Sharing) to allow TRMNL devices to access this API
// This is important for web APIs that need to be accessed from different domains
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS requests (browsers send these before actual requests)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Return empty response with 200 status for preflight requests
    http_response_code(200);
    exit();
}

// For now, we'll create a simple test response
// In PHP, we use arrays to create JSON objects
$response = array(
    // The message that will be displayed on the TRMNL device
    "message" => "hello world",
    
    // Add timestamp to show when the API was called
    // time() returns current Unix timestamp, date() formats it as readable string
    "timestamp" => date('Y-m-d H:i:s'),
    
    // Status field to indicate if the request was successful
    "status" => "success"
);

// Convert PHP array to JSON string and output it
// json_encode() is PHP's built-in function to convert data to JSON format
echo json_encode($response);

// Exit to prevent any additional output that might corrupt the JSON
exit();
?>