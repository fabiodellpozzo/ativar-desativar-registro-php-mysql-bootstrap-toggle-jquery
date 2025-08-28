<?php
$conn = new mysqli("localhost", "root", "", "registrodb");

$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM user_Status WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

echo "deleted";
$stmt->close();
$conn->close();
?>
