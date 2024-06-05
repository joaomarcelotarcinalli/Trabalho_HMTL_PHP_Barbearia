<?php

$usuario = @$_POST['usuario'];
$senha = @$_POST['senha'];
$plano = @$_POST['plano'];

$con = new mysqli("localhost", "root", "", "barbearia");

$sql = "INSERT INTO cadastro (usuario, senha, plano) VALUES ('$usuario', '$senha', '$plano')";

$con->query($sql);

header("Location: administracao.php");
