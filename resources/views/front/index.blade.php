<!DOCTYPE HTML>

 <html>

    <head>

    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <meta charset="utf-8">

        <!-- Description, Keywords and Author -->

        <meta name="csrf-token" content="{!! csrf_token() !!}">

        <meta name="author" content="">

        

        <title>College of Music</title>
        <script type="text/javascript">
        
        </script>

    @include('front.includes.header')

	</head>


  <body class="nav-md" style="background-color: white;width: 100%">
    <div class="container body">
      <div class="main_container">
     
       @yield('indexcontent')

       <br>
<br>
<br>
<br> 
 </div>     
</div>
 <div class="clearfix"></div>
     @include('front.includes.footer')


    </body>

</html>