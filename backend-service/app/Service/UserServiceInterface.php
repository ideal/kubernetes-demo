<?php

declare(strict_types=1);

namespace App\Service;

interface ServiceServiceInterface
{
    public function create(string $name): string;
}

