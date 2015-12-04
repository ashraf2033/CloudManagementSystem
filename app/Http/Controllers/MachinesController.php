<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AddMachineRequest;
use App\Http\Controllers\Controller;
use App\Machine;
use App\Failure;
use App\Repair;
use Excel;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $machines = Machine::all();

        return view('machines.machines_index',compact('machines'));
    }
    public function download(Request $request)
    {
    //  return $request->period;
      $date = date('Y-m-d');
      Excel::create("سجل ماكينة-".date('Y-m-d'), function($excel) use($request) {
      $author = $request->author;
        // Set the title
  $excel->setTitle('سجل ماكينة');

  // Chain the setters
  $excel->setCreator($author)
      ->setCompany('شركة بشير السكسك');
  ///*----------- sheet----------*///
      $excel->sheet('sheet', function($sheet) use($request) {
        $sheet->setRightToLeft(true);

    //  $sheet->mergeCells('A1:G1');
        $sheet->setFontFamily('Arial');
      $machine = Machine::findOrFail($request->machine);
      $failures = $machine->failure;
    $sheet->loadView('machines.table',compact('machine','failures'));

    });

  })->export('xls');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('machines.machines_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(AddMachineRequest $request)
    {
        Machine::create($request->all());
        return redirect('machines');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      $machine = Machine::findOrFail($id);
    //  $failures = Failure::where("machine_id",$id)->where("status","!=",0)->get();
$failures = $machine->failure()->repaired();
      $tasks = $machine->task()->Finished();
$recs = collect([$failures,$tasks])->collapse()->sortByDesc('created_at');
      return view('machines.record',compact('machine','recs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    //add edit function to machines
    public function edit($id)
    {
      $machine = Machine::findOrFail($id);
    // $machine->update($request->all());
            return view('machines.machines_edit',compact('machine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(AddMachineRequest $request, $id)
    {
      $machine = Machine::findOrFail($id);
     $machine->update($request->all());
     return redirect('machines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
  $machine = Machine::findOrFail($id);
      $machine->delete();

      return redirect('machines');
    }
}
