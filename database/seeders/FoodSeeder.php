<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        $pizza = Category::where('name', 'Pizza')->first();
        $pasta = Category::where('name', 'Pasta')->first();
        $salata = Category::where('name', 'Salata')->first();
        $desert = Category::where('name', 'Desert')->first();

        // PIZZE
        Food::create([
            'name' => 'Margherita',
            'description' => 'Klasična pica sa paradajz sosom i mocarelom',
            'price' => 800,
            'image' => 'margarita-pizza.jpg',
            'category_id' => $pizza->id,
            'featured' => true,
        ]);

        Food::create([
            'name' => 'Prosciutto pizza',
            'description' => 'Pica sa pršutom, rukolom i parmezanom',
            'price' => 950,
            'image' => 'prosciutto-pizza.jpg',
            'category_id' => $pizza->id,
        ]);

        // PASTE
        Food::create([
            'name' => 'Pasta sa biftekom',
            'description' => 'Kremasta pasta sa sočnim biftekom',
            'price' => 1100,
            'image' => 'biftek-pasta.jpg',
            'category_id' => $pasta->id,
            'featured' => true,
        ]);

        // SALATE
        Food::create([
            'name' => 'Cezar salata',
            'description' => 'Zelena salata sa piletinom, parmezanom i krutonima',
            'price' => 850,
            'image' => 'cezar-salata-1.jpg',
            'category_id' => $salata->id,
            'featured' => true,
        ]);

        // DESERTI
        Food::create([
            'name' => 'Čokoladni kolač',
            'description' => 'Sočan kolač od tamne čokolade',
            'price' => 450,
            'image' => 'coko-torta.jpg',
            'category_id' => $desert->id,
        ]);
    }
}
