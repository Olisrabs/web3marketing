<?php
// Define database credentials
$host = 'localhost';
$db   = 'web3marketing_db';
$user = 'web3market_user';
$pass = 'web3marketing@25';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Log error details for debugging (do not expose error details publicly)
    error_log("Database connection error: " . $e->getMessage());
    // Send a generic error message to the client
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit;
}
?>