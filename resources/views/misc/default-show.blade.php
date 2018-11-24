@extends('layouts.app')

@section('htmlheader_title')
    {{ $module['name'] }}
@endsection

@section('contentheader_title')
    {{ $module['name'] }} - Show
@endsection

@section('main-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ str_singular($module['name']) }}</h3>
        </div>
        <div>
            <div class="box-body">

                @yield('custom')

                @foreach ($item->getFillable() as $field)
                    @if ($field != 'password')
                        <div class="form-group">
                            <label for="firstname" class="font-weight-bold">{{ __(ucfirst(str_replace('_', ' ',$field))) }}</label>
                            <div>{{ $item->$field }}</div>
                        </div>
                    @endif
                @endforeach


                <div class="form-group">
                    <label for="created_at" class="font-weight-bold">{{ __('Created at') }}</label>
                    <div>
                        @if( ! empty($item->created_at) )
                            {{ format_date($item->created_at, 'local.long') }}
                        @else
                            n/a
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="updated_at" class="font-weight-bold">{{ __('Updated at') }}</label>
                    <div>
                        @if( ! empty($item->updated_at) )
                            {{ format_date($item->updated_at, 'local.long') }}
                        @else
                            n/a
                        @endif
                    </div>
                </div>

                @if( ! empty($item->deleted_at) )
                    <div class="form-group">
                        <label for="deleted_at" class="font-weight-bold">{{ __('Deleted at') }}</label>
                        <div>{{ format_date($item->deleted_at, 'local.long') }}</div>
                    </div>
                @endif
            </div>
            <!-- /.box-body -->

            @if(isset($item->deleted_at))
                {{-- todo: undelete? --}}
            @else
                <div class="box-footer">
                    <a class="btn btn-primary"
                       href="{{ route(sprintf('%s.edit', $module['resourceful']), $item->id) }}">{{ __('Edit') }}</a>
                    <a class="btn btn-default"
                       href="{{ route(sprintf('%s.index', $module['resourceful'])) }}">{{ __('Cancel') }}</a>
                </div>
            @endif
        </div>
    </div>
@endsection
