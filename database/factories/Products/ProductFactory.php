<?php

namespace Database\Factories\Products;

use Illuminate\Database\Eloquent\Factories\Factory;

use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $isSale = rand(0, 1);
        $isTrackedStocks = rand(0, 1);

        $name = $this->faker->words(rand(1, 4), true).' '.Str::random(5);

        return [
            'sku' => 'P-'.strtoupper(Str::random(10)),
            'serial_no' => strtoupper(Str::random(10)),
            'barcode_no' => $this->faker->ean13(),
            'model' => $this->faker->safeHexColor(),
            'name' => $name,
            'name_slug' => Str::slug($name),
            'price' => rand(700, 1250),
            'sale_price' => $isSale ? rand(200, 500) : 0,
            'description' => $this->faker->sentence(),
            'stocks' => $isTrackedStocks ? rand(1, 999) : NULL,
            'is_tracked_stocks' => $isTrackedStocks,
            'is_onsale' => $isSale,
            'is_featured' => rand(0, 1),
            'is_posted' => 1
        ];
    }
}
