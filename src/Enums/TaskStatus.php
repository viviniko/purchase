<?php

namespace Viviniko\Purchase\Enums;

class TaskStatus
{
    const NEW = 0;
    const SHIPPING = 1;
    const RECEIVED = 2;
    const REJECTED = 3;

    public static function values(){
        return [
            self::NEW => 'New',
            self::SHIPPING => 'SHIPPING',
            self::RECEIVED => 'Received',
            self::REJECTED => 'Rejected',
        ];
    }
}

