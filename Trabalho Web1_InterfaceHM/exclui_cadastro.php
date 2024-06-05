<?php
$con = new mysqli("127.0.0.1", "root", "", "barbearia");

$id = $_GET['id'];
$sql = "DELETE FROM cadastro WHERE id=$id";

$con->query($sql);

header("Location: administracao.php");
?>
