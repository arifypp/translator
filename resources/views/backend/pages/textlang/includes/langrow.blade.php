<x-livewire-tables::bs4.table.cell>
    {{ $row->sourcelangname->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->sourcetext }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->targetlangname->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->targettext }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <code>{{ $row->keyword }}</code>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
@include('backend.pages.textlang.includes.status', ['textlang' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
@include('backend.pages.textlang.includes.actions', ['textlang' => $row])
</x-livewire-tables::bs4.table.cell>