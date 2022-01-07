<?php

namespace LaraZeus\Core;

use Illuminate\Support\Facades\Facade;

class CoreFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'core';
    }
}