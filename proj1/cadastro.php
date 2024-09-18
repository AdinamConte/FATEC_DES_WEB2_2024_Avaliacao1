<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'coordenacao') { 
    header('Location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $registro = $_POST['registro'];
    $laboratorio = $_POST['laboratorio'];
    $prazo = $_POST['prazo'];
    $curso = $_POST['curso'];

    $arquivo = ($curso == 'DSM') ? 'dsm.txt' : 'ge.txt';
    $linha = "$laboratorio | $prazo | $registro\n";
    
    file_put_contents($arquivo, $linha, FILE_APPEND);
    echo "Demanda cadastrada com sucesso.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de chamados</title>
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
        }
        h1 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastrar Chamado</h1>
        <form method="POST" action="">
            <label for="registro">Registro do chamado:</label>
            <input type="text" id="registro" name="registro" required>
            <label for="laboratorio">Laboratório:</label>
            <select id="laboratorio" name="laboratorio" required>
                <option value="Laboratório 1">Laboratório 1</option>
                <option value="Laboratório 2">Laboratório 2</option>
                <option value="Laboratório 3">Laboratório 3</option>
            </select>
            <label for="prazo">Prazo:</label>
            <input type="date" id="prazo" name="prazo" required>
            <label for="curso">Curso de atendimento:</label>
            <select id="curso" name="curso" required>
                <option value="DSM">Desenvolvimento de software</option>
                <option value="GE">Gestao Empresarial</option>
            </select>
            <input type="submit" name="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>

