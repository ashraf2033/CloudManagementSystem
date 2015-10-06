@extends('app')
@section('content')

<div class="row">
  <div class="col-xs-12">
      <div class="box box-primary">
      <div class="box-header">
  <h3 class="box-title">مهمات مجدولة</h3>
    </div><!--.box header-->
<div class="box-body">
<div class="row">
  <div class="col-md-12">


  </div>
</div>
<div><!--table-->
<table id="dataTable" border="1" class="table table-striped table-bordered table-hover " style="width:100%" >
  	<thead>
  	<tr>
  	<th style="text-align:right">#</th>
     <th style="text-align:right">الإسم</th>
  	<th style="text-align:right">الآلة</th>
  	<th style="text-align:right">موعد المهمة</th>
  	<th style="text-align:right">الحالة</th>
  	<th style="text-align:right">نوع الصيانة</th>
  	<th style="text-align:right">المسؤول</th>
  	<th style="text-align:right">قطع غيار</th>
  	<th style="text-align:right">خيارات</th>
  	</tr>
  	</thead>
  	<tbody>

    @foreach($tasks as $task)
  <tr>
    <td>{{ $task->task_id }}</td>
    <td>{{ $task->task_name }}</td>
    <td>{{ $task->machine->machine_name }}</td>
      <td>{{ $task->task_date->format('Y-m-d') }}</td>
      <td>{{ $task->task_status }}</td>
      <td>{{ $task->task_type }}</td>
      <td>{{ $task->technican->tech_name }}</td>
      <td>{{ $task->parts()->lists('part_name')->implode(',') }}</td>


    <td>
      <a href="{{ action("TasksController@edit",$task)}}" title="تعديل" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit " aria-hidden="true"></span></a>
      <a href="{{ action("TasksController@show",[$task,'action'=>'TasksController@finish'])}}" title="تمت" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-ok " aria-hidden="true"></span></a>
      <a href="#" title="حذف" aria-label="Left Align" type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash " aria-hidden="true"></span></a>
  	</td>
@include('partials.modal',[
  'model' => "$task",
  'wild' => "$task->task_id",
  'method'=>'DELETE',
  'action'=>'TasksController@destroy',
  'modal_title'=>' حذف مهمة',
  'modal_body'=>'هل تريد حذف هذا السجل'
  ])
    </td>
  </tr>
        @endforeach
  	</tbody>
 </table>
</div>
</div><!--/.box-body-->
 <div class="box-footer">
   <a href="{{ action("TasksController@create")}}">
       <button class="btn btn-primary " type="button" name="new">إضافة</button>
       </a>

 </div>
 </div><!--/.box-->
 </div><!--/.col-->
</div><!--/.row-->
@endsection
@section('scripts')
<!-- dataTables script 3.3.2 JS -->
<script src="/AdminLTE-RTL/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/AdminLTE-RTL/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready( function () {
   $('#dataTable').DataTable({
 "language": {
   "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"

 },
 "lengthMenu": [ 5,10, 25, 50,100 ],
  "order": [ 3,'desc']
});
} );
</script>
@endsection

@stop
