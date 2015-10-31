<?php

namespace App\Http\Controllers;
use App\Failure;
use App\Machine;
use Illuminate\Http\Request;
use App\Http\Requests\ReportFailureRequest;
use App\Http\Controllers\Controller;
use DB;
use Gate;
use Excel;

class FailuresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
		$failures = Failure::waiting();
    $section_title ="الصيانة";

    $page_title = "الأعطال";
    $page_description = "سجل الأعطال";
        return view('failures/index',compact('failures','page_title','page_description','section_title'));
    }
    public function export()
    {
return view('failures.export');
    }
    public function download(Request $request)
    {
    //  return $request->period;
      $date = date('Y-m-d');
      Excel::create("تقرير أعطال-".date('Y-m-d'), function($excel) use($request) {
      $author = $request->author;
        // Set the title
$excel->setTitle('تقرير أعطال');

// Chain the setters
$excel->setCreator($author)
      ->setCompany('شركة بشير السكسك');
///*----------- sheet----------*///
      $excel->sheet('sheet', function($sheet) use($request) {
        $sheet->setRightToLeft(true);

    //  $sheet->mergeCells('A1:G1');
        $sheet->setFontFamily('Arial');
      $scope = $request->period;
      if ($scope == 'DateRange' ) {
        $date1 = $request->date1;
        $date2 = $request->date2;
        $failures = Failure::$scope($date1,$date2);
      }
      else{
      $failures = Failure::$scope();
    }
        $sheet->loadView('failures.table',compact('failures'));

    });

})->export('xls');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
    $section_title ="الصيانة";
      $page_title = "بلاغ جديد";
      $machine_names = DB::table('machines')->lists('machine_name');
      $machine_ids = DB::table('machines')->lists('machine_id');
      $machine_list= array_combine($machine_ids,$machine_names);
    /*  if(Gate::denies('produce')){
        abort(403, 'أنت غير مخول بالقيام بهذا الفعل');
      }*/
		return view('failures/create',compact('page_title','section_title','machine_list'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ReportFailureRequest $request)
    {
        //

        Failure::create($request->all());
        return redirect('maintainance/failures');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($fail_id)
    {
    $section_title ="الصيانة";
    $page_title ="تفاصيل العطل";
       $failure = Failure::findOrFail($fail_id);
       $label=$failure->fail_importance;
       return view('failures.show',compact('failure','label','section_title','page_title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($fail_id)
    {
    $section_title ="الصيانة";
		$failure = Failure::findOrFail($fail_id);
    $page_title = "تعديل بلاغ";
    $machine_names = DB::table('machines')->lists('machine_name');
    $machine_ids = DB::table('machines')->lists('machine_id');
    $machine_list= array_combine($machine_ids,$machine_names);

		return view('failures.edit',compact('failure','page_title','section_title','machine_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ReportFailureRequest $request, $fail_id)
    {

     $failure = Failure::findOrFail($fail_id);
		$failure->update($request->all());
		 return redirect('maintainance/failures');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($fail_id)
    {
        $failure = Failure::findOrFail($fail_id);
        $failure->delete();
        return redirect('maintainance/failures')
            ->withSuccess('The post was deleted.');

    }
}
