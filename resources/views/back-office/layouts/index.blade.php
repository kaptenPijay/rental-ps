<!DOCTYPE html>
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
      Aplikasi Rental PS
  </title>
  <meta name="theme-color" content="#ffffff">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

  <!-- Vendors styles-->
  <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/vendors/simplebar.css') }}">

  <link href="{{ asset('vendors/remixicon/fonts/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/my-style.css') }}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div class="wrapper d-flex position-relative" style="background-color: #F1F4FA">
    <div class="div-sidebar" style="width: auto;">
      @include('back-office.components.sidebar')
    </div>
    <div class="div-content w-100" style="background-color: #F1F4FA">
      @include('back-office.components.header')
      <div class="container-content">
        @yield('content')
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function(){
        $('.nav-group-toggle').click(function(e){
            e.preventDefault();
            $(this).parent().find('.nav-group-items').toggle();
        });
    });
  </script>

  @yield("custom_js")
</body>

</html>
