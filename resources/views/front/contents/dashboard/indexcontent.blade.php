@extends('front.index')
@section('indexcontent')
@include('front.includes.topnav')


  <div class="login_wrapper" id="searchnorm">
      <section class="login_content"  style="padding-top: 55px">
    
      
          {!! Form::open(['url' => '/searchAuthor']) !!}
          <h1>Search Artist</h1>
             @if(count($errors))

  <div class="alert alert-danger">


      @foreach($errors->all() as $error)

     {{ $error }}

      @endforeach

    

  </div>

@endif
          <div class="alert alert-danger alert-dismissible fade in hidden" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <span id="errorcode"></span>
          </div>
          <div>       
            <button class="btn btn-md btn-success" id="search_code_button" style="float: right" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
            <div style="overflow: hidden; padding-right: .5em;">
             <select class="js-example-basic-single form-control" name="search_author" id="search_author">
              <option value="" selected="">Select Artist</option>
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
      <section class="login_content">
      
       <section class="login_content" >
      
              {!! Form::open(['url' => '/searchAuthor']) !!}
          <h1>Search Author</h1>
          <div class="alert alert-danger alert-dismissible fade in hidden" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <span id="errorcode"></span>
          </div>
          <div>       
          
            <div style="overflow: hidden; padding-right: .5em;">
             <select class="js-example-basic-single form-control" name="search_author_ad" id="search_author_ad">
              <option value="" selected="">Select Artist</option>
              @foreach($author as $value)
                <option value="{{$value->author_id}}">{{$value->author_firstname}} {{substr($value->author_middlename,0,1)}}. {{$value->author_lastname}}</option>
              @endforeach
            </select><br><br>
            <select class="js-example-basic-single form-control" name="search_sub" id="search_sub">
              <option value="" selected="">Please select artist</option>         
            </select><br><br>
            {!! Form::hidden('type', 'advance',array('class'=>'form-control','placeholder'=>'Enter Material Title'   )) !!} 
              {!! Form::text('title', '',array('class'=>'form-control','placeholder'=>'Enter Material Title'   )) !!} 

             
        
          </div>
          {!! Form::hidden('methodroute', url('search/getCategory'),array('class'=>'form-control','id'=>'methodroute'   )) !!} 
              <div align="center"><br>
                <button class="btn btn-md btn-success" id="search_code_button"  ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
            </div>
          </div>
  

          <div class="clearfix"></div>

        {!! Form::close() !!}
      </section>
 
         <div align="right">
            <a href="" id="normal">Normal Search</a> 
          </div>
 <br>
      </section>

  </div>

@stop