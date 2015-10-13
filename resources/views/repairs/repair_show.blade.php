@extends('app')

@section('content')

@include('repairs.fail_info')
<div class="row">
<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border ">
<h4 class="box-title">تقرير الإصلاح</h4>
    </div>
    <div class="box-body">
      <table style="width:100%"  align="center">
        <tbody>
        <tr>
          <td>
          <h5>تاريخ الإصلاح: {{ $repair->rep_date }}</h5>
          </td>
          <td>
          <h5>زمن الإصلاح: {{ $repair->rep_dur }}ساعة</h5>
          </td>

        </tr>
        <tr>
          <td>
          <h5>حالة الإصلاح: {{ $repair->rep_status }}</h5>
          </td>

          <td>
          <h5>الفنيين: {{  $repair->technicans()->lists('tech_name')->implode(',')}}</h5>
          </td>
        </tr>
        <tr>
          <td>
          <h5>تفاصيل الإصلاح: {{ $repair->rep_details }}</h5>
          </td>

        </tr>

      </tbody>
      </table>
    </div><!--/Box-body-->

  </div> <!--/Box-->

</div>
<div class="col-md-6">
  <div class="box box-warning">
    <div class="box-header with-border ">
<h4 class="box-title">مستلزمات قطع الغيار</h4>
    </div>
    <div class="box-body">
      <table style="width:70%"  align="right" border="1" class="table table-striped table-bordered table-hover ">
          @if(count($parts->toArray()) != 0)
        <thead>
          <tr>
            <th>الصنف</th>
            <th>الكمية </th>
          </tr>
        </thead>
        <tbody>

        @foreach($parts as $part)
        <tr>
          <td>{{ $part->part_name }}</td>
          <td>{{ $part->pivot->part_qty }}</td>
       </tr>
        @endforeach
          @else
          <h4> لم يتم إستخدام قطع غيار في هذه العملية</h4>
          @endif
      </tbody>
      </table>
      <!-- Button trigger modal -->



    </div><!--/Box-body-->
<div class="box-footer">
  @if(Input::get('action') == 'SparePartsController@show')
@else
  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
  إعتماد</button>
  @endif

  <!-- Modal -->
  @include('partials.modal',[
    'model' => "$repair",
    'wild' => "$repair->rep_id",
    'method'=>'PATCH',
    'action'=>Input::get('action'),
    'modal_title'=>'إعتماد تقرير',
    'modal_body'=>'هل تريد إعتماد هذا التقرير'

    ])

</div>
  </div> <!--/Box-->

</div>
</div>
@endsection
@stop
