@extends('app')
@section('head')
<link rel="stylesheet" href="/AdminLTE-RTL/plugins/datepicker/datepicker3.css" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="col-md-6">


<div class="box">
<div class="box-header">
<h3 class="box-title">إضافة آلة جديدة</h3>
</div><!--.box header-->
<div class="box-body">
{!! Form::open(['url' => 'machines']) !!}

@include('machines.form',['submitbtn' => 'إضافة'])

{!! Form::close() !!}
</div>
</div><!--/box-->
</div>
@include('errors.errors')

@stop
