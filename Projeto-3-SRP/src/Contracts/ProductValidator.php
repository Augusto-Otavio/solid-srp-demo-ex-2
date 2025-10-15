<?php

declare(strict_types=1);

namespace ProductsSRPDemo\Contracts;

interface ProductValidator
{

    public function validate(array $data): bool;

    public function getErrorMessage(): string;
}
