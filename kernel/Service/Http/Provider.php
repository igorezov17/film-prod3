<?php

namespace Kernel\Service\Http;

use Kernel\Service\AbstractProvider;
use Kernel\Http\Request;

class Provider extends AbstractProvider
{

    private $serviceName = 'request';

    public function init()
    {
        $request = Request::createFromGlobals();
        $this->di->set($this->serviceName, $request);
    }
}