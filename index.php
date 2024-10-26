<?php
    // Importa as configs de banco de dados
    require "config.php";

    // Processa a criação de uma nova thread
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = htmlspecialchars(trim($_POST['title']));
        $username = htmlspecialchars(trim($_POST["username"]));
        $content = htmlspecialchars(trim($_POST["content"]));

        if (!empty($title) && !empty($title) && !empty($content)) {
            $stmt = $conn->prepare("INSERT INTO table_name (title, username, content) VALUES (:title, :username, :content)");
            $stmt->execute(["title" => $title, "username" => $username, "content" => $content]);

            header('Location: index.php');
            exit;
        }
    }

    $stmt = $conn->query("SELECT * FROM table_name ORDER BY created_at DESC");
    $threads = $stmt->fetchAll();

    // Inclui o template
    include 'templates/index.php';
?>
