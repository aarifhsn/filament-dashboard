<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create categories
        Category::factory()->count(20)->create();

        // Create tags first
        $tags = Tag::factory()->count(40)->create();

        // Create products
        Product::factory()->count(80)->create()->each(function ($product) use ($tags) {
            // Attach some of the existing tags (1–3 per product)
            $product->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Create orders
        Order::factory()->count(100)->create();
    }
}
