<div class="row body">
  <div class="col-md-6">
                <!-- Custom Tabs for *****support**** (Pulled to the right) -->
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs pull-right">
                    <li><a href="#tab_1-1" data-toggle="tab">هذا الشهر</a></li>
                    <li><a href="#tab_1-2" data-toggle="tab">هذا الأسبوع</a></li>
                    <li class="active"><a href="#tab_1-3" data-toggle="tab">اليوم</a></li>

                    <li class="pull-left header"><i class="fa fa-support"></i>الصيانة الوقائية</li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane" id="tab_1-1">
                      <p>  {{ $month}} {{$year}} </p>
                      <div><!--table-->
                      <table class="table table-striped table-hover table-bordered">
                          @if(count($tasksMonth) != 0 )
                        <thead>
                          <tr>
                          <th>#</th>
                          <th>المهمة</th>
                          <th>الآلة</th>
                          <th>الحالة</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($tasksMonth as $key => $taskMonth)
                          <tr>
                            <td><a href="{{ action("TasksController@show",[$taskMonth,'action'=>'TasksController@finish'])}}">{{$taskMonth->task_id}}</a></td>
                            <td>{{$taskMonth->task_name}}</td>
                            <td>{{$taskMonth->machine->machine_name}}</td>
                            <td>
                              @if($taskMonth->task_status == "مجدولة")
                              <span class="label label-primary">{{$taskMonth->task_status}}</span>
                              @elseif($taskMonth->task_status == "تمت")
                              <span class="label label-success">{{$taskMonth->task_status}}</span>
                              @endif
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      @else
                      <h3>لا يوجد مهام هذا الشهر</h3>
                          @endif
                      </table>
                    </div><!-- /table div -->
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_1-2">
                      <p>  {{ $month}} {{$year}} </p>
                      <div><!--table-->
                        @if(count($tasksWeek) != 0 )

                      <table class="table table-striped table-hover table-bordered">

                        <thead>
                          <tr>
                          <th>#</th>
                          <th>المهمة</th>
                          <th>الآلة</th>
                          <th>الحالة</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tasksWeek as $key => $taskWeek)
                          <tr>
                            <td><a href="{{ action("TasksController@show",[$taskWeek,'action'=>'TasksController@finish'])}}">{{$taskWeek->task_id}}</a></td>
                            <td>{{$taskWeek->task_name}}</td>
                            <td>{{$taskWeek->machine->machine_name}}</td>
                            <td>
                              @if($taskWeek->task_status == "مجدولة")
                              <span class="label label-primary">{{$taskWeek->task_status}}</span>
                              @elseif($taskWeek->task_status == "تمت")
                              <span class="label label-success">{{$taskWeek->task_status}}</span>
                              @endif
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                        @else
                        <h3>لا يوجد مهام هذا الأسبوع</h3>
                            @endif
                      </table>


                    </div><!-- /table div -->
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane active" id="tab_1-3">
                      <p>{{$day}} {{ $date }}</p>
                      <div><!--table-->
                      <table class="table table-striped table-hover table-bordered">
                          @if(count($tasksToday) != 0 )
                        <thead>
                          <tr>
                          <th>#</th>
                          <th>المهمة</th>
                          <th>الآلة</th>
                          <th>الحالة</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($tasksToday as $key => $taskToday)
                          <tr>
                            <td><a href="{{ action("TasksController@show",[$taskToday,'action'=>'TasksController@finish'])}}">{{$taskToday->task_id}}</a></td>
                            <td>{{$taskToday->task_name}}</td>
                            <td>{{$taskToday->machine->machine_id}}</td>
                            <td>
                              @if($taskWeek->task_status == "مجدولة")
                              <span class="label label-primary">{{$taskWeek->task_status}}</span>
                              @elseif($taskWeek->task_status == "تمت")
                              <span class="label label-success">{{$taskWeek->task_status}}</span>
                              @endif
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      @else
                      <h3>لا يوجد مهام هذا اليوم</h3>
                          @endif

                      </table>
                    </div><!-- /table div -->
                    </div><!-- /.tab-pane -->
                  </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
              </div><!-- /.col -->
              <div class="col-md-6">
                <!-- Custom Tabs for *****fails**** (Pulled to the right) -->
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs pull-right">
                    <li><a href="#tab_2-1" data-toggle="tab">هذا الشهر</a></li>
                    <li><a href="#tab_2-2" data-toggle="tab">هذا الأسبوع</a></li>
                    <li class="active"><a href="#tab_2-3" data-toggle="tab">اليوم</a></li>

                    <li class="pull-left header"><i class="ion ion-alert-circled"></i>الأعطال</li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane" id="tab_2-1">
                      <p>  {{ $month}} {{$year}} </p>
                      <div><!--table-->
                      <table class="table table-striped table-hover table-bordered">
                          @if(count($failsMonth) != 0 )
                        <thead>
                          <tr>
                          <th>#</th>
                          <th>العطل</th>
                          <th>الآلة</th>
                          <th>الأهمية</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($failsMonth as $key => $failMonth)
                          <tr>
                            <td><a href="{{ action("FailuresController@show",$failMonth)}}">{{$failMonth->fail_id}}</a></td>
                            <td>{{$failMonth->fail_name}}</td>
                            <td>{{$failMonth->machine->machine_name}}</td>
                            <td>
                              @if($failMonth->fail_importance == "هام")
                              <span class="label label-warning">{{$failMonth->fail_importance}}</span>
                              @elseif($failMonth->fail_importance == "هام جداً")
                              <span class="label label-danger">{{$failMonth->fail_importance}}</span>
                              @elseif($failMonth->fail_importance == "عادي")
                              <span class="label label-primary">{{$failMonth->fail_importance}}</span>
                              @endif
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      @else
                      <h3>لا يوجد إصلاحات هذا الشهر</h3>
                          @endif
                      </table>
                    </div><!-- /table div -->
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane" id="tab_2-2">
                      <p>  {{ $month}} {{$year}} </p>
                      <div><!--table-->
                      <table class="table table-striped table-hover table-bordered">
                          @if(count($failsWeek) != 0 )
                        <thead>
                          <tr>
                          <th>#</th>
                          <th>العطل</th>
                          <th>الآلة</th>
                          <th>الأهمية</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($failsWeek as $key => $failWeek)
                          <tr>
                            <td><a href="{{ action("FailuresController@show",[$failWeek])}}">{{$failWeek->fail_id}}</a></td>
                            <td>{{$failWeek->fail_name}}</td>
                            <td>{{$failWeek->machine->machine_name}}</td>
                            <td>
                              @if($failWeek->fail_importance == "هام")
                              <span class="label label-warning">{{$failWeek->fail_importance}}</span>
                              @elseif($failWeek->fail_importance == "هام جداً")
                              <span class="label label-danger">{{$failWeek->fail_importance}}</span>
                              @elseif($failWeek->fail_importance == "عادي")
                              <span class="label label-primary">{{$failWeek->fail_importance}}</span>
                              @endif
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      @else
                      <h3>لا يوجد إصلاحات هذا الأسبوع</h3>
                          @endif
                      </table>
                    </div><!-- /table div -->
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane active" id="tab_2-3">
                      <p>{{$day}} {{ $date }}</p>
                      <div><!--table-->
                      <table class="table table-striped table-hover table-bordered">
                          @if(count($failsToday) != 0 )
                        <thead>
                          <tr>
                          <th>#</th>
                          <th>العطل</th>
                          <th>الآلة</th>
                          <th>الأهمية</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($failsToday as $key => $failToday)
                          <tr>
                            <td><a href="{{ action("FailuresController@show",[$failToday])}}">{{$failToday->fail_id}}</a></td>
                            <td>{{$failToday->fail_name}}</td>
                            <td>{{$failToday->machine->machine_name}}</td>
                            <td>
                              @if($failToday->fail_importance == "هام")
                              <span class="label label-warning">{{$failToday->fail_importance}}</span>
                              @elseif($failToday->fail_importance == "هام جداً")
                              <span class="label label-danger">{{$failToday->fail_importance}}</span>
                              @elseif($failToday->fail_importance == "عادي")
                              <span class="label label-primary">{{$failToday->fail_importance}}</span>
                              @endif
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      @else
                      <h3>لا يوجد إصلاحات هذا اليوم</h3>
                          @endif
                      </table>
                    </div><!-- /table div -->
                    </div><!-- /.tab-pane -->
                  </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
                          </div><!-- /.col -->
            </div><!-- /.row -->
