<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') &mdash; Tanaman Store</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/fontawesome.all.min.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/components.css')}}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        @yield('content') 
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/popper.js')}}"></script>
  <script src="{{asset('js/tooltip.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('js/moment.min.js')}}"></script>
  <script src="{{asset('js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  @stack('libraries-scripts')

  <!-- Page Specific JS File -->
  @stack('page-scripts')

  <!-- Template JS File -->
  <script src="{{asset('js/scripts.js')}}"></script>
</body>
</html>