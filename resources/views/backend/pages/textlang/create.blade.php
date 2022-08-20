@extends('backend.layouts.app')

@section('title', __('Create Content'))



@section('content')
    <x-forms.post :action="route('admin.textlang.store')">
        <x-backend.card>
            <x-slot name="header">
                {{ __('Create Content') }}
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.textlang.manage')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : ''}">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">{{ __('Source Text') }}</label>
                        <div class="col-md-10">
                            <input type="text" name="sourcetext" class="form-control" placeholder="{{ __('Source Text') }}" value="{{ old('sourcetext') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="Language" class="col-md-2 col-form-label">{{ __('Source Language') }}</label>
                        <div class="col-md-10">
                            <select name="sourcelanguage" class="form-control" required>
                                @foreach( App\Models\Backend\TextLanguage::languages() as $lang )
                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="Target Text" class="col-md-2 col-form-label">{{ __('Target Text') }}</label>
                        <div class="col-md-10">
                            <input type="text" name="targettext" class="form-control" placeholder="{{ __('Target Text') }}" value="{{ old('targettext') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="language" class="col-md-2 col-form-label">{{ __('Target Language') }}</label>
                        <div class="col-md-10">
                            <select name="targetlanguage" class="form-control" required>
                                @foreach( App\Models\Backend\TextLanguage::languages() as $lang )
                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="keyword" class="col-md-2 col-form-label">{{ __('Keyword') }}</label>
                        <div class="col-md-10">
                            <input type="text" name="keyword" class="form-control" placeholder="{{ __('Keyword') }}" value="{{ old('keyword') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="status" class="col-md-2 col-form-label">{{ __('Status') }}</label>
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
                <button class="btn btn-sm btn-primary float-right" type="submit">{{ __('Create Content')}}</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
