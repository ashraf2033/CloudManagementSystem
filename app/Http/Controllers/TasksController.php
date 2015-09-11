<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Machine;
use App\Technican;
use App\SparePart;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Gate;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $page_title = "الصيانة الوقائية";
        $tasks = Task::all();
        return view('tasks.tasks_index',compact('tasks','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      if (Gate::denies('maintain')) {
        abort(403, 'هذا الإجراء ليس من صلاحياتك');
      }
      $part_names = DB::table('spare_parts')->lists('part_name');
      $part_ids = DB::table('spare_parts')->lists('part_id');
      $parts=array_combine($part_ids,$part_names);
      $machine_names = DB::table('machines')->lists('machine_name');
      $machine_ids = DB::table('machines')->lists('machine_id');
      $machines = array_combine($machine_ids,$machine_names);
      $technican_names = DB::table('technicans')->lists('tech_name');
      $technican_ids = DB::table('technicans')->lists('id');
      $technicans = array_combine($technican_ids,$technican_names);

      return view('tasks.tasks_create',compact('machines','technicans','parts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      // get all task data
        $taskin = $request->all();
        //create new task
        $task = Task::create($taskin);

        $this->validate($request, [
               'task_status' => 'required',
               'task_name' => 'required',
           ]);
        //attaching spare_parts

        $part_arr = $request->input('part_id');
        $qty_arr = $request->input('part_qty');
          foreach ($part_arr as $key => $part){
            if($part != 0){
            $part_obj = SparePart::find($part);
            $task_id = $task->task_id;
            $qty=$qty_arr[$key];
            $part_obj->task()->attach($task_id,['part_qty'=> $qty]);

    }
  }
        return redirect('maintainance/tasks');
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.tasks_show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
      $part_names = DB::table('spare_parts')->lists('part_name');
      $part_ids = DB::table('spare_parts')->lists('part_id');
      $parts=array_combine($part_ids,$part_names);
      $task = Task::findOrFail($id);
      $machine_names = DB::table('machines')->lists('machine_name');
      $machine_ids = DB::table('machines')->lists('machine_id');
      $machines = array_combine($machine_ids,$machine_names);
      $technican_names = DB::table('technicans')->lists('tech_name');
      $technican_ids = DB::table('technicans')->lists('id');
      $technicans = array_combine($technican_ids,$technican_names);

      return view('tasks.tasks_edit',compact('machines','technicans','task','parts'));
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
      $task = Task::findOrFail($id);
      $taskin = $request->all();

      $task->update($taskin);
      //loop throught technincans fields

      $part_arr = $request->input('part_id');
      $qty_arr = $request->input('part_qty');
        $task->parts()->detach();
        foreach ($part_arr as $key => $part){
          if($part != 0){
          $part_obj = SparePart::find($part);
          $task_id = $task->task_id;
          $qty=$qty_arr[$key];
          $part_obj->task()->attach($task_id,['part_qty'=> $qty]);
        }
        }
          return redirect('maintainance/tasks');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $task = Task::findOrFail($id);
      $task->delete();
      return redirect('maintainance/tasks');
    }
    public function finish(Request $request, $id){

        $task = Task::findOrFail($id);
        $task->update(['task_status'=>'تمت']);

        return redirect('maintainance/tasks');

    }

}
