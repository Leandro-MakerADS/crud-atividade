<?php
require 'db.php';

$sql = "SELECT * FROM usuarios ORDER BY id ASC";
$stmt = $pdo->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>crud</title>
</head>
<body>

<h2>Cadastro</h2>

<form method="post" action="criar.php">
    <input type="text" name="nome" placeholder="Nome" required>
    <button type="submit">Adicionar</button>
</form>

<hr>

<table border="1" cellpadding="5">
    <tr>
        <th>id</th>
        <th>nome</th>
        <th>ações</th>
    </tr>

    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?= $usuario['id'] ?></td>
        <td><?= htmlspecialchars($usuario['nome']) ?></td>
        <td>
            <a href="editar.php?id=<?= $usuario['id'] ?>">Editar</a>
            |
            <a href="deletar.php?id=<?= $usuario['id'] ?>"
               onclick="return confirm('Excluir usuário?')">
                Excluir
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
