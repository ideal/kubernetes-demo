<?php

namespace App\Service;

use Hyperf\Di\Annotation\Inject;
use Hyperf\RpcServer\Annotation\RpcService;
use Hyperf\DbConnection\Db;

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
        // add user
        $ok = Db::insert('INSERT INTO user (name, intro) VALUES (?, ?)', [$name, $name]);

        $result = $ok ? 'ok' : 'failed';
        return "add user: ${name}\n${result} from " . $this->config->get('app_name');
    }
}
