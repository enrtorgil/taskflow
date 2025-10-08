<?php
namespace Database\Seeders\Projects;

use App\Models\Projects\TaskState;
use Illuminate\Database\Seeder;

class TaskStateSeeder extends Seeder
{
    public function run(): void
    {
        if (TaskState::count() === 0) {
            TaskState::insert([
                [
                    'name'       => 'Nueva',
                    'color'      => '#3b82f6', // azul
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name'       => 'En curso',
                    'color'      => '#f59e0b', // amarillo
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name'       => 'Lista para testear',
                    'color'      => '#8b5cf6', // violeta
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name'       => 'Hecha',
                    'color'      => '#10b981', // verde
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name'       => 'Archivada',
                    'color'      => '#6b7280', // gris
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
