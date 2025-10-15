<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use ProductsSRPDemo\Application\ProductService;
use ProductsSRPDemo\Domain\SimpleProductValidator;
use ProductsSRPDemo\Infra\FileProductRepository;

$storagePath = __DIR__ . '/../storage/products.txt';

$repository = new FileProductRepository($storagePath);
$validator = new SimpleProductValidator();
$service = new ProductService($repository, $validator);

$products = $service->listAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Produtos</title>
</head>
<body>
    <h1>Produtos Cadastrados</h1>
    <?php if (empty($products)): ?>
        <p>Nenhum produto cadastrado.</p>
    <?php else: ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)$product['id']) ?></td>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td>R$ <?= number_format($product['price'], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <br>
    <a href="index.php">Cadastrar novo produto</a>
</body>
</html>