@extends('app')
@section('head')
<!-- Bootstrap 3.3.4 -->
<!-- dataTables style -->
 <link href="/AdminLTE-RTL/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')


<div class="row">


    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
         <h3 class="box-title">مهام مجدولة هذا الأسبوع</h3>
         <div class="box-tools pullright">
         <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
       </div>
        </div>
        <div class="box-body">
          <div><!--table-->
          @if(count($tasks->toArray()) != 0)
          <table id="dataTable" border="1" class="table table-striped table-bordered table-hover dataTable " style="width:100%" >
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
              </tr>
              </thead>
              <tbody>

              @foreach($weektasks as $weektask)
            <tr>
              <td>{{ $weektask->task_id }}</td>
              <td>{{ $weektask->task_name }}</td>
              <td>{{ $weektask->machine->machine_name }}</td>
                <td>{{ $weektask->task_date->format('Y-m-d') }}</td>
                <td>{{ $weektask->task_status }}</td>
                <td>{{ $weektask->task_type }}</td>
                <td>{{ $weektask->technican->tech_name }}</td>
                <td>{{ $weektask->parts()->lists('part_name')->implode(',') }}</td>

  @endforeach
        @else

          <h2> لا يوجد مهام مجدولة هذا الأسبوع </h2>
        @endif
          	<thead>

          	</thead>

         </table>
        </div>
  <div class="box-footer">
   <a class="btn btn-primary pull-right" href="{{ action('TasksController@index') }}">المـزيـد</a>
  </div>

    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
     <h3 class="box-title">مهام مجدولة</h3>
     <div class="box-tools pullright">
     <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
   </div>
    </div>
    <div class="box-body">
      <div><!--table-->
      @if(count($tasks->toArray()) != 0)
      <table  border="1" class="table table-striped table-bordered table-hover dataTable" style="width:100%" >
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

@endforeach
    @else

      <h2> لا يوجد مهام مجدولة  </h2>
    @endif
        <thead>

        </thead>

     </table>
    </div>
<div class="box-footer">
<a class="btn btn-primary pull-right" href="{{ action('TasksController@index') }}">المـزيـد</a>
</div>

</div>
</div>

</div>
</div>






@endsection
@section('scripts')

<script src="/AdminLTE-RTL/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/AdminLTE-RTL/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready( function () {
   $('.dataTable').DataTable({
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
