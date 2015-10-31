<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Technican;
class TechnicansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $page_title = "الفنيين";
      $technicans = Technican::all();
      return view('technicans.tech_index',compact('technicans','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $page_title = "إضافة فني";
        return view('technicans.tech_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $technican = $request->all();
        Technican::create($technican);
        return redirect('technicans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
$tech = Technican::findOrFail($id);
$reps = $tech->repair()->approved();
$tasks = $tech->task;
$recs = collect([$tasks,$reps])->collapse()->sortBy('created_at');

return view('technicans.tech_show',compact('tech','recs'));
//return dd($technican);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $technican = Technican::findOrFail($id);
      $technican->delete();

      return redirect('technicans');
    }
}
