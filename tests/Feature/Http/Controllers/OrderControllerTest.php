<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    // use RefreshDatabase, WithFaker;

    // #[Test]
    // public function index_displays_view(): void
    // {
    //     Order::factory()->count(3)->create();

    //     $response = $this->get(route('order.index'));

    //     $response->assertOk();
    //     $response->assertViewIs('order.index');
    //     $response->assertViewHas('orders');
    // }

    // #[Test]
    // public function create_displays_view(): void
    // {
    //     $response = $this->get(route('order.create'));

    //     $response->assertOk();
    //     $response->assertViewIs('order.create');
    // }

    // #[Test]
    // public function store_saves_and_redirects(): void
    // {
    //     $user = User::factory()->create();
    //     $data = [
    //         'user_id' => $user->id,
    //         'total_price' => 9999,
    //         'status' => 'pending',
    //     ];

    //     $response = $this->post(route('order.store'), $data);

    //     $this->assertDatabaseHas('orders', $data);
    //     $response->assertRedirect(route('order.index'));
    // }

    // #[Test]
    // public function show_displays_view(): void
    // {
    //     $order = Order::factory()->create();

    //     $response = $this->get(route('order.show', $order));

    //     $response->assertOk();
    //     $response->assertViewIs('order.show');
    //     $response->assertViewHas('order', $order);
    // }

    // #[Test]
    // public function edit_displays_view(): void
    // {
    //     $order = Order::factory()->create();

    //     $response = $this->get(route('order.edit', $order));

    //     $response->assertOk();
    //     $response->assertViewIs('order.edit');
    //     $response->assertViewHas('order', $order);
    // }

    // #[Test]
    // public function update_redirects(): void
    // {
    //     $order = Order::factory()->create();
    //     $user = User::factory()->create();

    //     $data = [
    //         'user_id' => $user->id,
    //         'total_price' => 8888,
    //         'status' => 'completed',
    //     ];

    //     $response = $this->put(route('order.update', $order), $data);

    //     $order->refresh();

    //     $response->assertRedirect(route('order.show', $order));

    //     $this->assertEquals($user->id, $order->user_id);
    //     $this->assertEquals(8888, $order->total_price);
    //     $this->assertEquals('completed', $order->status);
    // }

    // #[Test]
    // public function destroy_deletes_and_redirects(): void
    // {
    //     $order = Order::factory()->create();

    //     $response = $this->delete(route('order.destroy', $order));

    //     $response->assertRedirect(route('order.index'));
    //     $this->assertModelMissing($order);
    // }
}
