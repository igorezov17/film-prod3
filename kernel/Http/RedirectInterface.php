<?php

namespace Kernel\Http;

interface RedirectInterface
{
    public function to($uri);
}