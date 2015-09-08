<div class="row">
<div class="col-md-12">
  <div class="box box-primary">
   <div class="box-header with-border">
<h4 class="box-title">معلومات العطل</h4>
<div class="box-tools pullright">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div>
   </div>
   <div class="box-body">
     <table style="width:100%"  align="center">
       <tbody>
       <tr>
         <td>
         <h5>  رقم العطل : {{ $fail->fail_id }}</h5>
         </td>
         <td>
         <h5>الآلة :{{ $fail->machine->machine_name }} </h5>
         </td>
         <td>
         <h5>  تاريخ العطل: {{ $fail->fail_time }}</h5>
         </td>
       </tr>
       <tr>
         <td>
         <h5>  نوع العطل : {{$fail->fail_type}}</h5>
         </td>
         <td>
         <h5>  الوردية : {{$fail->shift}}</h5>
        </td>
        <td>
        <h5>  مقدم الطلب : محمد إسماعيل</h5>
       </td>
       </tr>
     </tbody>
     </table>
   </div><!--/box-body-->
 </div><!--/box-->
</div>
</div><!--/row-->
