<?php
namespace App\Livewire;

use App\Models\Projects\Project;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ProjectsTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setEmptyMessage(__('app.no_records'));
    }

    public function builder(): Builder
    {
        return Project::query()->with('responsible');
    }

    public function filters(): array
    {
        return [
            SelectFilter::make(__('app.deleted_filter'))
                ->options([
                    ''     => __('app.all'),
                    'with' => __('app.include_deleted'),
                    'only' => __('app.only_deleted'),
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === 'only') {
                        $builder->onlyTrashed();
                    } elseif ($value === 'with') {
                        $builder->withTrashed();
                    }
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('app.name'), 'name')->sortable()->searchable(),
            Column::make(__('app.responsible'), 'responsible.name')->sortable()->searchable(),
            Column::make(__('app.start_date'), 'date_start')
                ->sortable()->format(fn($v) => $v?->format('d/m/Y') ?? '-'),
            Column::make(__('app.end_date'), 'date_end')
                ->sortable()->format(fn($v) => $v?->format('d/m/Y') ?? '-'),
            Column::make(__('app.status'), 'status')
                ->format(fn($value, $row) =>
                    $row->deleted_at
                        ? '<span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-200 text-gray-700">' . __('app.deleted') . '</span>'
                        : ($value
                            ? '<span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">' . __('app.active') . '</span>'
                            : '<span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">' . __('app.inactive') . '</span>')
                )->html(),
        ];
    }
}
