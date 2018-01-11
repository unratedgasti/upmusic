<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class ContainertypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $conttypes = DB::table('container_type')
     ->select('*');
     if ($_GET['list']=='active') {
        $conttypes->where('is_active',1);
    }
    if ($_GET['list']=='inactive') {
        $conttypes->where('is_active',0);
    }

    if(isset($_GET['q']))
    {
     $conttypes->where('container_type_desc','like','%'.$_GET['q'].'%');

 }
 $conttypes= $conttypes->paginate(10);
// dd($materials);
 return view('admin.contents.containertypes.view', ['conttypes' => $conttypes]);
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
            DB::table('container_type')
            ->where('container_type_id', $id)
            ->update(['is_active' => 0]);
        }
        else
        {
            DB::table('container_type')
            ->where('container_type_id', $id)
            ->update(['is_active' => 1]);  
        }

        // return redirect('/admin/materials/view?list='.$_GET['list'].'&response=1');
        return redirect('/admin/containertypes/view?list=all&response=1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create_form(Request $request)
    {

        return view('admin.contents.containertypes.add');
    }

    public function store(Request $request)
    {
        $insertdata=$request->all();
        unset($insertdata['_token']);

        DB::table('container_type')->insert(
            $insertdata);
        $data['success']='Container Type Successfully Added';
        return view('admin.contents.containertypes.add', $data);
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
       $cont_detail = DB::table('container_type')
       ->select('*')
       ->where('container_type_id',$_GET['id'])
       ->get();

       $data['cont']=$cont_detail[0];

       return view('admin.contents.containertypes.edit', $data);
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

        DB::table('container_type')
        ->where('container_type_id',$id)
        ->update($updates);

        $cont_detail = DB::table('container_type')
        ->select('*')
        ->where('container_type_id',$id)
        ->get();

        $data['cont']=$cont_detail[0];

        $data['success']='Container Type Successfully Updated';
        return view('admin.contents.containertypes.edit', $data);
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
