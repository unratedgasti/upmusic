<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users = DB::table('users')
        ->select('*');

        if(isset($_GET['q']))
        {
         $conttypes->where('name','like','%'.$_GET['q'].'%');

     }
     $users = $users->paginate(10);
     return view('admin.contents.dashboard.users', ['users' => $users]);
 }

 public function adduser()
 {
    $users = DB::table('users')
    ->select('*');

    if(isset($_GET['q']))
    {
     $conttypes->where('name','like','%'.$_GET['q'].'%');

 }
 $users = $users->paginate(10);
 return view('admin.contents.dashboard.adduser', ['users' => $users]);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

     public function register(Request $request)
    {
          $insertdata=$request->all();
        unset($insertdata['_token']);
          dd($insertdata);
      DB::table('author')->insert(
            $insertdata);
        $data['success']='Author Successfully Added';
        return view('admin.contents.authors.add', $data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
