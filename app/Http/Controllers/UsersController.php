<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
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
      $users = User::all();

      return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

      return view('users.register');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
             'name' => 'required',
             'email' => 'required|email|unique:users,email',
             'role' => 'required',
             'password' =>'required|confirmed'
         ]);
      $user = $request->except('password');
      $pass = bcrypt($request->password);
      $user['password']= $pass;

      User::create($user);
      return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $reps = $user->repairs()->notApproved();
        $tasks = $user->tasks;
        $fails = $user->failures()->waiting();
        $transes = $user->transes;
        $recs = collect([$tasks,$reps,$fails,$transes])->collapse()->sortBy('created_at');

        return view('users.user_show',compact('user','recs'));
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
        //
    }
}
