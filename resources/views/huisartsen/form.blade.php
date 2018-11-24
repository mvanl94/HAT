
<div class="box box-primary">



<div class="box-body">
    {!! Form::open(['route' => 'huisarts.store']) !!}

    <div class="form-group">
        {!! Form::label('praktijknaam', 'Naam:') !!}
        {!! Form::text('praktijknaam', old('praktijknaam'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('adres', 'Adres:') !!}
        {!! Form::text('adres', old('adres'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('postcode', 'Postcode:') !!}
        {!! Form::text('postcode', old('postcode'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('telefoon', 'Telefoon:') !!}
        {!! Form::text('telefoon', old('telefoon'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', old('email'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('contactpersoon', 'Contactpersoon:') !!}
        {!! Form::text('contactpersoon', old('contactpersoon'), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('telefoon_contactpersoon', 'Telefoon contactpersoon:') !!}
        {!! Form::text('telefoon_contactpersoon', old('telefoon_contactpersoon'), array('class' => 'form-control')) !!}
    </div>

    {{ Form::submit(__('Submit'), ['class'=>'btn btn-primary']) }}

</div>

{!! Form::close() !!}
</div>
