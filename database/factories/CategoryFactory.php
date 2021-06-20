<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        $slug = str_slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'image' => "category/Qw7RCwNLC3jcUJy0BewtwDKuN9ASTcQrb15b1sd3.png",
            'active' => 1,
        ];
    }
}
