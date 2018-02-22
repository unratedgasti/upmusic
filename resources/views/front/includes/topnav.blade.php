       <style type="text/css">
       #container {
        width:100%;
        text-align:center;
        padding: 5%
      }

      #left {
        float:left;
        width: 10%;
      }

      #center {
        display: inline-block;
        margin:0 auto;
        width:60%;
      }

      #right {
        float:right;
        width:10%;
      }
    </style>
    <div class="top_nav"  style="background-color:  #404040;margin-left:0% !important;width: 100%">
      <div class="nav_menu" style="background-color:  #404040;border: none">
        <nav>
          <ul class="nav navbar-nav navbar-right" style="padding-right: 3%" style="background-color: #404040">
            <li class="">
              <a href="{{url('admin_login')}}" class="" >
                <font color="white">Login</font>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div id="container">
      <div id="left">
        <img src="{{asset('includes/front/images/uplogo.png')}}" width="100%"  class="img-responsive">
      </div>
      <div id="center" align="center" >
        <h1 style="font-size: 42px">College of Music</h1>
        <h2 style="font-size: 28px">Index to Filipino Musical Artist and their Works</h2>
        <h2 style="font-size: 24px">(Memorabilia)</h2>       
      </div>
      <div id="right" >
        <img src="{{asset('includes/front/images/upcom.png')}}" width="100%" class="img-responsive">
      </div>
    </div>
