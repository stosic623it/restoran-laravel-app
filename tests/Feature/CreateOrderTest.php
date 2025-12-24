<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Food;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_korisnik_moze_kreirati_i_potvrditi_narudzbinu()
    {
        $user = User::factory()->create();

        $category = Category::create(['name' => 'Pizza']);

        $food = Food::create([
            'name' => 'Capricciosa',
            'description' => 'Test food',
            'price' => 900,
            'category_id' => $category->id,
        ]);

        $this->actingAs($user)
            ->post(route('order.add', $food))
            ->assertStatus(302);

        $this->actingAs($user)
            ->post(route('order.confirm'))
            ->assertStatus(302);

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'status' => 'confirmed',
        ]);
    }
}
