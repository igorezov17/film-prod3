<?php

namespace Kernel\Service\Redirect;

use Kernel\Http\Redirect;
use Kernel\Http\RedirectInterface;
use Kernel\Service\AbstractProvider;


class Provider extends AbstractProvider
{
    private $serviceName = 'redirect';

    public function init(): void
    {
        $redirect = new Redirect();
        $this->di->set($this->serviceName, $redirect);
    }

}