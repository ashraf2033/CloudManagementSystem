<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!--smal-box-->
    <div class="small-box bg-blue">
      <div class="inner">
        <h3>{{ $day }}</h3>
        <h4>{{ $date }}</h4>
      </div>
      <div class="icon">
                    <i class="ion ion-calendar"></i>
                  </div>
      <a href="" class="small-box-footer"><span class="">مهام هذا اليوم <i class="fa fa-arrow-circle-left"></i></span></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!--smal-box-->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{ $tasks_count }}</h3>
        <h4> مهام فحص هذا اليوم</h4>
      </div>
      <div class="icon">
                    <i class="fa fa-support"></i>
                  </div>
      <a href="{{ action("TasksController@create") }}" class="small-box-footer"><i class="fa fa-plus"></i>  إضافة مهمة جديدة</a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!--smal-box-->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{ $fails_count }}</h3>
        <h4>أعطال تم التبليغ عنها اليوم</h4>
      </div>
      <div class="icon">
                    <i class="ion ion-alert-circled"></i>
                  </div>
      <a href="{{ action("FailuresController@index") }}" class="small-box-footer">متابعة الأعطال <i class="fa fa-arrow-circle-left"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!--smal-box-->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{ $repairs_count }}</h3>
        <h4>إصلاحات جارية</h4>
      </div>
      <div class="icon">
                    <i class="ion ion-wrench"></i>
                  </div>

      <a href="{{ action("RepairsController@index") }}" class="small-box-footer">متابعة الإصلاحات الجار ية  <i class="fa fa-arrow-circle-left"></i> </a>

    </div>
  </div>
</div><!--/row-->
