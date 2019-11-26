<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use Hyperf\CircuitBreaker\Annotation\CircuitBreaker;

class IndexController
{
    public function index()
    {
        return "hello 😊";
    }

    public function get(int $id)
    {
        return (string) $id;
    }

    /**
     * @CircuitBreaker(timeout=0.5, failCounter=1, successCounter=1)
     *
     */
    public function create()
    {
        return "";
    }
}
