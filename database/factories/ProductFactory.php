<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name'=>$this->faker->name,
            'foto'=>$this->faker->imageUrl(640, 480, 'animals', true),
            'qrcode'=>$this->faker->ean13(),
            'deskripsi'=>$this->faker->text,
            'harga'=>$this->faker->randomNumber(5, true),
            'harga_promo'=>$this->faker->randomNumber(5, true),
            'category_id'=>rand(1,2),
            'stok'=>rand(10,20)
        ];
    }
}
