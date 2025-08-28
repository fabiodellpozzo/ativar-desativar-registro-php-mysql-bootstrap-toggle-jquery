<?php
$conn = new mysqli("localhost", "root", "", "registrodb");

$id = $_POST['id'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE registros SET status=? WHERE id=?");
$stmt->bind_param("si", $status, $id);
$stmt->execute();

echo "Status atualizado";
$stmt->close();
$conn->close();
?>
