<!DOCTYPE HTML>

<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <meta charset="utf-8">

  <!-- Description, Keywords and Author -->
  <meta name="csrf-token" content="{!! csrf_token() !!}">

  <meta name="description" content="">

  <meta name="author" content="">

  

  <title>College of Music</title>

  @include('admin.includes.header')

</head>



<body class="nav-md">

  <div class="container body">
    <div class="main_container">
     @yield('indexcontent')

     @include('admin.includes.footer')
   </div>
 </div>

</body>

</html>