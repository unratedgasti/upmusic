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

        $materials = DB::table('material')
        ->join('author', 'material.author_id', '=', 'author.author_id')
        ->join('container_type', 'material.container_type_id', '=', 'container_type.container_type_id')
        ->join('material_category', 'material.material_category_id', '=', 'material_category.material_category_id')
        ->join('subject', 'material.subject_id', '=', 'subject.subject_id')
        ->paginate(10);

        return view('admin.contents.materials.view', ['materials' => $materials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        // DB::table('material')->insert(
        //     $insertdata);
        $data['success']='Material Successfully Added';
         return view('admin.contents.materials.add', $data);
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
