<?php
namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Projects\ProjectSeeder;
use Database\Seeders\Projects\TaskPrioritySeeder;
use Database\Seeders\Projects\TaskSeeder;
use Database\Seeders\Projects\TaskStateSeeder;
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
            'name'  => 'Test User',
            'email' => 'test@example.com',
            // Password: 'password'
        ]);

        // Ejecutar seeders
        $this->call([
            TaskStateSeeder::class,
            TaskPrioritySeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
