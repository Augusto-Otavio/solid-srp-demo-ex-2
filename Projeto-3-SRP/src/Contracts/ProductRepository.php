<?php

declare(strict_types=1);

namespace ProductsSRPDemo\Contracts;

interface ProductRepository
{
    public function save(array $productData): bool;

    public function findAll(): array;
}