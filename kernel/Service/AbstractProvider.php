<?php

namespace Kernel\Service;

use Kernel\Container\Di;

abstract class AbstractProvider
{
    protected $di;

    public function __construct(Di $di)
    {
        $this->di = $di;
    }

    abstract function init();
}