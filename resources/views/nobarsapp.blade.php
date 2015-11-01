<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir = "rtl">
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>

		<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link href="/AdminLTE-RTL/bootstrap/css/bootstrap_rtl.css" rel="stylesheet" type="text/css" />
		<!-- Font Awesome Icons -->
		<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
		<link href="/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<link href="/css/app.css" rel="stylesheet" type="text/css" />

		<!-- Theme style -->
		<link href="/AdminLTE-RTL/dist/css/AdminLTE_rtl.css" rel="stylesheet" type="text/css" />

		<!-- AdminLTE Skins. Choose a skin from the css/skins
		     folder instead of downloading all of them to reduce the load. -->
				 <link href="/AdminLTE-RTL/dist/css/skins/skin-red.min.css" rel="stylesheet" type="text/css" />

 @yield('head')

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

  </head>


	<body class="skin-red layout-top-nav">
	    <!-- Site wrapper -->
	    <div class="wrapper">

			<!-- Content Wrapper. Contains page content -->
			      <div class="content-wrapper">
			        <!-- Content Header (Page header) -->
			        <section class="content-header">

			        </section>

			        <!-- Main content -->
			        <section class="content">

			          <!-- Default box -->
			         @yield('content')

			        </section><!-- /.content -->
			      </div><!-- /.content-wrapper -->

						@include('footer')

			</div><!--/wrapper -->
			<script src="/AdminLTE-RTL/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
			<!-- Bootstrap 3.3.2 JS -->
			<script src="/AdminLTE-RTL/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

			<!-- AdminLTE App -->
			<script src="/AdminLTE-RTL/dist/js/app.js" type="text/javascript"></script>

			 @yield('scripts')

</body>



</html>
