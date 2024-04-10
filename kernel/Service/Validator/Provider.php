<?php

namespace Kernel\Service\Validator;

use Kernel\Service\AbstractProvider;
use Kernel\Validator\Validator;

class Provider extends AbstractProvider
{
    private $serviceName = 'validator';

    public function init()
    {
        $validator = new Validator();
        $this->di->set($this->serviceName, $validator);
    }
}