@extends('front.index')
@section('indexcontent')   


  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content" style="padding-top: 200px">
      
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
          {!! Form::hidden('methodroute', route('search.getSubject'),array('class'=>'form-control','id'=>'methodroute'   )) !!} 
          </div>
  

          <div class="clearfix"></div>

        {!! Form::close() !!}
      </section>
    </div>


  </div>

@stop