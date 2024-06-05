<?php

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';
$plano = $_POST['plano'] ?? '';

$con = new mysqli("127.0.0.1", "root", "", "barbearia");

$sql = "INSERT INTO cadastro (usuario, senha, plano) VALUES ('$usuario', '$senha', '$plano')";

$con->query($sql);

header("Location: pag_login.html");
?>
