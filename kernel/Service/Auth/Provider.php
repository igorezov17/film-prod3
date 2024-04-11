<?php

namespace Kernel\Service\Auth;

use Kernel\Auth\Auth;
use Kernel\Session\Session;
use Kernel\Database\Database;
use Kernel\ConfigData\ConfigData;
use Kernel\Service\AbstractProvider;

class Provider extends AbstractProvider
{

    private $serviceName = 'auth';

    public function init()
    {
        $session    = new Session();
        $database   = new Database();
        $config     = new ConfigData();

        $auth = new Auth($session, $database, $config);
        $this->di->set($this->serviceName, $auth);
    }
}