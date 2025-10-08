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
            Project::create([
                'responsible_id' => $user?->id,
                'name'           => 'Proyecto Demo',
                'date_start'     => now()->subDays(10),
                'date_end'       => now()->addDays(20),
                'status'         => true,
            ]);
        }
    }
}
