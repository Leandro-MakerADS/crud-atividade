<?php
require 'db.php';

if (!empty($_POST['id']) && !empty($_POST['nome'])) {
    $sql = "UPDATE usuarios SET nome = :nome WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $_POST['nome'],
        ':id'   => $_POST['id']
    ]);
}

header("Location: index.php");
exit;
