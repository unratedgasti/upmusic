<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>College of Music | </title>

  <!-- Bootstrap -->
  <link href="{!! asset('includes/admin/vendors/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{!! asset('includes/admin/vendors/font-awesome/css/font-awesome.min.css') !!}"  rel="stylesheet">
  <!-- NProgress -->
  <link href="{!! asset('includes/admin/vendors/nprogress/nprogress.css') !!}"  rel="stylesheet">
  <!-- Animate.css -->
  <link href="{!! asset('includes/admin/vendors/animate.css/animate.min.css') !!}"  rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{!! asset('includes/admin/build/css/custom.min.css') !!}"  rel="stylesheet">
</head>

<body class="login">
  <div>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div align="center"><img src="includes/admin/images/UPmc.jpg" style="width:50%;"></div>
            <br>
            <h3><strong>Administrator Login</strong></h3>
            <div>
            <input id="username" type="text" class="form-control" name="username" placeholder="Username" required="" value="{{ old('username') }}">

            </div>
            <div>
             <input id="password" type="password" class="form-control" placeholder="Password" name="password" required="">
            @if ($errors->has('username'))
              <span class="help-block" style="color:red;">
                <strong>{{ $errors->first('username') }}</strong>
              </span>
              @endif
          </div>
          <div>
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-btn fa-sign-in"></i> Login
            </button>
       <!--      <a class="reset_pass" href="#">Lost your password?</a> -->
          </div>

          <div class="clearfix"></div>

          <div class="separator">

          </div>
        </form>
      </section>
    </div>    
  </div>
</div>
</body>
</html>
