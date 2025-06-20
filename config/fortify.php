<?php

use Laravel\Fortify\Features;

return [

    'guard' => 'web',

    'passwords' => 'users',

    'username' => 'email',

    'email' => 'email',

    'home' => '/dashboard',

    'features' => [
        Features::resetPasswords(),
        // Fitur lain jika perlu
    ],
];
