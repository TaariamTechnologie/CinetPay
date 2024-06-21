<?php

namespace Taariam\Cinetpay;

use Illuminate\Support\Facades\Facade;

class Cinetpay extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cinetpay';
    }
}
