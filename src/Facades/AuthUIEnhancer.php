<?php

namespace DiogoGPinto\AuthUIEnhancer\Facades;

use DiogoGPinto\AuthUIEnhancer\AuthUIEnhancerPlugin;
use Illuminate\Support\Facades\Facade;

class AuthUIEnhancer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AuthUIEnhancerPlugin::class;
    }
}
