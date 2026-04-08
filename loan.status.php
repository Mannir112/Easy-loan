<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$user_id = $data['user_id'];

$result = $conn->query("SELECT * FROM loans WHERE user_id='$user_id' ORDER BY id DESC");

$loans = [];
while($row = $result->fetch_assoc()){
    $loans[] = $row;
}

echo json_encode(["status" => true, "loans" => $loans]);
?>
