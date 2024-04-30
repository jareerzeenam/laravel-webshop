<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
            'email' => 'jareer@email.com',
            'password' => bcrypt('123'),
        ]);

        Product::factory(4)
            ->hasVariants(5)
            ->has(Image::factory(3)->sequence( fn(Sequence $sequence) => [
                'featured' => $sequence->index === 0,
            ]))
            ->create();
    }
}
