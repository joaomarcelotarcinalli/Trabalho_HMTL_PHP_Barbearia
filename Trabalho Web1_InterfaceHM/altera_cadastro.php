<?php
$con = new mysqli("127.0.0.1", "root", "", "barbearia");

if ($con->connect_error) {
    echo("Falha na conexão: " . $con->connect_error);
}

$linha = null;

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $plano = $_POST['plano'];

    $sql = "UPDATE cadastro SET usuario='$nome', senha='$senha', plano='$plano' WHERE id=$id";
    if ($con->query($sql) === TRUE) {
        echo "Usuário atualizado com sucesso!";
        header("Location: administracao.php");
    } else {
        echo "Erro ao atualizar usuário: " . $con->error;
    }
} else {
    $id = $_GET['id'];

    if ($id) {
        $sql = "SELECT * FROM cadastro WHERE id=$id";
        $resultado = $con->query($sql);

        if ($resultado && $resultado->num_rows > 0) { #verifica se a variavel resultado eh verdadeira e realiza a contagem de linhas, se o número de linahs for maior que 0, obtém dados da consulta
            $linha = $resultado->fetch_assoc();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .btn {
            padding: 10px 15px;
            text-decoration: none;
            color: #fff;
            border-radius: 3px;
            display: inline-block;
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Alterar Cadastro</h2>
    <form action="altera_cadastro.php" method="post">
        <input type="hidden" name="id" value="<?php echo ($linha['id'] ?? ''); ?>">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?php echo ($linha['usuario'] ?? ''); ?>">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" value="<?php echo ($linha['senha'] ?? ''); ?>">
        </div>
        <div class="form-group">
            <label for="plano">Plano</label>
            <input type="text" id="plano" name="plano" value="<?php echo ($linha['plano'] ?? ''); ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
</body>
</html>
