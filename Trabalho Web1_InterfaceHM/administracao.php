<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa - Retrovisor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            display: flex;
            max-width: 1400px;
            margin: auto;
            padding: 20px;
        }
        .menu {
            width: 200px;
            background-color: #333;
            color: white;
            padding: 20px;
        }
        .menu ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .menu ul li {
            margin-bottom: 10px;
        }
        .menu ul li a {
            text-decoration: none;
            color: white;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 3px;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="menu">
        <h3>Menu</h3>
        <ul>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
            <li><a href="#">A</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>Listagem de Usuários</h2>

        <form method="post" action="">
            <label>
                <input style="border: 2px solid black; padding: 5px 5px" type="text" name="buscar" placeholder="Buscar usuário">
            </label>
                <button style="border: 2px solid black; border-radius: 8px; background-color: black; color: white; padding: 5px 5px; font-family: 'Arial'; text-align: center" type="submit">Buscar</button>
        </form>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Senha</th>
                <th>Plano</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $con = new mysqli("127.0.0.1", "root", "", "barbearia");

            if ($con->connect_error) {
                echo "Falha na conexão: " . $con->connect_error;
            }

            $buscar = isset($_POST['buscar']) ? $con->real_escape_string($_POST['buscar']) : '';

            $sql = "SELECT * FROM cadastro";
            if ($buscar) {
                $sql .= " WHERE usuario LIKE '%$buscar%' OR plano LIKE '%$buscar%'";
            }
            $rs = $con->query($sql);

            while ($linha = $rs->fetch_assoc()) {
                echo "<tr>
                            <td>" . $linha["id"] . "</td>
                            <td>" . $linha["usuario"] . "</td>
                            <td>" . $linha["senha"] . "</td>
                            <td>" . $linha["plano"] . "</td>
                            <td>
                                <a href='altera_cadastro.php?id=" . $linha["id"] . "' class='btn btn-primary'>✏️</a>
                                <a href='exclui_cadastro.php?id=" . $linha["id"] . "' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>🗑️</a>
                            </td>
                          </tr>";
            }
            ?>
            </tbody>
        </table>
        <div style="margin-top: 20px;">
            <a href="cadastro_administracao.html" class="btn btn-success">NOVO</a>
        </div>
    </div>
</div>
</body>
</html>
