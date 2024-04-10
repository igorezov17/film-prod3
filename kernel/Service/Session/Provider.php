<?php

namespace Kernel\Service\Session;

use Kernel\Session\Session;
use Kernel\Service\AbstractProvider;

class Provider extends AbstractProvider
{

    private $serviceName = 'session';

    public function init()
    {
        $session = new Session();
        $this->di->set($this->serviceName, $session);
    }

}