<?php

namespace LaraZeus\Core;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LaraZeus\Core\Skeleton\SkeletonClass
 */
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
