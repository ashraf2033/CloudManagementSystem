@extends('app')

@section('content')

@include('technicans.boxes')
<div class="row">
<div class="col-md-12">

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">سجل {{$tech->tech_name}}</h3>
  </div>

<div class="box-body">
  <table id="dataTable" border="1" class="table table-striped table-bordered table-hover table-condensed" style="width:100%"  align="center">
  	<thead>
  	<tr>

  	<th style="text-align:right">التاريخ</th>
  	<th style="text-align:right">المهمة</th>

  	</tr>
  	</thead>
    <tbody>
@foreach($recs as $key => $rec)

@if(get_class($rec) === 'App\Repair')

<td style="text-align:right">{{$rec->created_at}}</td>
<td><a href="{{action("RepairsController@show",[$rec->rep_id,'action'=>'RepairsController@show'])}}">{{$rec->failure->fail_name}}</a></td>

</tr>
@elseif(get_class($rec) === 'App\Task')

<td style="text-align:right">{{$rec->created_at}}</td>
<td><a href="{{action("TasksController@show",[$rec->task_id,'action'=>'TasksController@show'])}}">{{ $rec->task_name }}</a></td>

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
