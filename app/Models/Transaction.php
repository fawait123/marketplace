<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];
    use HasFactory;


    public function detail()
    {
        return $this->hasMany(TransactionDetail::class,'transaction_id');
    }
}
