<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        Order::create([
            'user_id' => $user->id,
            'total_price' => 800,
            'status' => 'created',
        ]);
    }
}
