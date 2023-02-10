<?php
namespace App\Helpers;


class Utils{
    public static function price($harga,$harga_promo)
    {
        return auth()->user()->member && auth()->user()->member->is_active === 1 ? $harga_promo ? $harga_promo : $harga : $harga;
    }

    public function displayPrice($price,$harga_promo)
    {
        return $harga_promo ? $harga_promo : $harga;
    }
}
