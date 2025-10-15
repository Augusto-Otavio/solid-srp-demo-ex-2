<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <form action="create.php" method="POST">
        <label>Nome do Produto: <input name="name" required></label>
        <br><br>
        <label>Preço: <input name="price" type="number" step="0.01" required></label>
        <br><br>
        <button type="submit">Cadastrar</button>
    </form>
    <hr>
    <a href="products.php">Ver produtos cadastrados</a>
</body>
</html>