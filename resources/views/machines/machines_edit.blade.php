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

  @include('machines.form')


</div>
<div class="box-footer">
{!! Form::submit("تعديل",['class' =>'btn btn-primary ']) !!}
  {!! Form::close() !!}
  <a href="#" title="حذف" aria-label="Left Align" type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash " aria-hidden="true"></span>&nbsp;حذف</a>
{{--  @endcan --}}
</div>
@include('partials.modal',[
'model' => "$machine",
'wild' => "$machine->machine_id",
'method'=>'DELETE',
'action'=>'MachinesController@destroy',
'modal_title'=>'حذف آلة',
'modal_body'=>'هل تريد حذف هذه الآلة'
])

</div>
</div><!--/box-->
</div>
@include('errors.errors')

@stop
