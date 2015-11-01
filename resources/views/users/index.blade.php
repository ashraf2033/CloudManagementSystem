@extends('app')

@section('head')
<!-- Bootstrap 3.3.4 -->
<!-- dataTables style -->
 <link href="/AdminLTE-RTL/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
      <div class="box box-primary">
      <div class="box-header with-border">
  <h3 class="box-title">حسابات المستخدمين</h3>
    </div><!--.box header-->
<div class="box-body">
<div class="row">
  <div class="col-xs-12">

  </div>
</div>
<div class="table-responsive"><!--table-->

  <table id="dataTable" border="1" class="table table-striped table-bordered table-hover table-condensed cf  " style="width:100%"  align="center">
  	<thead>
  	<tr>
  	<th style="text-align:right">#</th>
     <th style="text-align:right">الإسم</th>
     <th style="text-align:right">البريد الإلكتروني</th>
  	<th style="text-align:right">الدور</th>
  	<th style="text-align:right">خيارات	</th>
  	</tr>
  	</thead>
  	<tbody>
  	@foreach($users as $user)

  <tr>
  	<td>{{ $user->user_id }}</td>
  	<td>{{ $user->name }}</td>
  	<td>{{ $user->email }}</td>
  	<td>{{ $user->role }}</td>
  	<td>
  		<a href="{{ action("UsersController@show",$user)}}" title="تفاصيل" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-question-sign " aria-hidden="true"></span></a>
{{--	@can('maintain')--}}
    <a href="{{ action("UsersController@edit",$user)}}" title="تعديل" aria-label="Left Align" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit " aria-hidden="true"></span></a>
  	{{--	@endcan --}}
  	</td>
  </tr>
  	@endforeach
  	</tbody>
 </table>
</div>
</div><!--/.box-body-->
<div class="box-footer">
  <a href="{{ action("UsersController@create")}}">
      <button class="btn btn-primary " type="button" name="new"><span class="ion ion-person"></span> حساب جديد</button>
      </a>
</div>
 </div><!--/.box-->
 </div><!--/.col-->
</div><!--/.row-->
  @stop
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
