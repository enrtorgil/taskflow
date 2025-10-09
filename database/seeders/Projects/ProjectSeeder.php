<?php
namespace Database\Seeders\Projects;

use App\Models\Projects\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (Project::count() === 0) {
            Project::insert([
                [
                    'responsible_id' => $user?->id,
                    'name'           => 'Proyecto Demo Web',
                    'date_start'     => now()->subDays(10),
                    'date_end'       => now()->addDays(20),
                    'status'         => true,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ],
                [
                    'responsible_id' => $user?->id,
                    'name'           => 'Proyecto API Interna',
                    'date_start'     => now()->subDays(5),
                    'date_end'       => now()->addDays(15),
                    'status'         => true,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ],
            ]);
        }
    }
}
