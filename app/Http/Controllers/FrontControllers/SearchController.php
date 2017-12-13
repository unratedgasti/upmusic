<?php

namespace App\Http\Controllers\FrontControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $author = DB::table('author')->select('*')->get();

        return view('front.contents.dashboard.indexcontent',array('author'=>$author));
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
    public function searchAuthor(Request $request){
        $material = DB::table('material')
                    ->select('*')
                    ->join('author','material.author_id','=','author.author_id')
                    ->join('container_type','material.container_type_id','=','container_type.container_type_id')
                    ->paginate(1);
         $author = DB::table('author')->select('*')->get();
        /*return $request->author;*/
        return view('front.contents.search.indexcontent',array('material'=>$material,'author'=>$author));
    }

    public function getSubject(Request $request){
        return $request->author;
    }
}
