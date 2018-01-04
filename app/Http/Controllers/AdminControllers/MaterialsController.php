<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;


class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $material = DB::table('material')
        ->select('material.*','author.author_firstname','author.author_middlename','author.author_lastname','container_type.container_type_desc','material_category.material_category_desc','subject.subject_desc')
        ->join('author', 'material.author_id', '=', 'author.author_id')
        ->join('container_type', 'material.container_type_id', '=', 'container_type.container_type_id')
        ->join('material_category', 'material.material_category_id', '=', 'material_category.material_category_id')
        ->leftjoin('subject', 'material.subject_id', '=', 'subject.subject_id');
        if ($_GET['list']=='active') {
           $material->where('material.is_active',1);
       }
       if ($_GET['list']=='inactive') {
           $material->where('material.is_active',0);
       }

       if(isset($_GET['q']))
       {
        $material->where('author.author_firstname','like','%'.$_GET['q'].'%')
        ->orWhere('author.author_middlename','like','%'.$_GET['q'].'%')
        ->orWhere('author.author_lastname','like','%'.$_GET['q'].'%')
        ->orWhere('material.material_title','like','%'.$_GET['q'].'%')
        ->orWhere('subject.subject_desc','like','%'.$_GET['q'].'%')
        ->orWhere('material.material_call_num','like','%'.$_GET['q'].'%')
        ->orWhere('material.material_acc_num','like','%'.$_GET['q'].'%');

       }
       $materials= $material->paginate(10);
// dd($materials);
       return view('admin.contents.materials.view', ['materials' => $materials]);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function change_status()
    {
        $id=$_GET['id'];
        $status=$_GET['status'];

        if($status==1)
        {
            DB::table('material')
            ->where('material_id', $id)
            ->update(['is_active' => 0]);
        }
        else
        {
            DB::table('material')
            ->where('material_id', $id)
            ->update(['is_active' => 1]);  
        }

        // return redirect('/admin/materials/view?list='.$_GET['list'].'&response=1');
        return redirect('/admin/materials/view?list=all&response=1');
    }


    public function create_form(Request $request)
    {
      $cont_type = DB::table('container_type')
      ->where('is_active', 1)
      ->get();

      $author = DB::table('author')
      ->where('is_active', 1)
      ->get();

      $subject = DB::table('subject')
      ->where('is_active', 1)
      ->get();

      $material_category = DB::table('material_category')
      ->where('is_active', 1)
      ->get();

      $data['cont_type']=$cont_type;
      $data['author']=$author;
      $data['subject']=$subject;
      $data['material_category']=$material_category;

        // dd($data);
      return view('admin.contents.materials.add', $data);
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cont_type = DB::table('container_type')
        ->where('is_active', 1)
        ->get();

        $author = DB::table('author')
        ->where('is_active', 1)
        ->get();

        $subject = DB::table('subject')
        ->where('is_active', 1)
        ->get();

        $material_category = DB::table('material_category')
        ->where('is_active', 1)
        ->get();

        $data['cont_type']=$cont_type;
        $data['author']=$author;
        $data['subject']=$subject;
        $data['material_category']=$material_category;

        $insertdata=$request->all();
        unset($insertdata['_token']);

        DB::table('material')->insert(
            $insertdata);
        $data['success']='Material Successfully Added';
        return view('admin.contents.materials.add', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
      $updates=$request->all();
      unset($updates['_token']);

      DB::table('material')
      ->where('material_id',$id)
      ->update($updates);

      $material_detail = DB::table('material')
        ->select('material.*','author.author_firstname','author.author_middlename','author.author_lastname','container_type.container_type_id','material_category.material_category_id')
        ->join('author', 'material.author_id', '=', 'author.author_id')
        ->join('container_type', 'material.container_type_id', '=', 'container_type.container_type_id')
        ->join('material_category', 'material.material_category_id', '=', 'material_category.material_category_id')
        ->leftjoin('subject', 'material.subject_id', '=', 'subject.subject_id')
        ->where('material.material_id',$id)
        ->get();

        $cont_type = DB::table('container_type')
        ->where('is_active', 1)
        ->get();

        $author = DB::table('author')
        ->where('is_active', 1)
        ->get();

        $subject = DB::table('subject')
        ->where('is_active', 1)
        ->get();

        $material_category = DB::table('material_category')
        ->where('is_active', 1)
        ->get();

        $data['material']=$material_detail[0];
        $data['cont_type']=$cont_type;
        $data['author']=$author;
        $data['subject']=$subject;
        $data['material_category']=$material_category;

       $data['success']='Material Successfully Updated';
        return view('admin.contents.materials.edit', $data);
      
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
        $material_detail = DB::table('material')
        ->select('material.*','author.author_firstname','author.author_middlename','author.author_lastname','container_type.container_type_id','material_category.material_category_id')
        ->join('author', 'material.author_id', '=', 'author.author_id')
        ->join('container_type', 'material.container_type_id', '=', 'container_type.container_type_id')
        ->join('material_category', 'material.material_category_id', '=', 'material_category.material_category_id')
        ->leftjoin('subject', 'material.subject_id', '=', 'subject.subject_id')
        ->where('material.material_id',$_GET['id'])
        ->get();

        $cont_type = DB::table('container_type')
        ->where('is_active', 1)
        ->get();

        $author = DB::table('author')
        ->where('is_active', 1)
        ->get();

        $subject = DB::table('subject')
        ->where('is_active', 1)
        ->get();

        $material_category = DB::table('material_category')
        ->where('is_active', 1)
        ->get();

        $data['material']=$material_detail[0];
        $data['cont_type']=$cont_type;
        $data['author']=$author;
        $data['subject']=$subject;
        $data['material_category']=$material_category;

        return view('admin.contents.materials.edit', $data);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
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
