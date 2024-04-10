<?php

return [
    Kernel\Service\Http\Provider::class,
    // Kernel\Service\View\Provider::class,
    Kernel\Service\Validator\Provider::class,
    Kernel\Service\Redirect\Provider::class,
    Kernel\Service\Session\Provider::class,
    Kernel\Service\Database\Provider::class,
];