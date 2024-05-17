<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use DateTime;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'Jay Thomas',
            'email' => 'jaythomas@gmail.com',
        ]);

        Post::factory(6)->create(['user_id' => $user->id]);

        Category::create(['name' => 'Sports']);
        Category::create(['name' => 'Entertainment']);
        Category::create(['name' => 'Politics']);
        Category::create(['name' => 'Economy']);
        Category::create(['name' => 'Tech']);
        Category::create(['name' => 'Health']);
        Category::create(['name' => 'Lifestyle']);
        $rs = new RolesSeeder;
        $rs->run();
    }
}
