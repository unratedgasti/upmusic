@extends('front.index')
@section('indexcontent')  
@include('front.includes.topnav') 
 <div class="login_wrapper" id="searchnorm">
    
      <section class="login_content" >
      
          {!!  Form::open(array('route' => 'search.searchAuthor')) !!}
          <h1>Search Author</h1>
          <div class="alert alert-danger alert-dismissible fade in hidden" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <span id="errorcode"></span>
          </div>
          <div>       
            <button class="btn btn-md btn-success" id="search_code_button" style="float: right" >Search Author</button>
            <div style="overflow: hidden; padding-right: .5em;">
             <select class="js-example-basic-single form-control" name="search_author" id="search_author">
              <option value="" selected="">Select Something</option>
              @foreach($author as $value)
                <option value="{{$value->author_id}}">{{$value->author_firstname}} {{substr($value->author_middlename,0,1)}}. {{$value->author_lastname}}</option>
              @endforeach
            </select>
          </div>
          </div>
  

          <div class="clearfix"></div>

        {!! Form::close() !!}
      </section>
    <div align="right">
            <a href="" id="advance">Advance Search</a> 

          </div>
 <br>

  </div>

   <div class="login_wrapper hidden" id="searchad">
    
      <section class="login_content" >
      
          {!!  Form::open(array('route' => 'search.searchAuthor')) !!}
          <h1>Search Author</h1>
          <div class="alert alert-danger alert-dismissible fade in hidden" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <span id="errorcode"></span>
          </div>
          <div>       
          
            <div style="overflow: hidden; padding-right: .5em;">
             <select class="js-example-basic-single form-control" name="search_author_ad" id="search_author_ad">
              <option value="" selected="">Select Something</option>
              @foreach($author as $value)
                <option value="{{$value->author_id}}">{{$value->author_firstname}} {{substr($value->author_middlename,0,1)}}. {{$value->author_lastname}}</option>
              @endforeach
            </select><br><br>
            {!! Form::hidden('type', 'advance',array('class'=>'form-control','placeholder'=>'Enter Title'   )) !!} 
              {!! Form::text('title', '',array('class'=>'form-control','placeholder'=>'Enter Title'   )) !!} 

             <select class="js-example-basic-single form-control" name="search_sub" id="search_sub">
              <option value="" selected="">Select Something</option>
         
            </select><br><br>
        
          </div>
          {!! Form::hidden('methodroute', url('search/getSubject'),array('class'=>'form-control','id'=>'methodroute'   )) !!} 
              <div align="center"><br>
                <button class="btn btn-md btn-success" id="search_code_button"  >Search</button>
            </div>
          </div>
  

          <div class="clearfix"></div>

        {!! Form::close() !!}
      </section>
 
         <div align="right">
            <a href="" id="normal">Normal Search</a> 
          </div>
 <br>
  </div>

<div class="col-md-10 col-md-offset-1">
  
<div class="x_content">
  <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No. </th>
                            <th class="column-title">Title </th>
                            <th class="column-title">Title Description </th>
                            <th class="column-title">Author </th>
                            <th class="column-title">No. of copies </th>
                            <th class="column-title">Category </th>
                            <th class="column-title">Container Type</th>
                            <th class="column-title">Containter Description</th>
                          </tr>
                        </thead>
                        <tbody>                         
                         @foreach ($material as $value)
                         <tr class="even pointer">
                          <td>1</td>
                          <td>
                            {{ $value->material_title }}
                          </td>
                          <td>
                            {{ $value->material_desc }}
                          </td>
                          <td>
                            {{$value->author_firstname}} {{substr($value->author_middlename,0,1)}}. {{$value->author_lastname}}
                          </td>
                          <td>
                            {{ $value->material_num_copies }}
                          </td>
                          <td>
                            Category
                          </td>
                          <td>{{ $value->container_type_desc }}</td>
                          <td> {{ $value->material_container_desc }}</td>
                        </tr>
                        @endforeach                        
                        </tbody>
                      
                      </table>
                      <div class="col-md-offset-5">
                          {!! $material->render() !!}
                      </div>                           
                           
                    </div>
                  </div>
                  </div>
@stop