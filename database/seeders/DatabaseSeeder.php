<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'khaled',
        //     'email' => 'khaled@gmail.com',
        //     'password' => bcrypt('kikoniko')
        // ]);

        $user = User::where('id', '1')->first();

        $user->menu()->create([
            'name' => "{$user->name} Menu"
        ]);
    }
}