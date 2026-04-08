<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$phone = $data['phone'];
$password = $data['password'];

$result = $conn->query("SELECT * FROM users WHERE phone='$phone'");
$user = $result->fetch_assoc();

if($user && password_verify($password, $user['password'])){
    echo json_encode(["status" => true, "message" => "Login successful"]);
}else{
    echo json_encode(["status" => false, "message" => "Invalid credentials"]);
}
?>
