<?php
session_start();

if (!isset($_SESSION['user'])) { 
    header('Location: login.php');
    exit();
}

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        a {
            display: block;
            margin: 10px 0;
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
        <h1>Menu Inicial</h1>
        <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user']); ?>!</p>
        <a href="cadastro.php">Cadastrar chamado</a>
        <a href="ge.txt">Visualizar chamados GE</a>
        <a href="dsm.txt">Visualizar chamados DSM</a>
        <a href="visualizar_todas.php">Visualizar todos os chamados</a>
        <a href="?logout=true">Sair</a>
    </div>
</body>
</html>
