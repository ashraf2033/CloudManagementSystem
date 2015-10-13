<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AddPartRequest;

use App\Http\Controllers\Controller;
use App\SparePart;

class SparePartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $parts = SparePart::all();
  return view('spareparts.spare_index',compact('parts'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

      return view('spareparts.spare_create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(AddPartRequest $request)
    {
    SparePart::create($request->all());
    return redirect('/spareparts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
$part = SparePart::findOrFail($id);
$repstock = $part->repair()->lists('part_qty')->sum();
$reps = $part->repair;
$taskstock = $part->task()->lists('part_qty')->sum();
$tasks = $part->task;
$transsub=$part->trans()->where('type','-')->lists('part_qty')->sum();
$substock = $repstock + $taskstock+$transsub;

$transadd=$part->trans()->where('type','+')->lists('part_qty')->sum();
$transes=$part->trans;
$addstock = $transadd;
$stock = $addstock - $substock;
$recs = collect([$transes,$tasks,$reps])->collapse()->sortBy('created_at');
      return view('spareparts.spare_show',compact('part','stock','recs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $part=SparePart::findOrFail($id);
        return view('spareparts.spare_edit',compact('part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(AddPartRequest $request, $id)
    {
      $part=SparePart::findOrFail($id);
      $part->update($request->all());
      return redirect('spareparts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
