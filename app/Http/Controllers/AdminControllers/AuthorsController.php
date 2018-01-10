<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $authors = DB::table('author')
        ->select('*');
        if ($_GET['list']=='active') {
            $authors->where('is_active',1);
        }
        if ($_GET['list']=='inactive') {
            $authors->where('is_active',0);
        }

        if(isset($_GET['q']))
        {
         $authors->where('author_firstname','like','%'.$_GET['q'].'%')
         ->orWhere('author_middlename','like','%'.$_GET['q'].'%')
         ->orWhere('author_lastname','like','%'.$_GET['q'].'%')
         ->orWhere('author_desc','like','%'.$_GET['q'].'%');


     }
     $authors= $authors->paginate(10);
// dd($materials);
     return view('admin.contents.authors.view', ['authors' => $authors]);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function change_status()
    {
        $id=$_GET['id'];
        $status=$_GET['status'];

        if($status==1)
        {
            DB::table('author')
            ->where('author_id', $id)
            ->update(['is_active' => 0]);
        }
        else
        {
            DB::table('author')
            ->where('author_id', $id)
            ->update(['is_active' => 1]);  
        }

        // return redirect('/admin/materials/view?list='.$_GET['list'].'&response=1');
        return redirect('/admin/authors/view?list=all&response=1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create_form(Request $request)
    {

        return view('admin.contents.authors.add');
    }

    public function store(Request $request)
    {
        $insertdata=$request->all();
        unset($insertdata['_token']);

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
    public function edit()
    {
        $author_detail = DB::table('author')
        ->select('*')
        ->where('author_id',$_GET['id'])
        ->get();

        $data['author']=$author_detail[0];
      
        return view('admin.contents.authors.edit', $data);
        
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
      $updates=$request->all();
      unset($updates['_token']);

      DB::table('author')
      ->where('author_id',$id)
      ->update($updates);

       $author_detail = DB::table('author')
        ->select('*')
        ->where('author_id',$id)
        ->get();

       $data['author']=$author_detail[0];

      $data['success']='Author Successfully Updated';
      return view('admin.contents.authors.edit', $data);
      
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
