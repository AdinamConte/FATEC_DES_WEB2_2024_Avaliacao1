<?php
session_start();

if (!isset($_SESSION['user'])) { 
    header('Location: ../login.php');
    exit();
}

function listarSolicitacoes($arquivo) {
    if (file_exists($arquivo)) {
        $conteudo = file($arquivo, FILE_IGNORE_NEW_LINES);
        if ($conteudo !== false) {
            foreach ($conteudo as $linha) {
                echo "<li>" . htmlspecialchars($linha) . "</li>";
            }
        } else {
            echo "<li>Erro ao ler o arquivo.</li>";
        }
    } else {
        echo "<li>Arquivo não encontrado: " . htmlspecialchars($arquivo) . "</li>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Solicitações</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }
        h1 {
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #e9e9e9;
            margin: 5px 0;
            padding: 10px;
            border-radius: 4px;
        }
        a {
            display: block;
            margin-top: 20px;
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Solicitações DSM</h1>
        <ul>
            <?php listarSolicitacoes('../dsm.txt'); ?>
        </ul>
        <h1>Solicitações GE</h1>
        <ul>
            <?php listarSolicitacoes('../ge.txt'); ?>
        </ul>
        <a href="../dashboard.php">Voltar ao Inicio</a>
    </div>
</body>
</html>