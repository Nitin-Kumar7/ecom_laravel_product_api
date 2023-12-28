<?php
 
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
      
            return [
                'name' => fake()->sentence,
                'description' => fake()->paragraph,
                'image' =>fake()->imageUrl(),  
                'product_price' =>fake()->randomFloat(2, 10, 100),
                'selling_price' =>fake()->randomFloat(2, 10, 100),
                'quantity' =>fake()->numberBetween(1, 100),
                
            ];
        
    }
}
