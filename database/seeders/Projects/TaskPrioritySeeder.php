<?php
namespace Database\Seeders\Projects;

use App\Models\Projects\TaskPriority;
use Illuminate\Database\Seeder;

class TaskPrioritySeeder extends Seeder
{
    public function run(): void
    {
        if (TaskPriority::count() === 0) {
            TaskPriority::insert([
                [
                    'name'       => 'Baja',
                    'color'      => '#60a5fa', // azul claro
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name'       => 'Media',
                    'color'      => '#fbbf24', // naranja
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name'       => 'Alta',
                    'color'      => '#ef4444', // rojo
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
