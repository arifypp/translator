<?php

namespace App\Http\Livewire\Backend;

use App\Models\Backend\Language;
use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class LangTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make(__('Name'))
                ->sortable(),
            Column::make(__('Short Name'))
                ->sortable(),
            Column::make(__('Username'))
                ->sortable(),
            Column::make(__('Status'))
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function query(): Builder
    {

        return Language::query()
            ->when($this->columnSearch['name'] ?? null, fn ($query, $name) => $query->where('languages.name', 'like', '%' . $name . '%'))
            ->when($this->columnSearch['shortname'] ?? null, fn ($query, $shortname) => $query->where('languages.shortname', 'like', '%' . $shortname . '%'));
    }

    public function rowView(): string
    {
        return 'backend.pages.lang.includes.langrow';
    }
}
