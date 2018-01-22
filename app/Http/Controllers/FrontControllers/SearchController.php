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
            if($request->type == 'advance'){
                
                  $query = DB::table('material')
                    ->select('*')
                    ->leftjoin('author','material.author_id','=','author.author_id')
                    ->leftjoin('container_type','material.container_type_id','=','container_type.container_type_id')
                    ->leftjoin('material_category','material.material_category_id','=','material_category.material_category_id')
                    ->leftjoin('subject','material.subject_id','=','subject.subject_id');
                    if($request->search_author_ad){
                        $query->where('material.author_id','=', $request->search_author_ad);
                    }
                    if($request->title){
                        $query->where('material.material_title','like','%'. $request->title.'%');
                 }
                 if($request->search_sub){
                    $query->where('material.subject_id','=', $request->search_sub);
                }
                   $material =  $query->paginate(10);
              
            }else if($request->type == 'filter'){
                $query = DB::table('material')
                    ->select('*')
                    ->leftjoin('author','material.author_id','=','author.author_id')
                    ->leftjoin('container_type','material.container_type_id','=','container_type.container_type_id')
                    ->leftjoin('material_category','material.material_category_id','=','material_category.material_category_id')
                    ->leftjoin('subject','material.subject_id','=','subject.subject_id');
                 
                    if($request->title){
                        $query->where('material.material_title','like','%'. $request->title.'%');
                 }
                 if($request->search_subj_ad){
                    $query->where('material.subject_id','=', $request->search_subj_ad);
                }
                $query->where('material.author_id',$request->author_id);
                   $material =  $query->paginate(10);

            }else{
                if($request->search_author){
                  $material = DB::table('material')
                    ->select('*')
                    ->leftjoin('author','material.author_id','=','author.author_id')
                    ->leftjoin('container_type','material.container_type_id','=','container_type.container_type_id')
                    ->leftjoin('material_category','material.material_category_id','=','material_category.material_category_id')
                    ->leftjoin('subject','material.subject_id','=','subject.subject_id')
                    ->where('material.author_id',$request->search_author)
                    ->paginate(10);
                }else{
                   $this->validate($request, [
            'search_author' => 'required',
           
            ],
            [
            'search_author.required' => 'Author is required.',
          
            ]
            );

                }
    
            }
         $author = DB::table('author')->select('*')->get();
         $subject = DB::table('material')->select('*')->leftjoin('subject','material.subject_id','=','subject.subject_id')->where('material.author_id',$request->search_author)->groupby('material.subject_id')->get();
        return view('front.contents.search.indexcontent',array('material'=>$material,'author'=>$author,'subject'=>$subject));
    }

    public function getSubject(Request $request){

         $subject = DB::table('material')
                    ->select('subject.*')
                    ->leftjoin('author','material.author_id','=','author.author_id')
                    ->leftjoin('subject','material.subject_id','=','subject.subject_id')
                    ->where('material.author_id',$request->author)
                    ->get();
        return $subject;
    }
}
