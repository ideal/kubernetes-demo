<?php

declare(strict_types=1);

namespace App\Service;

interface UserServiceInterface
{
    public function create(string $name): string;
}

