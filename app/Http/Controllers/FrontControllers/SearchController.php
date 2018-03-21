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
            $author = DB::table('author')->select('*')->where('is_active',1)->get();

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
            $searchauthor ='';
                if($request->type == 'advance'){

                      $query = DB::table('material')
                        ->select('*')
                        ->leftjoin('author','material.author_id','=','author.author_id')
                        ->leftjoin('container_type','material.container_type_id','=','container_type.container_type_id')
                        ->leftjoin('material_category','material.material_category_id','=','material_category.material_category_id')
                        ->leftjoin('subject','material.subject_id','=','subject.subject_id')
                        ->where('material.is_active',1);
                        if($request->search_author_ad){
                            $query->where('material.author_id','=', $request->search_author_ad);
                        }
                        if($request->title){
                            $query->where('material.material_title','like','%'.$request->title.'%');
                     }
                     if($request->search_sub){
                        $query->where('material.material_category_id','=', $request->search_sub);
                    }
                       $material =  $query->paginate(1);

                  
                }else{
                    if($request->search_author){
                      $material = DB::table('material')
                        ->select('*')
                        ->leftjoin('author','material.author_id','=','author.author_id')
                        ->leftjoin('container_type','material.container_type_id','=','container_type.container_type_id')
                        ->leftjoin('material_category','material.material_category_id','=','material_category.material_category_id')
                        ->leftjoin('subject','material.subject_id','=','subject.subject_id')
                        ->where('material.author_id',$request->search_author)
                         ->where('material.is_active',1)
                        ->paginate(1);
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
                 $tick = 0;
                 $category =[];
             $author = DB::table('author')->select('*')->where('is_active',1)->get();
             if($request->search_author || $request->search_author_ad){                
             $category = DB::table('material')->select('*')->leftjoin('material_category','material.material_category_id','=','material_category.material_category_id')->where('material.author_id',$request->search_author)->groupby('material.material_category_id')->get();
             $tick = 0;
             }else{
                $category =[];
                $tick = 1;
             }
            return view('front.contents.search.indexcontent',array('searchauthor'=>$searchauthor,'tick'=>$tick,'material'=>$material,'author'=>$author,'category'=>$category));
        }


 public function searchFilter(Request $request){
   $query = DB::table('material')
                        ->select('*')
                        ->leftjoin('author','material.author_id','=','author.author_id')
                        ->leftjoin('container_type','material.container_type_id','=','container_type.container_type_id')
                        ->leftjoin('material_category','material.material_category_id','=','material_category.material_category_id')
                        ->leftjoin('subject','material.subject_id','=','subject.subject_id')
                         ->where('material.is_active',1);
                     
                        if($request->title){
                            $query->where('material.material_title','like','%'. $request->title.'%');
                     }
                     if($request->search_subj_ad){
                        $query->where('material.material_category_id','=', $request->search_subj_ad);
                    }
                    $query->where('material.author_id',$request->search_author);
                       $material =  $query->paginate(1);
                         $searchauthor = $request->search_author;
                         
                 $tick = 0;
                 $category =[];
             $author = DB::table('author')->select('*')->where('is_active',1)->get();
             if($request->search_author || $request->search_author_ad){                
             $category = DB::table('material')->select('*')->leftjoin('material_category','material.material_category_id','=','material_category.material_category_id')->where('material.author_id',$request->search_author)->groupby('material.material_category_id')->get();
             $tick = 0;
             }else{
                $category =[];
                $tick = 1;
             }
            return view('front.contents.filter.indexcontent',array('searchauthor'=>$searchauthor,'tick'=>$tick,'material'=>$material,'author'=>$author,'category'=>$category));
 }     

 public function getCategory(Request $request){

   $category = DB::table('material')
   ->select('material_category.*')
   ->leftjoin('author','material.author_id','=','author.author_id')
   ->leftjoin('material_category','material.material_category_id','=','material_category.material_category_id')
   ->where('material.author_id',$request->author)
   ->groupby('material.material_category_id')
   ->get();
   return $category;
}
}
