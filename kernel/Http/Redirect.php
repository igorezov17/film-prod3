<?php

namespace Kernel\Http;

use Kernel\Http\RedirectInterface;

class Redirect implements RedirectInterface
{
    public function to($uri)
    {
        return header("location: $uri");
        exit;
    }
}