<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DateTime;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Permission;
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
            'name' => 'Administrator',
            'email' => 'admin@curve.com',
            'password' => '111111',
            'profile_pic' => 'user/profile-pic.jpg',
            'phone' => '+237670307126',
            'occupation' => 'Software Developer',
            'bio' => 'Hi there! I am the admin of Curve'
        ]);

        Post::factory(6)->create(['user_id' => $user->id]);

        Category::create(['name' => 'Sports']);
        Category::create(['name' => 'Entertainment']);
        Category::create(['name' => 'Politics']);
        Category::create(['name' => 'Economy']);
        Category::create(['name' => 'Tech']);
        Category::create(['name' => 'Health']);
        Category::create(['name' => 'Lifestyle']);

        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Editor']);
        Role::create(['name' => 'User']);
    }
}
