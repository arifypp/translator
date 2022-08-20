@extends('backend.layouts.app')

@section('title', __('Content Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Content Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.textlang.create')"
                    :text="__('Create Content')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.textlang-table />
        </x-slot>
    </x-backend.card>
@endsection
