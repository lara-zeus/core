<?php

return [
    'name' => 'Lara Zeus',

    /**
     * always end with /
     * if you made this your default route '/', remember to comment out the default route in web.php
     */
    'path' => 'forms/',

    'user' => [
        'prefix' => 'user',
        'middleware' => ['web'],
    ],
    'admin' => [
        'prefix' => 'admin',
        'middleware' => ['web', 'auth'],
    ],

    'defaultDateFormat' => 'M, d Y · h:i a',
];
