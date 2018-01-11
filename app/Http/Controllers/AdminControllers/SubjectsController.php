<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = DB::table('subject')
        ->select('*');
        if ($_GET['list']=='active') {
            $subjects->where('is_active',1);
        }
        if ($_GET['list']=='inactive') {
            $subjects->where('is_active',0);
        }

        if(isset($_GET['q']))
        {
         $subjects->where('subject_desc','like','%'.$_GET['q'].'%');


     }
     $subjects= $subjects->paginate(10);
// dd($materials);
     return view('admin.contents.subjects.view', ['subjects' => $subjects]);
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
            DB::table('subject')
            ->where('subject_id', $id)
            ->update(['is_active' => 0]);
        }
        else
        {
            DB::table('subject')
            ->where('subject_id', $id)
            ->update(['is_active' => 1]);  
        }

        // return redirect('/admin/materials/view?list='.$_GET['list'].'&response=1');
        return redirect('/admin/subjects/view?list=all&response=1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create_form(Request $request)
    {

        return view('admin.contents.subjects.add');
    }


    public function store(Request $request)
    {
       $insertdata=$request->all();
       unset($insertdata['_token']);

       DB::table('subject')->insert(
        $insertdata);
       $data['success']='Subject Successfully Added';
       return view('admin.contents.subjects.add', $data);
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
        $subject_detail = DB::table('subject')
        ->select('*')
        ->where('subject_id',$_GET['id'])
        ->get();

        $data['subject']=$subject_detail[0];
      
        return view('admin.contents.subjects.edit', $data);
        
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

      DB::table('subject')
      ->where('subject_id',$id)
      ->update($updates);

       $subject_detail = DB::table('subject')
        ->select('*')
        ->where('subject_id',$id)
        ->get();

       $data['subject']=$subject_detail[0];

      $data['success']='Subject Successfully Updated';
      return view('admin.contents.subjects.edit', $data);
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
