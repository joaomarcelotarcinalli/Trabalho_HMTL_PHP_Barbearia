<?php
    $usuario = @$_POST['usuario'];
    $senha = @$_POST['senha'];

    $conexao = new mysqli(
        "localhost",
        "root",
        "",
        "Barbearia"
    );
    $sql = ("SELECT * FROM cadastro
         WHERE usuario  = '$usuario' AND senha = '$senha'"
    );
$resultado = $conexao->query($sql);
$tabela = $resultado->fetch_assoc();

if ($tabela == null){
    echo "Login ou/e senha inválidos!";
}
else{
    session_start();
    echo "Seja-bem vindo(a) ".$tabela['usuario'];
    header("Location: pag_logado.html");
}



