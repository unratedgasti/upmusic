@extends('admin.index')
@section('indexcontent')   
@include('admin.includes.sidebar')
@include('admin.includes.topnav')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>MATERIALS</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>List</h2>
                  <!--   <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="table-responsive">
                      <!-- <table class="table table-striped jambo_table bulk_action"> -->
                        <table class="table table-striped jambo_table table-bordered">
                          <thead>
                      <!--     <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th> -->
                            <th class="column-title" style="text-align: center!important;">Container Type</th>
                            <th class="column-title" style="text-align: center!important;">Container Identifier</th>
                            <th class="column-title" style="text-align: center!important;">Author Name </th>
                            <th class="column-title" style="text-align: center!important;">Category</th>
                            <th class="column-title" style="text-align: center!important;">Title</th>
                            <th class="column-title" style="text-align: center!important;">Description</th>
                            <th class="column-title" style="text-align: center!important;">No . of Copies</th>
                            <th class="column-title" style="text-align: center!important;">Inclusion Dates</th>
                            <th class="column-title" style="text-align: center!important;">Call Number</th>
                            <th class="column-title" style="text-align: center!important;">Acc Number</th>
                            
                            <!-- <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th> -->
                          <!--   <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th> -->
                          </tr>
                        </thead>

                        <tbody>
                          @foreach ($materials as $material)
                        
                          <tr class="even pointer">
                           <td class=" ">{{$material->container_type_desc}}</td>
                           <td class=" ">{{$material->material_container_desc}}</td>
                           <td class=" ">{{$material->author_firstname}} {{$material->author_middlename}} {{$material->author_lastname}}</td>
                           <td class=" ">{{$material->material_category_desc}}</td>
                           <td class=" ">{{$material->material_title}}</td>
                           <td class=" ">{{$material->material_desc}}</td>
                           <td class=" " align="center">{{$material->material_num_copies}}</td>
                           <td class="">{{$material->material_inclusion_dates}}</td>
                           <td class="">{{$material->material_call_num}}</td>
                           <td class="">{{$material->material_acc_num}}</td>                           
                         </tr>
                         @endforeach


                       </tbody>
                     </table>
                   </div>
                   {!! $materials->render() !!} 
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>


       @stop