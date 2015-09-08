@extends('app')

@section('content')

<div class="row">

  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
       <h3 class="box-title">أعطال تم التبليغ عنها</h3>
      </div>
      <div class="box-body">
        <table border="1" class="table table-striped table-bordered table-hover " style="width:100%"  align="center">
            @if(count($failures->toArray()) != 0)
        	<thead>
        	<tr>
        	<th style="text-align:right">#</th>  <th style="text-align:right">العطل</th>  <th style="text-align:right">الآلة</th>
        	<th style="text-align:right">تاريخ العطل</th>
        	<th style="text-align:right">نوع العطل</th>
        	<th style="text-align:right">الوردية</th>
        	<th style="text-align:right">درجة الأهمية</th>


        	</tr>
        	</thead>
        	<tbody>

@foreach($failures as $failure)

<tr>
<td>{{ $failure->fail_id }}</td>
<td>{{ $failure->fail_name }}</td>
<td>{{ $failure->machine_id}}</td>
<td>{{ $failure->fail_time->format('Y-m-d') }}</td>
<td>{{ $failure->fail_type }}</td>
<td>{{ $failure->shift }}</td>
	<td>{{ $failure->fail_importance }}</td>
</tr>
@endforeach
            @else
            <h4> لم يتم العثور على سجلات</h4>
            @endif
        	</tbody>
       </table>
      </div>
<div class="box-footer">
 <a class="btn btn-primary pull-right" href="{{ action('FailuresController@index') }}">المـزيـد</a>
</div>
    </div><!---/Box--->
  </div>
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
       <h3 class="box-title"> إصلاحات بإنتظار الإعتماد</h3>
      </div>
      <div class="box-body">
        <table  border="1" class="table table-striped table-bordered table-hover " style="width:100%"  align="center">
        @if(count($finrepairs->toArray()) != 0)
          <thead>
            <tr>
            <th style="text-align:right">#</th>
            <th style="text-align:right">تاريخ الإصلاح</th>
            <th style="text-align:right">حالة الإصلاح</th>
            <th style="text-align:right">الفنيين</th>
            <th style="text-align:right">قطع غيار</th>
            </tr>
          </thead>
          <tbody>
            @foreach($finrepairs as $finrepair)
        <tr>
        <td>{{ $finrepair->rep_id }}</td>
        <td>{{ $finrepair->rep_date->format('Y-m-d') }}</td>
        <td>{{ $finrepair->rep_status }}</td>
        <td>{{ $finrepair->technicans()->lists('tech_name')->implode(',') }}</td>
        <td>{{ $finrepair->spare_parts()->lists('part_name')->implode(',') }}</td>

        </tr>
            @endforeach

            @else
            <h4> لم يتم العثور على سجلات</h4>
            @endif
          </tbody>
        </table>
      </div>
<div class="box-footer">
 <a class="btn btn-primary pull-right" href="maintainance/repairs/waiting">المـزيـد</a>
</div>
    </div><!---/Box--->
  </div>
</div>
<div class="row">


  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
       <h3 class="box-title"> إصلاحات معتمدة</h3>
      </div>
      <div class="box-body">
        <table  border="1" class="table table-striped table-bordered table-hover " style="width:100%"  align="center">
        @if(count($apprepairs->toArray()) != 0)
          <thead>
            <tr>
            <th style="text-align:right">#</th>
            <th style="text-align:right">تاريخ الإصلاح</th>
            <th style="text-align:right">حالة الإصلاح</th>
            <th style="text-align:right">الفنيين</th>
            <th style="text-align:right">قطع غيار</th>
            </tr>
          </thead>
          <tbody>
            @foreach($apprepairs as $apprepair)
        <tr>
        <td>{{ $apprepair->rep_id }}</td>
        <td>{{ $apprepair->rep_date->format('Y-m-d') }}</td>
        <td>{{ $apprepair->rep_status }}</td>
        <td>{{ $apprepair->technicans()->lists('tech_name')->implode(',') }}</td>
        <td>{{ $apprepair->spare_parts()->lists('part_name')->implode(',') }}</td>

        </tr>
            @endforeach

            @else
            <h4> لم يتم العثور على سجلات</h4>
            @endif
          </tbody>
        </table>
      </div>
<div class="box-footer">
 <a class="btn btn-primary pull-right" href="maintainance/repairs/waiting">المـزيـد</a>
</div>
    </div><!---/Box--->
  </div>
</div>

@endsection
@stop
