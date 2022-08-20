<?php

namespace App\Http\Livewire\Backend;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Backend\TextLanguage;

class TextlangTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make(__('Source Lang'))
                ->sortable(),
            Column::make(__('Source Text'))
                ->sortable(),
            Column::make(__('Target Lang'))
                ->sortable(),
            Column::make(__('Target Text'))
                ->sortable(),
            Column::make(__('Keyword'))
                ->sortable(),
            Column::make(__('Status'))
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function query(): Builder
    {
        return TextLanguage::query()
        ->when($this->columnSearch['sourcetext'] ?? null, fn ($query, $name) => $query->where('text_languages.sourcetext', 'like', '%' . $name . '%'))
        ->when($this->columnSearch['targettext'] ?? null, fn ($query, $shortname) => $query->where('text_languages.targettext', 'like', '%' . $shortname . '%'));
    }

    public function rowView(): string
    {
        return 'backend.pages.textlang.includes.langrow';
    }
}
