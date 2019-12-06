<?php

declare(strict_types=1);

namespace App\Service;

interface ProductServiceInterface
{
    public function add(string $name, double $price): string;
}

