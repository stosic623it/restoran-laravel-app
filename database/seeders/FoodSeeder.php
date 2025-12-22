<?php

namespace Database\Seeders;
use App\Models\Food;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizza = Category::where('name', 'Pizza')->first();

        Food::create([
        'name' => 'Margherita',
        'description' => 'Klasicna pica sa paradajz sosom i sirom',
        'price' => 800,
        'category_id' => $pizza->id,
        ]);
    }
}
