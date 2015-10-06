
<html>

<!--<link rel="stylesheet" href="resources/views/failures/table.css" media="screen" title="no title" charset="utf-8">-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <head>
    <meta charset="utf-8">
    <title>ورقة عمل</title>
  </head>
  <body>

    <table align="center" style"text-align:right; border: 1px solid #000;	border-collapse: collapse;" >


    	<tr height=25 style="border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff; "  >
    	  <td  style="border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92;"
         colspan="7" align="center" >
<h2>تقرير أعطال</h2>
    	  </td>
    	</tr>
      <tr height=18>
    	<th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">#</th>
    	<th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">تاريخ العطل</th>
      <th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">العطل</th>
      <th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">الآلة</th>
    	<th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">نوع العطل</th>
    	<th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">الوردية</th>
    	<th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">درجة الأهمية</th>

    	</tr>

    	<tbody>
    	@foreach($failures as $failure)

    <tr height=18>
    	<td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;" class = "cell">{{ $failure->fail_id }}</td>
    	<td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $failure->fail_time }}</td>
    	<td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $failure->fail_name }}</td>
    	<td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $failure->machine->machine_name}}</td>
    	<td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $failure->fail_type }}</td>
    	<td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $failure->shift }}</td>

    	<td style="text-align:right; border: 1px solid #000">{{ $failure->fail_importance }}</td>

    </tr>
    	@endforeach
    	</tbody>
   </table>
  </body>
</html>
