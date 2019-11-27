<?php

namespace App\Service;

use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(publishTo="consul", name="UserService", protocol="jsonrpc", server="jsonrpc")
 */
class UserService implements UserServiceInterface
{
    /**
     * @var \Hyperf\Contract\ConfigInterface
     */
    private $config;

    public function create(string $name): string
    {
        // TODO: add user

        return 'ok from ' . $this->config->get('app_name');
    }
}
