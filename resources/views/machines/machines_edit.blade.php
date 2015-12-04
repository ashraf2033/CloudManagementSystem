@extends('app')
@section('head')
<link rel="stylesheet" href="/AdminLTE-RTL/plugins/datepicker/datepicker3.css" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="col-md-6">


<div class="box">
<div class="box-header">
<h3 class="box-title">تعديل بيانات {!! $machine->machine_name !!}</h3>
</div><!--.box header-->
<div class="box-body">
  {!! Form::model($machine,['method' => 'PATCH','action' => ['MachinesController@update',$machine->machine_id]]) !!}

  @include('machines.form',['submitbtn' => 'تعديل'])

  {!! Form::close() !!}
</div>
</div><!--/box-->
</div>
@include('errors.errors')

@stop
