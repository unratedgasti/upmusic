@extends('admin.index')
@section('indexcontent')   
@include('admin.includes.sidebar')
@include('admin.includes.topnav')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Users</h3>
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
            <h2>All Users</h2>
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
                   @if(isset($datas))
                   <div class="alert alert-success alert-dismissible " role="alert">
                     <strong>{{$datas}}</strong>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>                    
                  @endif
                  <div class="table-responsive"  style="overflow-x: auto; width:100%;padding-bottom:20px" >
                    <!-- <table class="table table-striped jambo_table bulk_action"> -->
                      <table class="table jambo_table table-bordered rable-responsive" style="padding-bottom:20px">
                        <thead>
                      <!--     <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th> -->
                            <th class="column-title" style="text-align: center!important;">Actions</th>
                             <th class="column-title" style="text-align: center!important;">ID</th>
                            <th class="column-title" style="text-align: center!important;">Name</th>

                            <!-- <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th> -->
                          <!--   <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th> -->
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)

                          <tr class="even pointer" >
                            <td class="" align="center" style="vertical-align:middle;">
                              <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-round btn-xs" type="button" aria-expanded="false">Actions <span class="caret"></span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                  <li><a href="">Edit</a>
                                  </li>
                                  <li><a href="">Activate</a>
                                  </li>
                          <!--     <li class="divider"></li>
                              <li><a href="#">Separated link</a>
                              </li> -->
                            </ul>
                          </div>
                        </td>  
                        <td class=" " style="white-space: nowrap; text-align: center!important;">{{$user->id}}</td>     
                        <td class=" " style="white-space: nowrap; text-align: center!important;">{{$user->name}}</td>

                      </tr>
                      
                      @endforeach


                    </tbody>
                  </table>
                </div>
                <div align="center">
                  {!! $users->render() !!}
                </div>
                <div align="center">
                 <a class="btn btn-success dropdown-toggle btn-round " href="{{URL::to('/admin/dashboard/adduser')}}" >Add New User
                 </a>
               </div> 
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>


   @stop