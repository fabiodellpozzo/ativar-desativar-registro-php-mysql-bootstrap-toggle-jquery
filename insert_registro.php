<?php
$conn = new mysqli("localhost", "root", "", "registrodb");

$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
$status = $_POST['status'];

$stmt = $conn->prepare("INSERT INTO registros (titulo, conteudo, status) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $titulo, $conteudo, $status);
$stmt->execute();

echo "Registro inserido com sucesso!";
$stmt->close();
$conn->close();
?>
