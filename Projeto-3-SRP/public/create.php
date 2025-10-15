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

$result = $service->create($_POST);

if ($result['success']) {
    http_response_code(201);
    echo 'Produto cadastrado com sucesso! <br>';
    echo '<a href="products.php">Ver listagem</a> | <a href="index.php">Cadastrar outro</a>';
} else {
    http_response_code(422);
    echo '<strong>Falha no cadastro:</strong> ' . htmlspecialchars($result['message']);
    echo '<br><a href="index.php">Tentar novamente</a>';
}