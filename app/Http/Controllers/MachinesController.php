<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AddMachineRequest;
use App\Http\Controllers\Controller;
use App\Machine;
use App\Failure;
use App\Repair;

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
      $failures = $machine->failure;

      return view('machines.record',compact('machine','failures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(AddMachineRequest $request,$id)
    {
      $machine = Machine::findOrFail($id);
     $machine->update($request->all());
          return view('machines.machines_create');
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
  $machine = Machine::findOrFail($id);
      $machine->delete();

      return redirect('machines');
    }
}
