<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>phposts</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/index.css">
</head>
<body>
    <center>
        <h1>PHPOSTS</h1>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="text" name="title" placeholder="Title" required><br>
            <textarea name="content" placeholder="Content" required></textarea><br>
            <button type="submit">Post</button>
        </form>
        <br>
        <?php foreach ($threads as $thread): ?>
            <li>
                <a href="view.php?id=<?= $thread['id'] ?>">
                    <?= htmlspecialchars($thread['title']) ?>
                </a><br>
                <em>Writed by: <?= htmlspecialchars($thread['username']) ?></em><br>
            </li>
        <?php endforeach; ?>
    </center>
</body>
</html>
