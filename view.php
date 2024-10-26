<?php
    require 'config.php';

    // Verifica o ID do post na url
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        // Procura pelo post no banco de dados
        try {
            $stmt = $conn->prepare("SELECT * FROM table_name WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $thread = $stmt->fetch();

            // Não encontrou o post
            if (!$thread) {
                echo "Thread não encontrada.";
                exit;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    } else {
        echo "ID da thread não especificado.";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>phposts</title>
    <link rel="stylesheet" type="text/css" href="./stylesheet/index.css">
</head>
<body>
    <center>
        <h1><?= htmlspecialchars($thread['title']) ?></h1>
        <p><?= nl2br(htmlspecialchars($thread['content'])) ?></p><br>
        <h4>Por: <?= htmlspecialchars($thread['username']) ?></h4>
        <a href="index.php">Voltar para a lista de threads</a>
    </center>
</body>
</html>
