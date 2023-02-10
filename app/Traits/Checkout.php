<?php

namespace App\Traits;


trait Checkout {
    public function price($harga,$harga_promo)
    {
        return auth()->user()->member && auth()->user()->member->is_active === 1 ? $harga_promo : $harga;
    }
}
