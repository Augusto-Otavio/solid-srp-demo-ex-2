<?php

declare(strict_types=1);

namespace ProductsSRPDemo\Infra;

use ProductsSRPDemo\Contracts\ProductRepository;

class FileProductRepository implements ProductRepository
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        if (!is_dir(dirname($filePath))) {
            mkdir(dirname($filePath), 0755, true);
        }
        $this->filePath = $filePath;
    }

    public function findAll(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $products = [];
        foreach ($lines as $line) {
            $products[] = json_decode($line, true);
        }
        return $products;
    }

    public function save(array $productData): bool
    {
        $products = $this->findAll();

        $lastId = !empty($products) ? end($products)['id'] : 0;

        $newId = $lastId + 1;

        $productRecord = [
            'id' => $newId,
            'name' => $productData['name'],
            'price' => (float) $productData['price']
        ];

        $jsonLine = json_encode($productRecord) . PHP_EOL;

        $wasSaved = file_put_contents($this->filePath, $jsonLine, FILE_APPEND | LOCK_EX);

        return $wasSaved !== false;
    }
}
