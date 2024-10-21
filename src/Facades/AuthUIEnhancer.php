<?php

namespace DiogoGPinto\AuthUIEnhancer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DiogoGPinto\AuthUIEnhancer\AuthUIEnhancer
 */
class AuthUIEnhancer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \DiogoGPinto\AuthUIEnhancer\AuthUIEnhancer::class;
    }
}
