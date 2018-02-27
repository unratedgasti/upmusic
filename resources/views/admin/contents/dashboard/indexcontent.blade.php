@extends('admin.index')
@section('indexcontent')   
@include('admin.includes.sidebar')
@include('admin.includes.topnav')
 <div class="right_col" role="main">
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Active Users</span>
              <div class="count">{{$user_count}}</div>
              <span class="count_bottom"><i class="green"></i></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> All Active Artists</span>
              <div class="count">{{$active_authors}}</div>
              <span class="count_bottom">Out of <i class="green">{{$all_authors}}</i></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-book"></i> Total Active Materials</span>
              <div class="count green">{{$active_materials}}</div>
                  <span class="count_bottom">Out of <i class="green">{{$all_materials}}</i></span>
            </div>
            <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div> -->
          </div>

             <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Recently Materials</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @foreach($recent_mat as $mat)

                    <article class="media event">
                      <!-- <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a> -->
                      <div class="media-body">
                        <p><strong>{{$mat->material_title}}</strong></p>
                        <p>{{$mat->author_lastname}}, {{$mat->author_firstname}} {{$mat->author_middlename}}</p>
                      </div>
                    </article>
                    @endforeach 
                  
                  </div>
                </div>
              </div>
        </div>
       
     
  @stop