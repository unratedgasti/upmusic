@extends('admin.index')
@section('indexcontent')   
@include('admin.includes.sidebar')
@include('admin.includes.topnav')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Authors/Composers</h3>

        <div class="btn-group" style="padding-bottom:10px;">
          <button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-xs" type="button" aria-expanded="false">Filter List <span class="caret"></span>
          </button>
          <ul role="menu" class="dropdown-menu">
            <li><a href="{{URL::to('/admin/authors/view?list=all')}}">All</a>
            </li>
            <li><a href="{{URL::to('/admin/authors/view?list=active')}}">Active</a>
            </li>
            <li><a href="{{URL::to('/admin/authors/view?list=inactive')}}">Inactive</a>
            </li>            
          </ul>
        </div>
      </div>
      <br>
      
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search for..." value="{{ isset($_GET['q']) ? $_GET['q'] : '' }}">
            <span class="input-group-btn">
              <button class="btn btn-default" id="search_btn_authors" type="button">Go!</button>
             <!--  <a class="btn btn-default" href=""  style="padding: 10px 18px !important;">Go!</a> -->
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    @if(isset($_GET['response']))
    <div class="alert alert-success alert-dismissible " role="alert">
     <strong>Author Successfully Updated!</strong>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>                    
  @endif
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>List - {{ucfirst($_GET['list'])}}</h2>

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

                    <div class="table-responsive"  style="overflow-x: auto; width:100%;padding-bottom:20px" >
                      <!-- <table class="table table-striped jambo_table bulk_action"> -->
                      <table class="table jambo_table table-bordered rable-responsive" style="padding-bottom:20px">
                        <thead>
                      <!--     <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th> -->
                            <th class="column-title" style="text-align: center!important;">Actions</th>
                            <th class="column-title" style="text-align: center!important;">First Name</th>
                            <th class="column-title" style="text-align: center!important;">Middle Name</th>
                            <th class="column-title" style="text-align: center!important;">Last Name </th>                  
                            <!-- <th class="column-title no-link last"><span class="nobr">Action</span>
                          </th> -->
                          <!--   <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th> -->
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($authors as $author)
                          @if($author->is_active == 1)
                          <tr class="even pointer">
                           <td class="" align="center" style="vertical-align:middle;">
                            <div class="btn-group">
                              <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-round btn-xs" type="button" aria-expanded="false">Actions <span class="caret"></span>
                              </button>
                              <ul role="menu" class="dropdown-menu">
                             <li><a href="{{URL::to('/admin/authors/edit?id='.$author->author_id)}}">Edit</a>
                                </li>
                              </li>
                              <li><a href="{{URL::to('/admin/authors/changestatus?list=active&id='.$author->author_id.'&status=1')}}">Deactivate</a>
                              </li>
                               <!--  <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li> -->
                              </ul>
                            </div>
                          </td>
                          <td class=" " style="white-space: nowrap;">{{$author->author_firstname}}</td>
                          <td class=" ">{{$author->author_middlename}}</td>
                          <td class=" ">{{$author->author_lastname}}</td>                                                  
                        </tr>
                        @else
                        <tr class="even pointer" bgcolor="#d9d9d9">
                          <td class="" align="center" style="vertical-align:middle;">
                            <div class="btn-group">
                              <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-round btn-xs" type="button" aria-expanded="false">Actions <span class="caret"></span>
                              </button>
                              <ul role="menu" class="dropdown-menu">
                                <li><a href="{{URL::to('/admin/authors/edit?id='.$author->author_id)}}">Edit</a>
                                </li>
                                <li><a href="{{URL::to('/admin/authors/changestatus?list=active&id='.$author->author_id.'&status=0')}}">Activate</a>
                                </li>
                          <!--     <li class="divider"></li>
                              <li><a href="#">Separated link</a>
                              </li> -->
                            </ul>
                          </div>
                        </td>       
                         <td class=" " style="white-space: nowrap;">{{$author->author_firstname}}</td>
                          <td class=" ">{{$author->author_middlename}}</td>
                          <td class=" ">{{$author->author_lastname}}</td>                        
                      </tr>
                      @endif
                      @endforeach


                    </tbody>
                  </table>
                </div>
                {!! $authors->appends(['list' => $_GET['list']])->render() !!} 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    @stop