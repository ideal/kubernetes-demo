<?php

namespace App\Contract;

use Hyperf\Contract\IdGeneratorInterface;

class FakeIdGenerator implements IdGeneratorInterface
{
    public function generate()
    {
        return "1";
    }

    public function degenerate(int $id)
    {
        return null;
    }
}

