<?php

namespace Database\Factories;

use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->name();
        $slug = str_slug($product_name);

        return [
            'product_name' => $product_name,
            'slug' => $slug,
            'product_image' => "product/Apb2foSqlDULdoXF1qrQz2JiqicggL3hydQPOBKz.jpg",
            'brand_name' => $this->faker->title(),
            'mrp_price' => 150,
            'selling_price' => 125,
            'piece' => 10,
            'returnable' => 1,
            'specification' => $this->faker->paragraph(),
            'product_status_type_id' => 2,
            'active' => 1,
        ];
    }
}
