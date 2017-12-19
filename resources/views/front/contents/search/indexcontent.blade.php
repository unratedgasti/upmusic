@extends('front.index')
@section('indexcontent')  
@include('front.includes.topnav') 
<!--  <div class="login_wrapper" id="searchnorm">
    
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
-->

 <div  style="padding: 2%">
  <h1>Author :  {{$material[0]->author_firstname}} {{substr($material[0]->author_middlename,0,1)}}. {{$material[0]->author_lastname}}</h1>

</div>


    
    <div  align="center" style="padding: .4% ">   
     <div align="left" style="padding: 10%;-webkit-box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);-moz-box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);">
       <h4>Filter Result</h4>
       <select class="js-example-basic-single form-control" name="search_author_ad" id="search_author_ad">
        <option value="" selected="">Select Something</option>
        <option value="" selected="">Please select something</option>
        <option value="subject">Subject</option>
        <option value="title">Title</option>
        <option value="category">Category</option>
      </select><br><br>
      <input type="text" name="filter_search" class="form-control"><br>
      <button type="submit" class="btn btn-primary">Filter Result</button>
    </div>

  </div>
     <div class="x_panel">
<div class="x_content" >
  <div class="table-responsive" style="-webkit-box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);overflow:auto;  
  -moz-box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);  box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);padding-top: 2%;padding-left:  1%;padding-right: 1%;padding-bottom: 1%">
  <table class="table table-striped jambo_table bulk_action" style=" display: block !important;">
    <thead>                  
      <tr class="headings">
        <th class="column-title">Box/Folder No. </th>
        <th class="column-title">Container Type </th>
        <th class="column-title">Container Description </th>
        <th class="column-title">Title </th>                            
        <th class="column-title">Material Type </th>
        <th class="column-title">Subject</th>
        <th class="column-title">Exact or Approx. Number of Items</th>
        <th class="column-title">CALL Number </th>
        <th class="column-title">ACC Number </th>
        <th class="column-title">Inclusion Date</th>
      </tr>
    </thead>
    <tbody>                         
     @foreach ($material as $value)
     <tr class="even pointer">
      <td>{{ $value->container_type_id }}</td>
      <td>
        {{ $value->container_type_desc }}
      </td>
      <td> 
        {{ $value->material_container_desc }}
      </td>
      <td>
        {{ $value->material_title }}
      </td>
      <td>
        {{ $value->material_category_desc }}
      </td>
      <td>
        {{ $value->subject_desc }}
      </td>                          
      <td>
        {{ $value->material_num_copies }}
      </td>
      <td>
       {{ $value->material_call_num }}
     </td>
     <td>
      {{ $value->material_acc_num }}
    </td>
    <td>
      {{ $value->material_inclusion_dates }}
    </td>

  </tr>
  @endforeach                        
</tbody>

</table>
<div>
  {!! $material->render() !!}
</div>                           

</div>
                  </div>
                  </div>



@stop

