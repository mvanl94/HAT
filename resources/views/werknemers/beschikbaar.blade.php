@extends('layouts.app')

@section('content')
<section class="content-header">
    <a href="{{ URL::previous() }}" class="btn btn-default pl-2">Terug</a>
    <div class="row">
        <div class="col-md-12">

            <h1>Beschikbaarheid</small></h1>
            <ol class="breadcrumb pull-right">
                <li><a href="#"><i class="fa fa-dashboard"></i> {{ $module['name'] }}</a></li>
                <li class="active">{{ $module['name'] }}</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="row mt">
        <div class="col-md-4">
            <form method="GET" action="{{ route('werknemers.beschikbaar')}}">
            <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><div class="form-group">
                            <label>Dagdeel</label>
                            <select class="form-control" name="dagdeel">
                                <option name="ochtend">ochtend</option>
                                <option name="middag">middag</option>
                            </select>
                        </div></li>
                        <li class="list-group-item"><div class="form-group">
                            {!! Form::label('date', 'Datum:') !!}
                            {!! Form::date('date', old('date'), array('class' => 'form-control')) !!}
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="card-body">
                                <button class="btn btn-primary" type="submit">Zoeken</button>
                            </div>
                        </li>
                    </ul>



        </div>
    </form>



        </div>
        @if (isset($items))
        <div class="col-md-8">
            <h3>{{ count($items) }} beschikbare werknemers op {{ $date }}</h3>
            <table class="table table-responsive beschikbaarheid-table">
                <thead>
                    <tr>
                        <th>Naam</th>
                    </tr>
                </thead>
                @if (count($items) > 0 )
                @foreach ($items as $employee)
                <tr>
                    <td><a href="{{ route('werknemer.show', $employee->id) }}">{{ $employee->naam }}</a></td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
    </div>
    @endif

</section>

@endsection
