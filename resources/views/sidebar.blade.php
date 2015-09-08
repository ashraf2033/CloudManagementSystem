<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/AdminLTE-RTL/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>@if(\Auth::check())
        {{ \Auth::user()->name }}
          @if(Gate::allows('maintain'))
           - قسم الصيانة
          @elseif(Gate::allows('produce'))
           - قسم الإنتاج
          @endif
        @else
        ضيف
        @endif</p>
        <a href="#"><i class="fa fa-circle text-success"></i> متصل</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">

      <li class="treeview">
        <a href="/">
          <i class="fa fa-dashboard"></i> <span>الشاشة الرئيسية</span> <i class="fa fa-angle-left pull-right"></i>
        </a>

      </li>
      <li class="header">قسم الصيانة</li>
      <li class="treeview">
        <a href="{{ action('PagesController@check') }}">
          <i class="fa fa-life-ring"></i>
          <span>الصيانة الوقائية</span>
        </a>
      </li>
      <li class="treeview">
        <a href="{{ action('PagesController@maintainance') }}">
          <i class="glyphicon glyphicon-wrench"></i>
          <span>الصيانة التصحيحية</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ action('PagesController@maintainance') }}"><i class="fa fa-circle-o"></i>الرئيسية</a></li>
          <li><a href="{{ action('FailuresController@index') }}"><i class="fa fa-circle-o"></i>سجل الأعطال</a></li>
          <li><a href="{{ action('RepairsController@index') }}"><i class="fa fa-circle-o"></i>الإصلاحات</a></li>
        </ul>
      </li>
  <li class="header">قسم الإنتاج</li>
      <li class="treeview">
        <a href="">
      <i class="fa fa-cogs"></i>
      <span>قسم الإنتاج</span>

    </a>
    <ul class="treeview-menu">
      <li><a href="../layout/top-nav.html"><i class="fa fa-cog"></i> فرعي</a></li>
      <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> فرعي</a></li>
      <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> فرعي</a></li>
    </ul>
  </li>
    <li class="header">المصنع</li>
  <li class="treeview">
    <a href="{{ action('TechnicansController@index') }}">
      <i class="ion-ios-people"></i>
      <span>الفنيين</span>
    </a>
  </li>
  <li class="treeview">
    <a href="{{ action('MachinesController@index') }}">
      <i class="ion-ios-cog"></i>
      <span>الآلات</span>
    </a>
  </li>

  <li class="treeview">
    <a href="{{ action('SparePartsController@index') }}">
      <i class="ion-ios-gear"></i>
      <span>قطع الغيار</span>
    </a>
  </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
