
      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->

        <span class="logo-mini"><span class="icon-logo-flat2"></span></span>

          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><span class="icon-logo-flat2"> <b>النظام الإلكتروني</b></span> </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/AdminLTE-RTL/dist/img/user2-160x160.jpg" class="user-image" alt="User Image" />
                  <span class="hidden-xs">@if(\Auth::check())
                  {{ \Auth::user()->name }}</span>
                  @else
                  ضيف
                  @endif

                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/AdminLTE-RTL/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
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
                    </p>
                  </li>
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{action('UsersController@show',\Auth::user()->user_id) }}" class="btn btn-default btn-flat">الملف الشخصي</a>
                    </div>
                    <div class="pull-right">
                      @if(\Auth::check())
                      <a href="/auth/logout" class="btn btn-default btn-flat"> تسجيل الخروج</a>
                      @else
                      <a href="/auth/login" class="btn btn-default btn-flat"> تسجيل الدخول</a>
                      @endif
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>
