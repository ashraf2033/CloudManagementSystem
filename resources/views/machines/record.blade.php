@extends('app')
@section('head')
  <link rel="stylesheet" href="/AdminLTE-RTL/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" media="screen" title="no title" charset="utf-8">
   <link href="/AdminLTE-RTL/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="row">
<div class="col-md-12">
  <div class="box box-primary">
   <div class="box-header with-border">
<h4 class="box-title">الآلة : {{$machine->machine_name}}</h4>
<div class="box-tools pullright">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div>
   </div>
   <div class="box-body">
     <table style="width:100%"  align="center">
       <tbody>
       <tr>
         <td>
         <h5>الإسم : {{$machine->machine_name}}</h5>
         </td>
         <td>
         <h5>المورد : {{$machine->machine_supplier}}</h5>
         </td>
         <td>
         <h5>  تاريخ الشراء : {{$machine->buying_date->format('Y-m-d')}} </h5>
         </td>
       </tr>
       <tr>
         <td>
         <h5>الشركة المصنعة : {{$machine->manufacturer}}</h5>
         </td>
         <td>
         <h5>الرقم التسلسلي : {{$machine->serial_number}}</h5>
        </td>
        <td>
        <h5> </h5>
       </td>
       </tr>
     </tbody>
     </table>
   </div><!--/box-body-->
 </div><!--/box-->
</div>
</div><!--/row-->

<!--records-->
<div class="row">
  <div class="col-xs-12">
      <div class="box box-primary">
      <div class="box-header">
  <h3 class="box-title">سجل</h3>
    </div><!--.box header-->
<div class="box-body">
<div class="row">
</div>
<div><!--table-->
<div class="col-sm-12 btnss"></div>
  <table id="dataTable" border="1" class="table table-striped table-bordered table-hover " style="width:100%"  align="center">
  	<thead>
  	<tr>
  	<th style="text-align:right">#</th>
    <th style="text-align:right">رقم طلب الإصلاح</th>
    <th style="text-align:right">العطل</th>
  	<th style="text-align:right">تاريخ العطل</th>
  	<th style="text-align:right">تاريخ الصيانة</th>
  	<th style="text-align:right">نوع العطل</th>
  	<th style="text-align:right">الحالة</th>

  	</tr>
  	</thead>
  	<tbody>


  	@foreach($failures as $key => $failure)

  <tr>

  	<td>{{ $key+1 }}</td>
  	<td>{{ $failure->fail_id }}</td>
  	<td>{{ $failure->fail_name }}</td>
  	<td>{{ $failure->fail_time }}</td>
  	<td>{{ $failure->repair->rep_date or null }}</td>
  	<td>{{ $failure->fail_type }}</td>
  	<td>{{ $failure->repair->rep_status or null }}</td>



  </tr>
  	@endforeach


  	</tbody>
 </table>
</div>
</div><!--/.box-body-->
<div class="box-footer">
<!--<a href="{{ action("MachinesController@download",2) }}" title="تصدير" aria-label="Left Align" type="button" class="btn btn-primary "><span class="fa fa-file-excel-o " aria-hidden="true"></span></a>-->
{!! Form::open(['url' => 'machines/download']) !!}
{!! Form::hidden('machine', $machine->machine_id) !!}
{!! Form::button('<i class="fa fa-file-excel-o"> تصدير</i>',['class' => 'btn btn-primary','type' => 'submit' ]) !!}

{!! Form::close() !!}
</div>
 </div><!--/.box-->
 </div><!--/.col-->
</div><!--/.row-->

@endsection
@section('scripts')
<!-- dataTables script 3.3.2 JS -->
<script src="/AdminLTE-RTL/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/AdminLTE-RTL/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="/AdminLTE-RTL/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready( function () {
   $('#dataTable').DataTable({
 "language": {
   "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"

 },
 "lengthMenu": [ 5,10, 25, 50,100 ],
  "order": [ 3,'desc'],
  buttons: {
        buttons: [ 'copy', 'csv', 'excel' ]
    }



});
} );

</script>
@endsection
@stop
