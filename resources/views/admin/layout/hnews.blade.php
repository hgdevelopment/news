<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>@yield('title') | H News</title>
  <meta name="description" content="hnews, heera news, urdu news, islamic news" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="{{URL::asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::asset('lib/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css/sb-admin-2.css')}}" rel="stylesheet">

    <link href="{{URL::asset('lib/morrisjs/morris.css')}}" rel="stylesheet">

    <link href="{{URL::asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

  <style type="text/css">  
  body{
  font-family: "Poppins", sans-serif;
  }
  </style>
</head>
<body class=" fix-header  card-no-border ">

  <div class="preloader">
 
  </div>
  <div id="main-wrapper">
    @section('sidebar')
    @show
    @section('body')
    @show
    @include('admin.partial.footer')
  </div>
  </div>
    <script src="{{URL::asset('lib/jquery/jquery.min.js')}}"></script>

    <script src="{{URL::asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{URL::asset('lib/metisMenu/metisMenu.min.js')}}"></script>

    <script src="{{URL::asset('js/sb-admin-2.js')}}"></script>



  @section('jquery')
  @show

</body>
</html>
