<?php
require 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $_GET['id']
]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>editar usuário</title>
</head>
<body>

<h2>Editar usuário</h2>

<form method="post" action="atualizar.php">
    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
    <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
    <button type="submit">Salvar</button>
</form>

<br>
<a href="index.php">Voltar</a>

</body>
</html>
