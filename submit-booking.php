<?php
header('Content-Type: application/json');

// Include the database connection file
require 'db_conn.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

// Get the JSON data sent from the JavaScript fetch request
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No data received.']);
    exit;
}

// --- Data Extraction and Validation ---

// Required fields for Step 1
$booking_date = $data['selectedDate'] ?? null;
$booking_time = $data['selectedTime'] ?? null;
$timezone = $data['selectedTimeZone'] ?? null;

// Required fields for Step 2
$name = $data['name'] ?? null;
$email = $data['email'] ?? null;
$budget = $data['budget'] ?? null;

// Check for required fields
if (!$booking_date || !$booking_time || !$timezone || !$name || !$email || !$budget) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing required data (date, time, name, email, or budget).']);
    exit;
}

// Optional fields
$guest_emails = $data['guest_emails'] ?? null;
$telegram = $data['telegram'] ?? null;
$website = $data['website'] ?? null;
$additional_info = $data['additional_info'] ?? null;

// Array fields (implode them into comma-separated strings for database storage)
$sector_array = $data['sector'] ?? [];
$service_array = $data['service'] ?? [];

$sector = is_array($sector_array) ? implode(', ', $sector_array) : '';
$service = is_array($service_array) ? implode(', ', $service_array) : '';


// --- Database Insertion ---

$sql = "INSERT INTO bookings (
            booking_date, booking_time, timezone, name, email, 
            guest_emails, telegram, website, sector, service, 
            budget, additional_info
        ) VALUES (
            :booking_date, :booking_time, :timezone, :name, :email, 
            :guest_emails, :telegram, :website, :sector, :service, 
            :budget, :additional_info
        )";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':booking_date' => $booking_date,
        ':booking_time' => $booking_time,
        ':timezone'     => $timezone,
        ':name'         => $name,
        ':email'        => $email,
        ':guest_emails' => $guest_emails,
        ':telegram'     => $telegram,
        ':website'      => $website,
        ':sector'       => $sector,
        ':service'      => $service,
        ':budget'       => $budget,
        ':additional_info' => $additional_info,
    ]);

    // Success response
    echo json_encode(['success' => true, 'message' => 'Booking confirmed and saved.']);

} catch (\PDOException $e) {
    // Log the error
    error_log("Booking insert error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error during submission.']);
}
?>