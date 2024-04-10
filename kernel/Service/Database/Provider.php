<?php

namespace Kernel\Service\Database;

use Kernel\Service\AbstractProvider;

use Kernel\Database\Database;

class Provider extends AbstractProvider
{

    private $serviceName = 'database';

    public function init(): void
    {
        $database = new Database();
        $this->di->set($this->serviceName, $database);
    }
} 