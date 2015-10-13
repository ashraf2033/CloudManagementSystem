@extends('app')

@section('content')

@include('spareparts.boxes')
<div class="row">
<div class="col-md-12">

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">سجل الصنف</h3>
  </div>
<div class="box-body">
  <table id="dataTable" border="1" class="table table-striped table-bordered table-hover table-condensed" style="width:100%"  align="center">
  	<thead>
  	<tr>

  	<th style="text-align:right">تاريخ الحركة</th>
  	<th style="text-align:right">نوع الحركة</th>
  	<th style="text-align:right">الكمية</th>
  	</tr>
  	</thead>
    <tbody>
@foreach($recs as $key => $rec)
@if( get_class($rec) === 'App\Trans')

<tr>

<td style="text-align:right">{{ $rec->created_at }}</td>
<td style="text-align:right">{{ $rec->note }}</td>
<td style="text-align:right">{{$rec->type}}{{$rec->part_qty}}</td>
</tr>
@elseif(get_class($rec) === 'App\Repair')

<td style="text-align:right">{{$rec->created_at}}</td>
<td style="text-align:right"><a href="{{action("RepairsController@show",[$rec->rep_id,'action'=>'SparePartsController@show'])}}">عملية إصلاح رقم {{$rec->rep_id}}</a></td>
<td style="text-align:right">-{{$rec->pivot->part_qty}}</td>
</tr>
@elseif(get_class($rec) === 'App\Task')

<td style="text-align:right">{{$rec->created_at}}</td>
<td style="text-align:right"><a href="{{action("TasksController@show",[$rec->task_id,'action'=>'SparePartsController@show'])}}">عملية صيانة رقم {{$rec->task_id}}</a></td>
<td style="text-align:right">-{{$rec->pivot->part_qty}}</td>
</tr>
@endif

@endforeach
<tr>
  <td></td>
  <td style="text-align:left"><h4><b>المجموع</b></h4></td>
  <td style="text-align:right"><h4><b>{{$stock}}</b></h4></td>

</tr>
  	</tbody>
 </table>
</div>
<div class="box-footer">
<a href="{{ action("TransesController@create",['type'=> '+','part_id'=>$part->part_id,'submit'=>'إضافة']) }}"><button type="button" name="add" class="btn btn-success"><span class="fa fa-plus"></span> إضافة رصيد</button></a>
<a href="{{ action("TransesController@create",['type'=> '-','part_id'=>$part->part_id,'submit'=>'طرح']) }}"><button type="button" name="add" class="btn btn-danger"><span class="fa fa-minus"></span> طرح رصيد</button></a>
</div>
</div><!--/Box-->
</div>
</div>

@endsection
