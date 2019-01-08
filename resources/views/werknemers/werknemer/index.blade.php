@extends('layouts.app')

@section('content')
<section class="content-header">
    <a href="{{ URL::previous() }}" class="btn btn-default pl-2">Terug</a>

<div class="row">
    <div class="col-md-12">

    <h1>{{ $item->naam}}</h1>
        <ol class="breadcrumb pull-right">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ $module['name'] }}</a></li>
        <li class="active">{{ $module['name'] }}</li>
    </ol>
</div>
</div>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-4">
          <ul class="list-group">
            <li class="list-group-item text-right"><span class="pull-left"><strong>Adres</strong></span> {{ $item->adres }}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Postcode</strong></span> {{ $item->postcode }}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Stad</strong></span> {{ $item->stad }}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Geboortedatum</strong></span> {{ $item->birthday }}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span> {{ $item-> email }}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Telefoon</strong></span> {{ $item->telefoon }}</li>
          </ul>
      </div>
      <div class="col-md-4">
            <ul class="list-group">
              <li class="list-group-item text-right"><span class="pull-left"><strong>Ervaring</strong></span> {{ $item->ervaring}}</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Schaal</strong></span> {{ $item->schaal }}</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Salarisnummer</strong></span> {{ $item->salarisnummer }}</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Periodiek</strong></span> {{ $item->periodiek }}</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Systeem</strong></span> {{ str_replace(",", ", ", $item->systeem) }}</li>
            </ul>
        </div>
        <div class="col-md-4">
              <ul class="list-group">
                <li class="list-group-item text-right"><span class="pull-left"><strong>Beschikbaar vanaf</strong></span> {{ $item->beschikbaar_vanaf}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Beschikbaar tot</strong></span> {{ $item->beschikbaar_tot }}</li>
              </ul>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
    <div class="block calendar-block">
        <p style='display:inline-block;'><span style='display:inline-block; background-color: white; width:16px; height:16px;'>&nbsp</span>Onbeschikbaar</p>
        <p style='display:inline-block;'><span style='display:inline-block; background-color: green; width:16px; height:16px;'>&nbsp</span>Beschikbaar</p>
        <p style='display:inline-block;'><span style='display:inline-block; background-color: red; width:16px; height:16px;'>&nbsp</span>Ingepland</p>
        <table class="table table-responsive beschikbaarheid-table" data-employee-id="{{ $item->id }}">
            <thead>
                <tr>
                    <th>Week</th>
                    <th>Dagdeel</th>
                    <th>Maandag</th>
                    <th>Dinsdag</th>
                    <th>Woensdag</th>
                    <th>Donderdag</th>
                    <th>Vrijdag</th>
                </tr>
            </thead>
            @foreach ($item->beschikbaarheid as $weekOfYear => $week)
                <tr>
                    <td rowspan="2">Week {{ $weekOfYear }}</td>
                    <td>09:00-13:00</th>
                    @foreach ($week as $d=>$dag)
                        <td class="dagdeel-cell beschikbaarheid-status{{ $dag->ochtend}}" data-date="{{ $d }}" data-dagdeel="ochtend" data-status="{{ $dag->ochtend }}">{{ $d}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>13:00 - 17:00</td>
                    @foreach ($week as $d=>$dag)
                        <td class="dagdeel-cell beschikbaarheid-status{{ $dag->middag}}" data-date="{{ $d }}" data-dagdeel="middag" data-status="{{ $dag->middag }}">{{ $d}}</td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div></div>
</div>
</section>

@endsection
