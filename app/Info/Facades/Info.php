<?php
namespace App\Info\Facades;

use Illuminate\Support\Facades\Facade;

class Info extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Info\Info::class;
    }
}
