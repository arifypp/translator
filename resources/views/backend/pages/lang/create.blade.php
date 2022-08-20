@extends('backend.layouts.app')

@section('title', __('Create Language'))



@section('content')
    <x-forms.post :action="route('admin.lang.store')">
        <x-backend.card>
            <x-slot name="header">
                {{ __('Create Language') }}
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.lang.manage')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : ''}">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">{{ __('Language Name') }}</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="Shortname" class="col-md-2 col-form-label">{{ __('Language Shortname') }}</label>
                        <div class="col-md-10">
                            <input type="text" name="shortname" class="form-control" placeholder="{{ __('en, bd, nr') }}" value="{{ old('shortname') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">{{ __('Status') }}</label>

                        <div class="col-md-10">
                            <select name="status" class="form-control" required>
                                <option value="{{ __('active') }}" selected>{{ __('Active') }}</option>
                                <option value="{{ __('in-active') }}">{{ __('In-Active') }}</option>
                            </select>
                        </div>
                    </div><!--form-group-->
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">{{ __('Create Language')}}</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
