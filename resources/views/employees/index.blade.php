@extends('layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Werknemers
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Werknemers</a></li>
    <li class="active">Werknemers</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
@if(count($employees)>0)
  @foreach($employees as $employee)
    <ul class="list-group">
    <li class="list-group-item">Name: {{$employee->firstname}}</li>
    <li class="list-group-item">Email: {{$employee->middlename}}</li>
    <li class="list-group-item">Message: {{$employee->lastname}}</li>
  </ul>
  @endforeach
@endif
</div>
</section>
@endsection
