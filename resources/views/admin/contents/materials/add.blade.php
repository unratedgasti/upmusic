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

           <!--    <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add New</h2>
                   <!--  <ul class="nav navbar-right panel_toolbox">
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
                    {{ Form::open(array('url' => 'foo/bar', 'method' => 'post', 'class'=>'form-horizontal form-label-left')) }}
                    <!--   <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->
                      <div align="center" id="notif" style="color:red; display:none">Please fill up all the required fields</div>
                      <br>
                      <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="container_type" >Container Type:</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="container_type_id" name="container_type_id" class="form-control select2" required>
                          <option value="">Choose..</option>
                          <option value="press">Press</option>
                          <option value="net">Internet</option>
                          <option value="mouth">Word of mouth</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Container Identifier:
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="material_container_desc" style="border-color: #aaa!important;" id="material_container_desc" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


                    <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_id" >Author/Composer:</label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="author_id" name="author_id" class="form-control select2" required>
                        <option value="">Choose..</option>
                        <option value="press">Press</option>
                        <option value="net">Internet</option>
                        <option value="mouth">Word of mouth</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="material_title">Material Title:
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="material_title" style="border-color: #aaa!important;" id="material_title" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="material_desc">Material Description:
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="material_desc" style="border-color: #aaa!important;" id="material_desc" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_id" >Subject:</label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="subject_id" name="subject_id" class="form-control select2" required>
                      <option value="">Choose..</option>
                      <option value="press">Press</option>
                      <option value="net">Internet</option>
                      <option value="mouth">Word of mouth</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="material_num_copies" >Number of Copies:</label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="material_num_copies" name="material_num_copies" class="form-control select2" required>
                    <option value="">Choose..</option>
                    <option value="press">Press</option>
                    <option value="net">Internet</option>
                    <option value="mouth">Word of mouth</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="material_inclusion_dates">Inclusion Dates:
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="material_inclusion_dates" style="border-color: #aaa!important;" id="material_inclusion_dates" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="material_call_num">Call Number:
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="material_call_num" style="border-color: #aaa!important;" id="material_call_num" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="material_acc_num">Acc Number:
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="material_acc_num" style="border-color: #aaa!important;" id="material_acc_num" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group" align="center">
               <input type="button" id="btn-submit" class="btn btn-round btn-success" value="SAVE">
             </div>


             {{ Form::close() }}
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>

 


@stop
