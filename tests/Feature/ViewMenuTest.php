<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewMenuTest extends TestCase
{
    use RefreshDatabase;

    public function test_meni_je_prikazan()
    {
        $category = Category::create(['name' => 'Pizza']);

        Food::create([
            'name' => 'Margherita',
            'description' => 'Test pizza',
            'price' => 800,
            'category_id' => $category->id,
        ]);

        $response = $this->get('/menu');

        $response->assertStatus(200);
        $response->assertSee('Margherita');
    }
}
