<?php

declare(strict_types=1);

namespace ProductsSRPDemo\Domain;

use ProductsSRPDemo\Contracts\ProductValidator;

class SimpleProductValidator implements ProductValidator
{
    private string $error = '';

    public function validate(array $data): bool
    {
        if (empty($data['name'])) {
            $this->error = 'O nome do produto é obrigatório.';
            return false;
        }

        if (strlen($data['name']) < 2 || strlen($data['name']) > 100) {
            $this->error = 'O nome do produto deve ter entre 2 e 100 caracteres.';
            return false;
        }

        if (!isset($data['price']) || !is_numeric($data['price'])) {
            $this->error = 'O preço é obrigatório e deve ser um número.';
            return false;
        }

        if ((float)$data['price'] < 0) {
            $this->error = 'O preço não pode ser negativo.';
            return false;
        }

        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->error;
    }
}