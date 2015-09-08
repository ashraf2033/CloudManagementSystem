  @extends('app')

  @section('content')
  <div class="row">

  <div class="col-md-6">
  <div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">{{ $task->task_name }}</h3>
  </div><!--.box header-->
  <div class="box-body">
  <table style="width:100%"  align="center">
  <tbody>

    <tr>
  <td>
    <h5>الآلة : {{$task->machine->machine_name}} </h5>
  </td>
  <td>
    <h5>الموعد : {{$task->task_date->format('Y-m-d')}} </h5>
  </td>
  <td>
    <h5>الحالة : {{$task->task_status}} </h5>
  </td>
    </tr>
    <tr>
      <td>
        <h5> نوع الصيانة : {{$task->task_type}} </h5>
      </td>
      <td>
        <h5> المسؤول  : {{$task->technican->tech_name}} </h5>
      </td>
      <td>
        <h5> قطع غيار  : {{$task->parts()->lists('part_name')->implode(',')}} </h5>
      </td>
    </tr>
  </tbody>
  </table>
</div><!--/box-body-->
<div class="box-footer">
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
إعتماد</button>
</div>
<!-- Modal -->
@include('partials.modal',[
'model' => "$task",
'wild' => "$task->task_id",
'method'=>'PATCH',
'action'=>Input::get('action'),
'modal_title'=>'إعتماد تقرير',
'modal_body'=>'هل تريد إعتماد هذا التقرير'
])
  </div><!--/box-->
  </div>
  </div><!--/row-->
  @endsection
