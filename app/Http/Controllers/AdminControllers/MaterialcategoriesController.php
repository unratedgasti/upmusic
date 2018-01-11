<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class MaterialcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
       $matcats = DB::table('material_category')
       ->select('*');
       if ($_GET['list']=='active') {
        $matcats->where('is_active',1);
    }
    if ($_GET['list']=='inactive') {
        $matcats->where('is_active',0);
    }

    if(isset($_GET['q']))
    {
       $matcats->where('material_category_desc','like','%'.$_GET['q'].'%');

   }
   $matcats= $matcats->paginate(10);
// dd($materials);
   return view('admin.contents.materialcategories.view', ['matcats' => $matcats]);
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
            DB::table('material_category')
            ->where('material_category_id', $id)
            ->update(['is_active' => 0]);
        }
        else
        {
            DB::table('material_category')
            ->where('material_category_id', $id)
            ->update(['is_active' => 1]);  
        }

        // return redirect('/admin/materials/view?list='.$_GET['list'].'&response=1');
        return redirect('/admin/materialcategories/view?list=all&response=1');
    }
    public function create_form(Request $request)
    {

        return view('admin.contents.materialcategories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertdata=$request->all();
        unset($insertdata['_token']);

        DB::table('material_category')->insert(
            $insertdata);
        $data['success']='Material Category Successfully Added';
        return view('admin.contents.materialcategories.add', $data);
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
     $matcat_detail = DB::table('material_category')
     ->select('*')
     ->where('material_category_id',$_GET['id'])
     ->get();

     $data['matcat']=$matcat_detail[0];

     return view('admin.contents.materialcategories.edit', $data);
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

        DB::table('material_category')
        ->where('material_category_id',$id)
        ->update($updates);

        $matcat_detail = DB::table('material_category')
        ->select('*')
        ->where('material_category_id',$id)
        ->get();

        $data['matcat']=$matcat_detail[0];

        $data['success']='Material Category Successfully Updated';
        return view('admin.contents.materialcategories.edit', $data);
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
