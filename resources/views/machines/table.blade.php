
<html dir = "rtl">

  <head>
    <meta charset="utf-8">
    <title>{{$machine->machine_name}} سجل الآلة</title>
  </head>
  <body>
    <table align="center" style"text-align:right; border: 1px solid #000;	border-collapse: collapse;" >


        	<tr height=25 style="border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff; "  >
        	  <td  style="border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92;"
             colspan="7" align="center" >
    <h2>{{$machine->machine_name}}:سجل الماكينة</h2>
        	  </td>
        	</tr>
  <tr height=18>
    <td rowspan="2">

    </td>
    <td align="right">
    <h5>{{$machine->machine_name}}:الإسم</h5>
    </td>
<td rowspan="2" align="right">

</td>
    <td align="right">
    <h5>المورد:{{$machine->machine_supplier}}</h5>
    </td>
        <td rowspan="2" align="right"></td>
    <td align="right">
    <h5>{{$machine->buying_date->format('Y-m-d')}}:تاريخ الشراء </h5>
    </td>
  </tr>
  <tr height=18>
<td>

</td>
    <td align="right">
    <h5>{{$machine->manufacturer}}:الشركة المصنعة</h5>
    </td>
<td align="right">

</td>
    <td align="right">
    <h5>{{$machine->serial_number}}:الرقم التسلسلي</h5>
   </td>
  </tr>

  <tr height=18>
  <th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">#</th>
  <th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">رقم طلب الإصلاح</th>
  <th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">العطل</th>
  <th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">تاريخ العطل</th>
  <th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">تاريخ الصيانة</th>
  <th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">نوع العطل</th>
  <th style="text-align:right; border: 1px solid #000;	border-collapse: collapse; background-color: #2E7C92; color : #fff;">الحالة</th>

  </tr>
  @foreach($failures as $key => $failure)

<tr height=18>

  <td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $key+1 }}</td>
  <td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $failure->fail_id }}</td>
  <td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $failure->fail_name }}</td>
  <td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $failure->fail_time }}</td>
  <td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $failure->repair->rep_date or null }}</td>
  <td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $failure->fail_type }}</td>
  <td style="text-align:right; border: 1px solid #000;	border-collapse: collapse;">{{ $failure->repair->rep_status or null }}</td>



</tr>
  @endforeach
</table>
  </body>
</html>
