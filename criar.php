<?php
require 'db.php';

if (!empty($_POST['nome'])) {
    $sql = "INSERT INTO usuarios (nome) VALUES (:nome)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $_POST['nome']
    ]);
}

header("Location: index.php");
exit;
