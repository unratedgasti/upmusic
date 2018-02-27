<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App;
use Auth;
use PDF;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $all = DB::table('author')
      // ->select(
      //   DB::raw("CONCAT(author.author_firstname,' ',author.author_middlename,' ',author.author_lastname) AS full_name"),
      //   DB::raw("count(distinct material.material_id) AS total_mat"),
      //   DB::raw("(SELECT COUNT(material_id) FROM material as mat WHERE mat.author_id=material.author_id and mat.is_active=0) as not_active")
      //   )
      // ->leftjoin('material','author.author_id','=','material.author_id')
      // ->groupBy('author.author_id')
      // ->get();

      // dd($all);
        $author = DB::table('author')
        ->where('is_active', 1)
        ->get();
        $data['author']=$author;

        return view('admin.contents.backupsreports.view', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function database()
    {
        return view('admin.contents.backupsreports.back_up');
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
     public function report_specific_artists(Request $request)
    {
       // dd($request->all());
       $date=date("m/d/Y");
        $artists = DB::table('author')
        ->select('*')
        ->where('is_active',1)
        ->where('author_id',$request->author_id)
        ->get();

        $art=array();
        foreach ($artists as $artist)
        {
            $name=$artist->author_lastname.', '.$artist->author_firstname.' '.$artist->author_middlename;
            $per_artist['name']=$name;

            $materials = DB::table('material')
            ->select('material.*', 'material_category.material_category_desc','container_type.container_type_desc')
            ->where('author_id',$artist->author_id)
            ->leftjoin('material_category', 'material.material_category_id', '=', 'material_category.material_category_id')
            ->leftjoin('container_type', 'material.container_type_id', '=', 'container_type.container_type_id')
            ->where('material.is_active',1)
            ->get();

            $per_artist['materials']=$materials;
            array_push($art,$per_artist);
        }
        $data['per_artist']=$art;
      // dd($data);
        $pdf = \PDF::loadView('admin.contents.backupsreports.specific_artist_report',$data);

        return $pdf->stream('specific_artist'.$date.'.pdf');
    }


    public function report_all_artists()
    {
        $date=date("m/d/Y");
        $artists = DB::table('author')
        ->select('*')
        ->where('is_active',1)
        ->get();

        $art=array();
        foreach ($artists as $artist)
        {
            $name=$artist->author_lastname.', '.$artist->author_firstname.' '.$artist->author_middlename;
            $per_artist['name']=$name;

            $materials = DB::table('material')
            ->select('material.*', 'material_category.material_category_desc','container_type.container_type_desc')
            ->where('author_id',$artist->author_id)
            ->leftjoin('material_category', 'material.material_category_id', '=', 'material_category.material_category_id')
            ->leftjoin('container_type', 'material.container_type_id', '=', 'container_type.container_type_id')
            ->where('material.is_active',1)
            ->get();

            $per_artist['materials']=$materials;
            array_push($art,$per_artist);
        }
        $data['per_artist']=$art;
      // dd($data);
        $pdf = \PDF::loadView('admin.contents.backupsreports.all_artist_report',$data);

        return $pdf->stream('all_artist'.$date.'.pdf');
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
