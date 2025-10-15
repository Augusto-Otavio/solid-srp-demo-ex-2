<?php

declare(strict_types=1);

namespace ProductsSRPDemo\Application;

use ProductsSRPDemo\Contracts\ProductRepository;
use ProductsSRPDemo\Contracts\ProductValidator;

class ProductService
{
    private ProductRepository $repository;
    private ProductValidator $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data): array
    {
        if (!$this->validator->validate($data)) {
            return ['success' => false, 'message' => $this->validator->getErrorMessage()];
        }

        $isSaved = $this->repository->save($data);

        if (!$isSaved) {
            return ['success' => false, 'message' => 'Erro ao salvar o produto no arquivo.'];
        }

        return ['success' => true];
    }

    public function listAll(): array
    {
        return $this->repository->findAll();
    }
}