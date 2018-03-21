<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Hash;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
        ->select('*')
        ->get();
        $data['user_count']=count($users);

        $author = DB::table('author')
        ->where('is_active', 1)
        ->get();
        $data['active_authors']=count($author);

        $all_author = DB::table('author')
        ->select('*')
        ->get();
        $data['all_authors']=count($all_author);

        $materials = DB::table('material')
        ->where('is_active', 1)
        ->get();
        $data['active_materials']=count($materials);

        $all_materials = DB::table('material')
          ->select('*')
        ->get();
        $data['all_materials']=count($all_materials);

        $recent_material = DB::table('material')
        ->select('*', 'material.date_created as date')
        ->join('author', 'material.author_id', '=', 'author.author_id')
        ->orderBy('material.date_created', 'desc')
        ->take(10)
        // ->join('container_type', 'material.container_type_id', '=', 'container_type.container_type_id')
        // ->join('material_category', 'material.material_category_id', '=', 'material_category.material_category_id')
        // ->leftjoin('subject', 'material.subject_id', '=', 'subject.subject_id');
        ->get();
        // dd($recent_material);
        $data['recent_mat']=$recent_material;
        
        return view('admin.contents.dashboard.indexcontent', $data);
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
      $password=bcrypt($insertdata['password']);
      unset($insertdata['_token']);
      unset($insertdata['confirm-pass']);
      unset($insertdata['password']);
      $insertdata['password']=$password;

          // dd($insertdata);
      DB::table('users')->insert(
        $insertdata);

      $users = DB::table('users')
      ->select('*');

      if(isset($_GET['q']))
      {
         $conttypes->where('name','like','%'.$_GET['q'].'%');

     }
     $users = $users->paginate(10);
     $data='User Successfully Added';
     
     return view('admin.contents.dashboard.users', ['users' => $users, 'datas'=>$data]);
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
