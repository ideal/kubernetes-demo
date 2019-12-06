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

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\CircuitBreaker\Annotation\CircuitBreaker;
use Hyperf\Di\Annotation\Inject;

class IndexController
{
    /**
     * @Inject
     * @var \App\Service\UserServiceInterface
     *
     */
    private $userService;

    /**
     * @Inject
     * @var \App\Service\ProductServiceInterface
     *
     */
    private $productService;

    public function index(ResponseInterface $response)
    {
        $response->withHeader("Content-Type", "text/html; charset=utf-8");
        return $response->raw("hello 😊");
    }

    public function get(int $id)
    {
        return (string) $id;
    }

    /**
     * @CircuitBreaker(timeout=0.5, failCounter=1, successCounter=1)
     *
     */
    public function create(RequestInterface $request)
    {
        $name = $request->input('name');
        if (!$name) {
            return 'Need a name';
        }

        return $this->userService->create($name);
    }

    public function product()
    {
        return $this->productService->add("iPhone", 20.05);
    }
}
