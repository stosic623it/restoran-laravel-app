<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FoodController
 */
final class FoodControllerTest extends TestCase
{
    // use AdditionalAssertions, RefreshDatabase, WithFaker;

    // #[Test]
    // public function index_displays_view(): void
    // {
    //     $food = Food::factory()->count(3)->create();

    //     $response = $this->get(route('food.index'));

    //     $response->assertOk();
    //     $response->assertViewIs('food.index');
    //     $response->assertViewHas('food', $food);
    // }

    // #[Test]
    // public function create_displays_view(): void
    // {
    //     $response = $this->get(route('food.create'));

    //     $response->assertOk();
    //     $response->assertViewIs('food.create');
    // }

    // #[Test]
    // public function store_uses_form_request_validation(): void
    // {
    //     $this->assertActionUsesFormRequest(
    //         \App\Http\Controllers\FoodController::class,
    //         'store',
    //         \App\Http\Requests\FoodStoreRequest::class
    //     );
    // }

    // #[Test]
    // public function store_saves_and_redirects(): void
    // {
    //     $name = fake()->name();
    //     $description = fake()->text();
    //     $price = fake()->numberBetween(-10000, 10000);
    //     $category = Category::factory()->create();

    //     $response = $this->post(route('food.store'), [
    //         'name' => $name,
    //         'description' => $description,
    //         'price' => $price,
    //         'category_id' => $category->id,
    //     ]);

    //     $food = Food::query()
    //         ->where('name', $name)
    //         ->where('description', $description)
    //         ->where('price', $price)
    //         ->where('category_id', $category->id)
    //         ->get();
    //     $this->assertCount(1, $food);
    //     $food = $food->first();

    //     $response->assertRedirect(route('food.index'));
    //     $response->assertSessionHas('food.id', $food->id);
    // }

    // #[Test]
    // public function show_displays_view(): void
    // {
    //     $food = Food::factory()->create();

    //     $response = $this->get(route('food.show', $food));

    //     $response->assertOk();
    //     $response->assertViewIs('food.show');
    //     $response->assertViewHas('food', $food);
    // }

    // #[Test]
    // public function edit_displays_view(): void
    // {
    //     $food = Food::factory()->create();

    //     $response = $this->get(route('food.edit', $food));

    //     $response->assertOk();
    //     $response->assertViewIs('food.edit');
    //     $response->assertViewHas('food', $food);
    // }

    // #[Test]
    // public function update_uses_form_request_validation(): void
    // {
    //     $this->assertActionUsesFormRequest(
    //         \App\Http\Controllers\FoodController::class,
    //         'update',
    //         \App\Http\Requests\FoodUpdateRequest::class
    //     );
    // }

    // #[Test]
    // public function update_redirects(): void
    // {
    //     $food = Food::factory()->create();
    //     $name = fake()->name();
    //     $description = fake()->text();
    //     $price = fake()->numberBetween(-10000, 10000);
    //     $category = Category::factory()->create();

    //     $response = $this->put(route('food.update', $food), [
    //         'name' => $name,
    //         'description' => $description,
    //         'price' => $price,
    //         'category_id' => $category->id,
    //     ]);

    //     $food->refresh();

    //     $response->assertRedirect(route('food.index'));
    //     $response->assertSessionHas('food.id', $food->id);

    //     $this->assertEquals($name, $food->name);
    //     $this->assertEquals($description, $food->description);
    //     $this->assertEquals($price, $food->price);
    //     $this->assertEquals($category->id, $food->category_id);
    // }

    // #[Test]
    // public function destroy_deletes_and_redirects(): void
    // {
    //     $food = Food::factory()->create();

    //     $response = $this->delete(route('food.destroy', $food));

    //     $response->assertRedirect(route('food.index'));

    //     $this->assertModelMissing($food);
    // }
}
