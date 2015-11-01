@extends('app')

@section('content')

@include('users.boxes')
<div class="row">
<div class="col-md-12">

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">سجل {{$user->name}}</h3>
  </div>

<div class="box-body">
  <table id="dataTable" border="1" class="table table-striped table-bordered table-hover table-condensed" style="width:100%"  align="center">
  	<thead>
  	<tr>
  	<th style="text-align:right">التاريخ</th>
<th style="text-align:right">العملية</th>
<th style="text-align:right">رقم العملية</th>


  	</tr>
  	</thead>
    <tbody>

@foreach($recs as $key => $rec)

@if(get_class($rec) === 'App\Repair')

<td style="text-align:right">{{$rec->created_at}}</td>
<td style="text-align:right"><{{$rec->fail->fail_name}}</td>
<td style="text-align:right"><a href="{{action("RepairsController@show",[$rec->rep_id,'action'=>'RepairsController@show'])}}">عملية إصلاح رقم {{$rec->rep_id}}</a></td>

</tr>
@elseif(get_class($rec) === 'App\Task')

<td style="text-align:right">{{$rec->created_at}}</td>
<td style="text-align:right"><{{$rec->task_name}}</td>
<td style="text-align:right"><a href="{{action("TasksController@show",[$rec->task_id,'action'=>'TasksController@show'])}}">عملية صيانة رقم {{$rec->task_id}}</a></td>

</tr>
@elseif(get_class($rec) === 'App\Failure')

<td style="text-align:right">{{$rec->created_at}}</td>
<td style="text-align:right">{{$rec->fail_name}}</td>
<td style="text-align:right"><a href="{{action("FailuresController@show",[$rec->fail_id])}}">بلاغ رقم {{$rec->fail_id}}</a></td>

</tr>
@elseif(get_class($rec) === 'App\Trans')

<td style="text-align:right">{{$rec->created_at}}</td>
<td style="text-align:right">{{$rec->note}}</td>
<td style="text-align:right"><a href="{{action("SparePartsController@show",[$rec->part_id])}}">{{ App\SparePart::find($rec->part_id)->part_name }}</a></td>

</tr>

@endif

@endforeach

  	</tbody>
 </table>
</div>
<div class="box-footer">
</div>

</div><!--/Box-->
</div>
</div>

@endsection
