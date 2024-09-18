<?php

$solicitacoesDSM = file_exists('dsm.txt') ? file('dsm.txt') : [];
$solicitacoesGE = file_exists('ge.txt') ? file('ge.txt') : [];

$solicitacoes = array_merge($solicitacoesDSM, $solicitacoesGE);
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Chamados</title>
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
        <h1>Chamados Abertos</h1>
        <div>
            <?php if (!empty($solicitacoes)): ?>
                <?php foreach ($solicitacoes as $solicitacao): ?>
                    <p><?php echo htmlspecialchars($solicitacao); ?></p>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhum chamado encontrado.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>