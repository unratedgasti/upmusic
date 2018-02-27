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
  <div class="col-md-4 col-sm-12 col-xs-12" style="padding-left: 2%">
     {!! Form::open(['url' => '/searchAuthor']) !!}

  <div align="center"  class="alert alert-danger" style="padding: 2%">
    <h3><i class="fa fa-filter" aria-hidden="true"></i> Filter Result <i class="fa fa-filter" aria-hidden="true"></i></h3>
  </div>
   <div  style="padding: 2%">
  <strong style="font-size: 20px">Artist :</strong> <strong style="font-size: 28px;text-decoration: underline;"> {{$material[0]->author_lastname}}, {{$material[0]->author_firstname}} {{substr($material[0]->author_middlename,0,1)}}.</strong>

</div>
  <div class="alert alert-danger alert-dismissible fade in hidden" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <span id="errorcode"></span>
  </div>
  <div>       

    <div style="overflow: hidden; padding-right: .5em;"><br>
 <select class="js-example-basic-single form-control" name="search_category" id="search_category">
      <option value="" selected="">Select Material Category</option>
      @foreach($category as $value)
      <option value="{{$value->material_category_id}}">{{$value->material_category_desc}} </option>
      @endforeach
    </select><br><br>
      {!! Form::text('title', '',array('class'=>'form-control','placeholder'=>'Enter Material Title')) !!}  <br>
    
    {!! Form::hidden('type', 'filter',array('class'=>'form-control'   )) !!} 
    

    {!! Form::hidden('search_author', $material[0]->author_id,array('class'=>'form-control','id'=>'search_author')) !!} 
  </div>
  {!! Form::hidden('methodroute', url('search/getCategory'),array('class'=>'form-control','id'=>'methodroute'   )) !!} 
  <div align="center">
   <br> <button class="btn btn-md btn-success btn-lg" id="search_code_button"  ><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
 </div>
</div>


<div class="clearfix"></div>

{!! Form::close() !!}
  </div>
 <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                

                  <div class="x_content">

                    
<div class="table-responsive" style="-webkit-box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);overflow:auto;  
    -moz-box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);  box-shadow: 1px 2px 13px 0px rgba(8,8,8,0.42);padding-top: 2%;padding-left:  1%;padding-right: 1%;padding-bottom: 1%">
    <table class="table table-striped jambo_table " style="width: 100%">
      <thead>                  
        <tr class="headings" style="font-size: 16px;">
          <th class="column-title" style="white-space: nowrap !important;">No. </th>
          <th class="column-title" style="white-space: nowrap !important;">Container  </th>
          <th class="column-title"  style="white-space: nowrap !important;">Title </th>                            
          <th class="column-title" style="white-space: nowrap !important;">Material Type </th>
          <th class="column-title" style="white-space: nowrap !important;">Source</th>
          <th class="column-title" style="white-space: nowrap !important;">Inclusion Date</th>
        </tr>
      </thead>
      <tbody style="font-size: 14px">   
      <?php $counter = 1;?>              
       @foreach ($material as $value)
       <tr>
        <td>{{ $counter++ }}</td>
        <td>
          {{ $value->container_type_desc }} -    {{ $value->material_container_desc }}
        </td>
        <td  style="white-space: nowrap !important;">
          {{ $value->material_title }}
        </td>
        <td>
          {{ $value->material_category_desc }}
        </td>
      <td>
        {{ $value->material_source }}
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

