<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RepairRequest;
use App\Http\Requests\ReportFailureRequest;
use App\Http\Requests;
use Gate;
use App\Http\Controllers\Controller;
use App\Failure;
use App\SparePart;
use App\Repair;
use App\Technican;
use DB;


class RepairsController extends Controller
{


    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $page_title= 'الإصلاحات';
      $repairs = Repair::NotApproved();
      $modal_title= "حذف تقرير";
      $modal_body= "هل تريد حذف هذا التقرير";


        return view('repairs.repairs_index',compact('page_title','repairs','modal_title','modal_body'));
    }
    public function waiting()
    {
      $page_title= 'الإصلاحات';
      $repairs = Repair::Finished();
      $modal_title= "حذف تقرير";
      $modal_body= "هل تريد حذف هذا التقرير";


        return view('repairs.waiting',compact('page_title','repairs','modal_title','modal_body'));
    }
    public function archive()
    {
      $page_title= 'أرشيف الإصلاحات';
      $repairs = Repair::Approved()->sortByDesc('created_at');
      $modal_title= "حذف تقرير";
      $modal_body= "هل تريد حذف هذا التقرير";


        return view('repairs.archive',compact('page_title','repairs','modal_title','modal_body'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
    /*  if (Gate::denies('maintain')) {
        abort(403, 'هذا الإجراء ليس من صلاحياتك');
      }*/
      $page_title = "تقرير إصلاح";
      $id=$request->input('failure');
      $part_names = DB::table('spare_parts')->lists('part_name');
      $part_ids = DB::table('spare_parts')->lists('part_id');
      $parts=array_combine($part_ids,$part_names);
      $tech_names = DB::table('technicans')->lists('tech_name');
      $tech_ids = DB::table('technicans')->lists('id');
      $technicans=array_combine($tech_ids,$tech_names);
      $fail = Failure::findOrFail($id);
      return view('repairs.repair_create',compact('page_title','fail','parts','technicans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      // get all repair data
      $repairin = $request->all();
      $tech_arr = $request->input('technicans');
      $repairin['tech_no']= count($tech_arr);
      $repairin['fail_id']=$request->input('fail_id');

      //create new repair
    /*  if (Gate::denies('maintain')) {
        abort(403, 'هذا الإجراء ليس من صلاحياتك');
      }*/
      $this->validate($request, [
          'rep_dur'=>'required',
          'rep_details'=>'required',
          'rep_date'=>'required',
          'rep_status'=>'required',
          'technicans'=>'exists:technicans,id',
      ]);
      $repair = Repair::create($repairin);
      //loop throught technincans fields
      foreach ($tech_arr as $tech) {
      $tech_obj = Technican::find($tech);
      //instert into techincans pivot table
      $tech_obj->repair()->attach($repair->rep_id);
      }

      $part_arr = $request->input('part_id');
      $qty_arr = $request->input('part_qty');
        foreach ($part_arr as $key => $part){
          if($part != 0){
          $part_obj = SparePart::find($part);
          $rep_id = $repair->rep_id;
          $qty=$qty_arr[$key];
          $part_obj->repair()->attach($rep_id,['part_qty'=> $qty]);
        }
        }
        $fail = Failure::findOrFail($repairin['fail_id']);
        $fail->status = 1;
        $fail->save();
          return redirect('maintainance/repairs');
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      $modal_title= "إعتماد إصلاح";
      $modal_body= "هل تريد إعتماد هذا التقرير";
      $repair=Repair::findOrFail($id);
      $fail=Failure::findOrFail($repair->fail_id);
      $parts = $repair->spare_parts()->get();

      return view('repairs.repair_show',compact('repair','fail','parts','modal_title','modal_body'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

      $repair = Repair::findOrFail($id);
      $page_title = "تعديل إصلاح";
      $part_names = DB::table('spare_parts')->lists('part_name');
      $part_ids = DB::table('spare_parts')->lists('part_id');
      $parts=array_combine($part_ids,$part_names);
      $tech_names = DB::table('technicans')->lists('tech_name');
      $tech_ids = DB::table('technicans')->lists('id');
      $technicans=array_combine($tech_ids,$tech_names);
      $fail = Failure::findOrFail($repair->fail_id);
      return view('repairs.repair_edit',compact('repair','technicans','parts','fail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id){

     $repair = Repair::findOrFail($id);
     $repairin = $request->all();
     $tech_arr = $request->input('technicans');
     $repairin['tech_no']= count($tech_arr);


     $this->validate($request, [
         'rep_dur'=>'required',
         'rep_details'=>'required',
         'rep_date'=>'required',
         'rep_status'=>'required',
         'technicans'=>'exists:technicans,id',
     ]);
    $repair->update($repairin);
     //loop throught technincans fields

     $part_arr = $request->input('part_id');
     $qty_arr = $request->input('part_qty');
       $repair->spare_parts()->detach();
       foreach ($part_arr as $key => $part){
         if($part != 0){
         $part_obj = SparePart::find($part);
         $rep_id = $repair->rep_id;
         $qty=$qty_arr[$key];
         $part_obj->repair()->attach($rep_id,['part_qty'=> $qty]);
       }
       }

     $repair->technicans()->detach();
     foreach ($tech_arr as $tech) {
     $tech_obj = Technican::find($tech);
     $tech_obj->repair()->attach($repair);
     }

      return redirect('maintainance/repairs');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $repair = Repair::findOrFail($id);
        $repair->delete();

        return redirect('maintainance/repairs')->withSuccess('تم حذف التقرير بنجاح');
    }
    public function approve(Request $request, $id){

        $repair = Repair::findOrFail($id);
      /*  if (Gate::denies('produce')) {
            abort(403,'هذا الإجراء ليس من صلاحياتك');
        }*/

        $repair->update(['rep_status'=>'تم الإعتماد']);

        return redirect('maintainance/repairs');

    }
    public function finish(Request $request, $id){
    /*  if (Gate::denies('maintain')) {
        abort(403, 'هذا الإجراء ليس من صلاحياتك');
      }*/
        $repair = Repair::findOrFail($id);
        $repair->update(['rep_status'=>'تم']);

        return redirect('maintainance/repairs');

    }

}
