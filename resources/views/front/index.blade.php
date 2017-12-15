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



    <body class="login" style="background-color: white;min-height: 100%">
      
    <div>
       @yield('indexcontent')

     @include('front.includes.footer')
</div>

    </body>

</html>