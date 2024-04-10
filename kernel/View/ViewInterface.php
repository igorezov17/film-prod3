<?php

namespace Kernel\View;

interface ViewInterface
{
    public function page($name);

    public function components($name);
}