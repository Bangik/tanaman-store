<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/fontawesome.all.min.css')}}">

  <!-- CSS Libraries -->
  @stack('libraries-style')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/components.css')}}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @include('layouts.admin.navbar')
      
      @include('layouts.admin.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>
      
      @include('layouts.admin.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/popper.js')}}"></script>
  <script src="{{asset('js/tooltip.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('js/moment.min.js')}}"></script>
  <script src="{{asset('js/stisla.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('js/scripts.js')}}"></script>

  <!-- Page Specific JS File -->
  @stack('libraries-script')
</body>
</html>