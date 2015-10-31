<div class="row">
<div class="col-lg-4 col-xs-12 col-md-6">
  <!--smal-box-->

  <div class="small-box bg-navy">
    <div class="inner">
      <h3>{{$tech->tech_name}}</h3>
      <h4>&nbsp;</h4>

    </div>
    <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
  </div>

</div>
<div class="col-lg-4 col-xs-12 col-md-6">
  <!--smal-box-->

@if($tech->tech_type == "كهربائي")
  <div class="small-box bg-aqua">
    <div class="inner">
      <h3>{{$tech->tech_type}}</h3>
      <h4>&nbsp;</h4>

    </div>
    <div class="icon">
                  <i class="ion ion-ios-bolt"></i>
                </div>
              @elseif($tech->tech_type == "ميكانيكي")
              <div class="small-box bg-maroon">
                  <div class="inner">
                    <h3>{{$tech->tech_type}}</h3>
                    <h4>&nbsp;</h4>

                  </div>
                  <div class="icon">
                                <i class="ion ion-gear-a"></i>
                              </div>
                              @else
                              <div class="small-box bg-orange">
                                <div class="inner">
                                  <h3>{{$tech->tech_type}}</h3>
                                  <h4>&nbsp;</h4>

                                </div>
                                <div class="icon">
                                              <i class="ion ion-briefcase"></i>
                                            </div>
@endif
  </div>

</div>
{{--
<div class="col-lg-4 col-xs-12 col-md-6">
<!--smal-box-->
@if($stock >= 0)
<div class="small-box bg-green">
@else
<div class="small-box bg-yellow">

@endif
<div class="inner">
<h3>{{$stock}}</h3>
<h4>رصيد القطعة</h4>
</div>
<div class="icon">
<i class="ion ion-navicon-round"></i>
</div>
</div>


</div> --}}
  </div><!--/Row-->