<div class="row">
  <div class="col-md-6">
                <!-- Custom Tabs for *****REPAIRS**** (Pulled to the right) -->
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs pull-right">
                    <li><a href="#tab_3-1" data-toggle="tab">هذا الشهر</a></li>
                    <li><a href="#tab_3-2" data-toggle="tab">هذا الأسبوع</a></li>
                    <li class="active"><a href="#tab_3-3" data-toggle="tab">اليوم</a></li>

                    <li class="pull-left header"><i class="fa fa-wrench"></i>الإصلاحات</li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane" id="tab_3-1">
                      <p>  {{ $month}} {{$year}} </p>
                      <div><!--table-->
                      <table class="table table-striped table-hover table-bordered">
                          @if(count($repairsMonth) != 0 )
                        <thead>
                          <tr>
                          <th>#</th>
                          <th>العطل</th>
                          <th>الآلة</th>
                          <th>الحالة</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($repairsMonth as $key => $repairMonth)
                          <tr>
                            <td><a href="{{ action("TasksController@show",[$repairMonth,'action'=>'TasksController@finish'])}}">{{$repairMonth->rep_id}}</a></td>
                            <td>{{$repairMonth->failure->fail_name}}</td>
                            <td>{{$repairMonth->failure->machine->machine_name}}</td>
                            <td>
                              @if($repairMonth->rep_status == "جاري الإصلاح")
                              <span class="label label-warning">{{$repairMonth->rep_status}}</span>
                              @elseif($repairMonth->rep_status == "تم")
                              <span class="label label-primary">{{$repairMonth->rep_status}}</span>
                              @elseif($repairMonth->rep_status == "تم الإعتماد")
                              <span class="label label-success">{{$repairMonth->rep_status}}</span>
                              @endif
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      @else
                      <h3>لا يوجد إصلاحات هذا الشهر</h3>
                          @endif
                      </table>
                    </div><!-- /table div -->
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane" id="tab_3-2">
                      <p>  {{ $month}} {{$year}} </p>
                      <div><!--table-->
                      <table class="table table-striped table-hover table-bordered">
                          @if(count($repairsWeek) != 0 )
                        <thead>
                          <tr>
                          <th>#</th>
                          <th>العطل</th>
                          <th>الآلة</th>
                          <th>الحالة</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($repairsWeek as $key => $repairWeek)
                          <tr>
                            <td><a href="{{ action("TasksController@show",[$repairWeek,'action'=>'TasksController@finish'])}}">{{$repairWeek->rep_id}}</a></td>
                            <td>{{$repairWeek->failure->fail_name}}</td>
                            <td>{{$repairWeek->failure->machine->machine_name}}</td>
                            <td>
                              @if($repairWeek->rep_status == "جاري الإصلاح")
                              <span class="label label-warning">{{$repairWeek->rep_status}}</span>
                              @elseif($repairWeek->rep_status == "تم")
                              <span class="label label-primary">{{$repairWeek->rep_status}}</span>
                              @elseif($repairWeek->rep_status == "تم الإعتماد")
                              <span class="label label-success">{{$repairWeek->rep_status}}</span>
                              @endif
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      @else
                      <h3>لا يوجد إصلاحات هذا الأسبوع</h3>
                          @endif
                      </table>
                    </div><!-- /table div -->
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane active" id="tab_3-3">
                      <p>{{$day}} {{ $date }}</p>
                      <div><!--table-->
                      <table class="table table-striped table-hover table-bordered">
                          @if(count($repairsToday) != 0 )
                        <thead>
                          <tr>
                          <th>#</th>
                          <th>العطل</th>
                          <th>الآلة</th>
                          <th>الحالة</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($repairsToday as $key => $repairToday)
                          <tr>
                            <td><a href="{{ action("RepairsController@show",[$repairToday,'action'=>'RepairsController@finish'])}}">{{$repairToday->rep_id}}</a></td>
                            <td>{{$repairToday->failure->fail_name}}</td>
                            <td>{{$repairToday->failure->machine->machine_name}}</td>
                            <td>
                              @if($repairToday->rep_status == "جاري الإصلاح")
                              <span class="label label-warning">{{$repairToday->rep_status}}</span>
                              @elseif($repairToday->rep_status == "تم")
                              <span class="label label-primary">{{$repairToday->rep_status}}</span>
                              @elseif($repairToday->rep_status == "تم الإعتماد")
                              <span class="label label-success">{{$repairToday->rep_status}}</span>
                              @endif
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      @else
                      <h3>لا يوجد إصلاحات هذا اليوم</h3>
                          @endif
                      </table>
                    </div><!-- /table div -->
                    </div><!-- /.tab-pane -->
                  </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
              </div><!-- /.col -->

            </div><!-- /.row -->
