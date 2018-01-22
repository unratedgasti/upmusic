@extends('admin.index')
@section('indexcontent')   
@include('admin.includes.sidebar')
@include('admin.includes.topnav')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Material Categories</h3>

        <div class="btn-group" style="padding-bottom:10px;">
          <button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-xs" type="button" aria-expanded="false">Filter List <span class="caret"></span>
          </button>
          <ul role="menu" class="dropdown-menu">
            <li><a href="{{URL::to('/admin/materialcategories/view?list=all')}}">All</a>
            </li>
            <li><a href="{{URL::to('/admin/materialcategories/view?list=active')}}">Active</a>
            </li>
            <li><a href="{{URL::to('/admin/materialcategories/view?list=inactive')}}">Inactive</a>
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
              <button class="btn btn-default" id="search_btn_materialcategories" type="button">Go!</button>
             <!--  <a class="btn btn-default" href=""  style="padding: 10px 18px !important;">Go!</a> -->
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    @if(isset($_GET['response']))
    <div class="alert alert-success alert-dismissible " role="alert">
     <strong>Material Category Successfully Updated!</strong>
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

                 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    @stop