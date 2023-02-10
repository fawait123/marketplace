<?php


namespace App\Helpers;
use Carbon\Carbon;

class AutoGenerate{

    public static function code($prefix)
    {
        return $prefix.'-'.Carbon::now()->format('YmdHis');
    }
}
