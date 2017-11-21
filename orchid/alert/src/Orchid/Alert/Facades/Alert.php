<?php

namespace Orchid\Alert\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Alert.
 *
 * @category PHP
 */
class Alert extends Facade
{
    /**
     * @return mixed
     */
    protected static function getFacadeAccessor()
    {
        return 'alert';
    }
}
