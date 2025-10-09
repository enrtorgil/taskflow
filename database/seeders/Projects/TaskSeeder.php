<?php
namespace Database\Seeders\Projects;

use App\Models\Projects\Project;
use App\Models\Projects\Task;
use App\Models\Projects\TaskActivity;
use App\Models\Projects\TaskComment;
use App\Models\Projects\TaskDependency;
use App\Models\Projects\TaskPoint;
use App\Models\Projects\TaskPriority;
use App\Models\Projects\TaskState;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::first();
        $user    = User::first();

        $states     = TaskState::pluck('id', 'name');
        $priorities = TaskPriority::pluck('id', 'name');

        if (! $project || ! $user) {
            return;
        }

        if (Task::count() === 0) {
            $tasks = [
                [
                    'project_id'       => $project->id,
                    'task_state_id'    => $states['Nueva'] ?? null,
                    'task_priority_id' => $priorities['Alta'] ?? null,
                    'name'             => 'Configurar entorno de desarrollo',
                    'description'      => 'Instalar dependencias, configurar .env y ejecutar migraciones iniciales.',
                    'date_start'       => now()->subDays(7),
                    'date_end'         => now()->subDays(5),
                    'order'            => 1,
                ],
                [
                    'project_id'       => $project->id,
                    'task_state_id'    => $states['En curso'] ?? null,
                    'task_priority_id' => $priorities['Media'] ?? null,
                    'name'             => 'Diseñar estructura de base de datos',
                    'description'      => 'Definir relaciones y crear migraciones para proyectos y tareas.',
                    'date_start'       => now()->subDays(3),
                    'date_end'         => now()->addDays(2),
                    'order'            => 2,
                ],
                [
                    'project_id'       => $project->id,
                    'task_state_id'    => $states['Hecha'] ?? null,
                    'task_priority_id' => $priorities['Baja'] ?? null,
                    'name'             => 'Crear vista Kanban básica',
                    'description'      => 'Mostrar tareas agrupadas por estado usando Tailwind y Alpine.js.',
                    'date_start'       => now()->subDays(2),
                    'date_end'         => now()->addDays(1),
                    'order'            => 3,
                ],
            ];

            $createdTasks = [];

            foreach ($tasks as $taskData) {
                $task = Task::create($taskData);
                $task->users()->attach($user->id);

                // Comentario de ejemplo
                TaskComment::create([
                    'task_id' => $task->id,
                    'user_id' => $user->id,
                    'body'    => 'Comentario de prueba para la tarea "' . $task->name . '".',
                ]);

                // Puntos de ejemplo
                TaskPoint::create([
                    'task_id' => $task->id,
                    'points'  => rand(1, 8),
                ]);

                // Actividad de ejemplo
                TaskActivity::create([
                    'task_id'       => $task->id,
                    'user_id'       => $user->id,
                    'field_changed' => 'state',
                    'old_value'     => 'Nueva',
                    'new_value'     => 'En curso',
                ]);

                $createdTasks[] = $task;
            }

            // Dependencias (la 2 depende de la 1, la 3 depende de la 2)
            if (count($createdTasks) >= 3) {
                TaskDependency::create([
                    'task_id'            => $createdTasks[1]->id,
                    'depends_on_task_id' => $createdTasks[0]->id,
                ]);

                TaskDependency::create([
                    'task_id'            => $createdTasks[2]->id,
                    'depends_on_task_id' => $createdTasks[1]->id,
                ]);
            }
        }
    }
}
