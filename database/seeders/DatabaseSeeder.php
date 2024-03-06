<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\ThemeItem;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        \App\Models\User::factory()->create([
            'id' => 1, 
            'name' => 'Erwan',
            'email' => 'erwan@test.fr',
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::factory(10)->create();


       

        $users = \App\Models\User::all();
        $themes = ['light', 'dark', 'pinky'];

        foreach ($users as $user) {
            \App\Models\Setting::factory()->create([
                'user_id' => $user->id,
                'theme_name' => $themes[array_rand($themes)],
            ]);
        }

        $themeItems = ['light', 'dark', 'pinky'];

        foreach ($themeItems as $name) {
            ThemeItem::create([
                'name' => $name,
            ]);
        }

        $adminRole = Role::create(['name' => 'admin']);
        $redacteurRole = Role::create(['name' => 'redacteur']);
        $utilisateurRole = Role::create(['name' => 'utilisateur']);

        $admin = User::all();

        foreach($users as $index => $user) {
            if ($index === 0) {
                $user->assignRole($adminRole);
            } elseif ($index === 1 || $index === 2) {
                    $user->assignRole($redacteurRole);
            } else {
                $user->assignRole($utilisateurRole);
            }
        }

        \App\Models\Post::factory(50)->create();
    }
}
