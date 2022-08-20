@extends('backend.layouts.app')

@section('title', __('Language Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Language Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.lang.create')"
                    :text="__('Create Language')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.lang-table />
        </x-slot>
    </x-backend.card>
@endsection
