<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$user_id = $data['user_id'];
$amount = $data['amount'];
$duration = $data['duration']; // in months

$sql = "INSERT INTO loans (user_id, amount, duration, status) VALUES ('$user_id', '$amount', '$duration', 'pending')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => true, "message" => "Loan application submitted successfully"]);
} else {
    echo json_encode(["status" => false, "message" => "Error: " . $conn->error]);
}
?>
