 <div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col menu_fixed">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;" align="center" style="height:800px!important;">
          &nbsp;
       <br>
           <?php

          $url=Request::getPathInfo();
          $segment=explode("/",$url);
          $active_url=$segment[2];
          // dd($segment[3]);

          
          ?>
          <a href="{{URL::to('/admin/dashboard')}}" class="site_title"><img src="{{ ($active_url == 'dashboard' ? (isset($segment[3]) ? '../../includes/admin/images/upcmulogo2.png' : '../includes/admin/images/upcmulogo2.png') : '../../includes/admin/images/upcmulogo2.png') }}" style="width:20%;"></a>

         &nbsp;
       <br>
        </div>

       <div class="clearfix" align="center">
       &nbsp;
       <br>
       &nbsp;
       <br>
         <span style="color:white">UP College of Music</span>
         <br>
         <span style="color:white">Index to Philippine Music Sources</span>
         <br>
         <span style="color:white">"Memorabilia"</span>
       </div>

   


       <!-- menu profile quick info -->
          <!--   <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div> -->
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!-- <h3>General</h3> -->
                <ul class="nav side-menu">
                   <li class="{{ ($active_url == 'dashboard' ? 'active' : '') }}"><a href="{{URL::to('/admin/dashboard')}}"><i class="fa fa-table"></i> Dashboard <!-- <span class="fa fa-chevron-down"></span> --></a>
                    <!-- <ul class="nav child_menu">
                      <li><a href="tables.html">View All Container Types</a></li>
                      <li><a href="tables_dynamic.html">Add New Container Types</a></li>
                    </ul> -->
                  </li>
                   <li class="{{ ($active_url == 'materials' ? 'active' : '') }}"><a><i class="fa fa-edit"></i> Materials <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:{{ ($active_url == 'materials' ? 'block' : '') }};">
                      <li><a href="{{URL::to('/admin/materials/view?list=all')}}">View All Materials</a></li>
                      <li><a href="{{URL::to('/admin/materials/add')}}">Add New Materials</a></li>
                      <!-- <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li> -->
                    </ul>
                  </li>
                  <li class="{{ ($active_url == 'authors' ? 'active' : '') }}"><a><i class="fa fa-user"></i> Artists / Composers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:{{ ($active_url == 'authors' ? 'block' : '') }};">
                      <li><a href="{{URL::to('/admin/authors/view?list=all')}}">View All Artists / Composers</a></li>
                      <li><a href="{{URL::to('/admin/authors/add')}}">Add New Artists / Composers</a></li>
                      <!-- <li><a href="index3.html">Dashboard3</a></li> -->
                    </ul>
                  </li>
                 
                 <!--  <li class="{{ ($active_url == 'subjects' ? 'active' : '') }}"><a><i class="fa fa-book"></i> Subjects <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:{{ ($active_url == 'subjects' ? 'block' : '') }};">
                      <li><a href="{{URL::to('/admin/subjects/view?list=all')}}">View All Subjects</a></li>
                      <li><a href="{{URL::to('/admin/subjects/add')}}">Add New Subjects</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li> -->
                  <li class="{{ ($active_url == 'containertype' ? 'active' : '') }}"><a><i class="fa fa-table"></i> Container Types <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:{{ ($active_url == 'containertype' ? 'block' : '') }};">
                      <li><a href="{{URL::to('/admin/containertypes/view?list=all')}}">View All Container Types</a></li>
                      <li><a href="{{URL::to('/admin/containertypes/add')}}">Add New Container Types</a></li>
                    </ul>
                  </li>
                  <li class="{{ ($active_url == 'materialcategories' ? 'active' : '') }}"><a><i class="fa fa-bar-chart-o"></i> Material Categories <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:{{ ($active_url == 'materialcategories' ? 'block' : '') }};">
                      <li><a href="{{URL::to('/admin/materialcategories/view?list=all')}}">View All Material Categories</a></li>
                      <li><a href="{{URL::to('/admin/materialcategories/add')}}">Add New Material Categories</a></li>
                     <!--  <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li> -->
                    </ul>
                  </li>
                   <!-- <li class="{{ ($active_url == 'backupreports' ? 'active' : '') }}"><a><i class="fa fa-cog"></i> Back-ups and Reports <span class="fa fa-chevron-down"></span></a> -->
                    <li class="{{ ($active_url == 'backupreports' ? 'active' : '') }}"><a><i class="fa fa-cog"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:{{ ($active_url == 'backupreports' ? 'block' : '') }};">
                    <!--   <li><a href="{{URL::to('/admin/backupreports/database_backup')}}">Back-ups</a></li> -->
                      <li><a href="{{URL::to('/admin/backupreports/view_reports')}}">Reports</a></li>
                     <!--  <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li> -->
                    </ul>
                  </li>
                 <!--  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
              <!-- <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                      </ul>
                    </li>                  
                    <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                  </ul>
                </div> -->

              </div>
              <!-- /sidebar menu -->

              <!-- /menu footer buttons -->
            <!--   <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                  <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
              </div> -->
              <!-- /menu footer buttons -->
            </div>
          </div>