<div class="container">
    <div class="row">
    <div class="col-md-6">
<div class="box">
    @if (isset($item))
        {{ Form::model($item, ['route' => [sprintf('%s.update', $module['resourceful']), $item->id], 'method' => 'put', 'files' => true]) }}
    @else
        {{ Form::open(['route' => [sprintf('%s.store', $module['resourceful'])], 'files' => true]) }}
    @endif


<div class="box-body">
    <!-- {!! Form::open(['route' => 'werknemers.store']) !!} -->

    <div class="form-group">
        {!! Form::label('naam', 'Naam:') !!}
        {!! Form::text('naam', old('naam'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('adres', 'Adres:') !!}
        {!! Form::text('adres', old('adres'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('stad', 'Stad:') !!}
        {!! Form::text('stad', old('stad'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('postcode', 'Postcode:') !!}
        {!! Form::text('postcode', old('postcode'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('birthday', 'Geboortedatum:') !!}
        {!! Form::date('birthday', old('birthday'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('systeem', 'Systeem:') !!}
        {!! Form::select('systeem', [
            "Promedico" => "Promedico",
            "Medicom" => "Medicom",
            "Mira" => "Mira",
            "Microhis" => "Microhis"
        ], null, array('multiple'=>'multiple','name'=>'systeem[]')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('telefoon', 'Telefoonnummer:') !!}
        {!! Form::text('telefoon', old('telefoon'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', old('email'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('ervaring', 'Ervaring (jaren):') !!}
        {!! Form::text('ervaring', old('ervaring'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('schaal', 'Salarisschaal:') !!}
        {!! Form::text('schaal', old('schaal'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('salarisnummer', 'Salarisnummer:') !!}
        {!! Form::text('salarisnummer', old('salarisnummer'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('periodiek', 'Periodiek:') !!}
        {!! Form::date('periodiek', old('periodiek'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('beschikbaar_vanaf', 'Beschikbaar Vanaf:') !!}
        {!! Form::date('beschikbaar_vanaf', old('beschikbaar_vanaf'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('beschikbaar_tot', 'Beschikbaar Tot:') !!}
        {!! Form::date('beschikbaar_tot', old('beschikbaar_tot'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <h4>Beschikbaarheid</h4>
        <table class="table dt-responsive">
            <tr>
                <td>Tijdsdeel</td>
                <td>Maandag</td>
                <td>Dinsdag</td>
                <td>Woensdag</td>
                <td>Donderdag</td>
                <td>Vrijdag</td>
            </tr>
            <tr>
                <td>1ste 08:00-12:30</td>
                <td>{!! Form::checkbox('Monday1', 0) !!}</td>
                <td>{!! Form::checkbox('Tuesday1', 0) !!}</td>
                <td>{!! Form::checkbox('Wednesday1', 0) !!}</td>
                <td>{!! Form::checkbox('Thursday1', 0) !!}</td>
                <td>{!! Form::checkbox('Friday1', 0) !!}</td>
            </tr>
            <tr>
                <td>2de 13:00-17:00</td>
                <td>{!! Form::checkbox('Monday2', 0) !!}</td>
                <td>{!! Form::checkbox('Tuesday2', 0) !!}</td>
                <td>{!! Form::checkbox('Wednesday2', 0) !!}</td>
                <td>{!! Form::checkbox('Thursday2', 0) !!}</td>
                <td>{!! Form::checkbox('Friday2', 0) !!}</td>
            </tr>
        </table>
    </div>


    {{ Form::submit(__('Submit'), ['class'=>'btn btn-primary']) }}

</div>

{!! Form::close() !!}
</div>
</div>
</div>
</div>
