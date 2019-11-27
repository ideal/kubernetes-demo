<?php

namespace App\Service;

use Hyperf\Di\Annotation\Inject;
use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(publishTo="consul", name="UserService", protocol="jsonrpc", server="jsonrpc")
 */
class UserService implements UserServiceInterface
{
    /**
     * @Inject
     * @var \Hyperf\Contract\ConfigInterface
     */
    private $config;

    public function create(string $name): string
    {
        // TODO: add user

        return 'ok from ' . $this->config->get('app_name');
    }
}
