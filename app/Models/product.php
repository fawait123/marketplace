<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','foto','qrcode','deskripsi','harga','harga_promo','category_id','stok'];
    public function Category()
    {
       return $this->belongsTo(Category::class);
    }

    public function detail()
    {
        return $this->hasMany(ProductDetail::class,'product_id');
    }

}
