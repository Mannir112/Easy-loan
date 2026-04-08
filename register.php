<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$full_name = $data['full_name'];
$phone = $data['phone'];
$email = $data['email'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (full_name, phone, email, password) VALUES ('$full_name', '$phone', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => true, "message" => "Account created successfully"]);
} else {
    echo json_encode(["status" => false, "message" => "Error: " . $conn->error]);
}
?>
