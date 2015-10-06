@extends('app')


@stop
@section('content')
<div class="row">
<div class="col-md-12">

<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">
    {!! $failure->fail_name !!}
  </h3>
@if($label =="هام جداً")

  <span class="label label-danger">
      <i> {!! $label !!}</i>
  </span>
@elseif($label == "هام")
<span class="label label-warning">
    <i> {!! $label !!}</i>
</span>
@else
<span class="label label-primary">
    <i> {!! $label !!}</i>
</span>
@endif
<div class="box-tools pullright">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div>

</div><!--.box header-->
<div class="box-body">
  <table style="width:100%"  align="center">
    <tbody>
    <tr>
      <td>
      <h5>  رقم العطل : {{ $failure->fail_id }}</h5>
      </td>
      <td>
      <h5>الآلة :{{ $failure->machine->machine_name }} </h5>
      </td>
      <td>
      <h5>  تاريخ العطل: {{ $failure->fail_time }}</h5>
      </td>
    </tr>
    <tr>
      <td>
      <h5>  نوع العطل : {{$failure->fail_type}}</h5>
      </td>
      <td>
      <h5>  الوردية : {{$failure->shift }}</h5>
     </td>
     <td>
       <h5>  مقدم الطلب : {{$failure->user->name}} </h5>
    </td>
    </tr>
  </tbody>
  </table>
<h4>{!! $failure->fail_details !!}</h4>
</div>
<div class="box-footer">

  @can('maintain')
  <a href="{{ action("RepairsController@create",['failure'=>$failure])}}" title="إصلاح" aria-label="Left Align" type="button" class="btn btn-success"><span class="glyphicon glyphicon-wrench " aria-hidden="true"></span> &nbsp;إصلاح</a>
    @endcan
    @can('produce')
  <a href="{{ action("FailuresController@edit",$failure)}}" title="تعديل" aria-label="Left Align" type="button" class="btn btn-primary "><span class="glyphicon glyphicon-edit " aria-hidden="true"></span> &nbsp;تعـديل</a>
    <a href="#" title="تفاصيل" aria-label="Left Align" type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash " aria-hidden="true"></span>&nbsp;حذف</a>
    @endcan
</div>
@include('partials.modal',[
  'model' => "$failure",
  'wild' => "$failure->fail_id",
  'method'=>'DELETE',
  'action'=>'FailuresController@destroy',
  'modal_title'=>'حذف بلاغ',
  'modal_body'=>'هل تريد حذف هذا البلاغ'
  ])

</div><!--/box-->

</div><!--/col-->
</div><!--/row-->
@stop
