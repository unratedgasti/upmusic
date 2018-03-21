@extends('front.index')
@section('indexcontent')  
@include('front.includes.topnav') 
<style type="text/css">
  #myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}
</style>
<div class="row">
    <div class="login_content col-md-12 col-sm-12 col-xs-12" style="margin-top: -7%;margin-bottom: -1%">
  

  @if($tick == 0)
  {!! Form::open(['url' => '/searchFilter','method'=>'get']) !!}
    <div class="login_wrapper">
    
        <h1>Filter Result</h1>


     @if(count($material) > 0)
     <strong style="font-size: 20px">Artist :</strong> <strong style="font-size: 28px;text-decoration: underline;">
      {{$material[0]->author_lastname}}, {{$material[0]->author_firstname}} {{substr($material[0]->author_middlename,0,1)}}. </strong>
      @else
        @foreach($author as $key => $value)
        @if($value->author_id == $searchauthor)
         <strong style="font-size: 20px">Artist :</strong> <strong style="font-size: 28px;text-decoration: underline;">
      {{$value->author_lastname}}, {{$value->author_firstname}} {{substr($value->author_middlename,0,1)}}. </strong>
        @endif
        @endforeach
      @endif

    <div class="alert alert-danger alert-dismissible fade in hidden" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <span id="errorcode"></span>
  </div>
  <div>       
    
 {!! Form::hidden('search_author',(count($material) > 0) ? $material[0]->author_id : $_GET['search_author ']  , array('class'=>'form-control','id'=>'search_author')) !!} 
 <select class="js-example-basic-single form-control" name="search_category" id="search_category">
      <option value="" selected="">Select Material Category</option>
      @foreach($category as $value)
      <option value="{{$value->material_category_id}}">{{$value->material_category_desc}} </option>
      @endforeach
    </select><br><br>

      {!! Form::text('title', '',array('class'=>'form-control','placeholder'=>'Enter Material Title')) !!}  
    
   
  {!! Form::hidden('', url('search/getCategory'),array('class'=>'form-control','id'=>'methodroute'   )) !!} 
  <div align="center">
 <button class="btn btn-md btn-success btn-lg" id="search_code_button"  ><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
 </div>
</div>
{!! Form::close() !!}
</div>
@else
    
  <div class="login_wrapper" id="searchnorm">
    
        <h1>Filter Result</h1>
      
          {!! Form::open(['url' => '/searchAuthor','method'=>'get']) !!}

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
    <div align="right">
            <a href="" id="advance">Advance Search</a> 

          </div>
 <br>
    


  </div>


  <div class="login_wrapper hidden" id="searchad">
        <h1>Filter Result</h1>
               {!! Form::open(['url' => '/searchAuthor','method'=>'get']) !!}
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
 
         <div align="right">
            <a href="" id="normal">Normal Search</a> 
          </div>
 <br>
     

  </div>
@endif



  </div>
</div>
<div class="row">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
<div style="float: right" class="alert alert-warning">
  <a href="{{url('/')}}"><i class="fa fa-arrow-left"></i> Back to Search</a>
</div>
                  <div class="x_content">

                    
<div class="table-responsive" style="-webkit-box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);overflow:auto;  
    -moz-box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);  box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);padding-top: 2%;padding-left:  1%;padding-right: 1%;padding-bottom: 1%">
    <table class="table table-striped jambo_table " style="width: 100%">
      <thead>                  
        <tr class="headings" style="font-size: 16px;">
          <th class="column-title" style="white-space: nowrap !important;">No. </th>
          <th class="column-title" style="white-space: nowrap !important;">Container  </th>
          <th class="column-title"  style="white-space: nowrap !important;">Title </th>
          @if($tick == 1)
          <th class="column-title"  style="white-space: nowrap !important;">Artist </th>   
          @endif                            
          <th class="column-title" style="white-space: nowrap !important;">Material Type </th>
          <th class="column-title" style="white-space: nowrap !important;">Material Description </th>
          <th class="column-title" style="white-space: nowrap !important;">Source</th>
          <th class="column-title" style="white-space: nowrap !important;">Date</th>
        </tr>
      </thead>
      <tbody style="font-size: 14px">   
      <?php $counter = 1;?>     
      @if(count($material) > 0)
         @foreach ($material as $value)
       <tr>
        <td>{{ $counter++ }}</td>
        <td>
          {{ $value->container_type_desc }} -    {{ $value->material_container_desc }}
        </td>
        <td  style="white-space: nowrap !important;">
          {{ $value->material_title }}
        </td>
        @if($tick == 1)
           <td  style="white-space: nowrap !important;">
          {{ $value->author_lastname }}, {{ $value->author_firstname }} {{substr($value->author_middlename,0,1)}}.
        </td>
          @endif   
        <td>
          {{ $value->material_category_desc }}
        </td>
        <td>
          {{ $value->material_desc }}
        </td>
      <td>
        {{ $value->material_source }}
      </td>
      <td>
        {{ $value->material_inclusion_dates }}
      </td>

    </tr>
    @endforeach                    
      @else
      @if($tick == 1)
         <td colspan="8">No Material Found.</td>
      @else
         <td colspan="7">No Material Found.</td>
      @endif
      @endif
  </tbody>

</table>
<div align="center"> 
  {!! $material->appends(['search_author' => $_GET['search_author'],'search_category' => $_GET['search_category'],'title' => $_GET['title']])->render() !!}
            
                  </div>
                </div>
              </div>
</div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top" class="btn btn-primary"><i class="fa fa-arrow-up" aria-hidden="true"></i> Go to top</button>

</div>

@section('scripts')
<script type="text/javascript">
  $.ajax({
      type:"POST",
      url:$('#methodroute').val(),
      data:{author:$('#search_author').val(),'_token':$('meta[name="csrf-token"]').attr('content')},
      beforeSend: function(){

      },
      success:function(data){
        $('#search_category').html('');
        var dataoption;
         dataoption = "";
         dataoption += ' <option value="" selected="">Select Material Category</option>';
        $.each(data,function(index,val){
          dataoption += ' <option value="'+val.material_category_id+'" >'+val.material_category_desc+'</option>';
        });
        $('#search_category').html(dataoption);
      }

    });
</script>
@endsection

@stop

