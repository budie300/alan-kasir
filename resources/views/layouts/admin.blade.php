
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alan-Kasir</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- css bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  @yield('css')

  <style>
    .menu{
        display: inline-block;
        position: relative;
    }
    .text{
        text-decoration: none;
        color: #000;
    }
    .text::after {
        content:'';
        position: absolute;
        background-color: #0d6efd;
        height: 3px;
        width: 0;
        left: 0;
        bottom: -10px;
        transition: 0.3s;
    }
    .text:hover {
        color: #0d6efd;
    }
    .text:hover::after{
        width: 100%;
    }
  </style>
</head>
<body>
    <!-- navbar -->
        <div class="sm-3 navbar bg-primary">
            <h5>Alan Resto</h5>
        </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
             <ul class="navbar-nav">
                <li class="nav-item menu">
                <a class="nav-link text {{ request()->is('foods') ? 'active' : '' }}" aria-current="page" href="{{ url('foods') }}">Food</a>
                </li>
                <li class="nav-item menu">
                <a class="nav-link text {{ request()->is('transactions') ? 'active' : '' }}" href="{{ url('transactions') }}">Transaction</a>
                </li>
            </ul>
            </div>
    </nav>
  <!-- content -->
  <section class="content">
    <div class="container-fluid">
    @yield('content')
    </div>
  </section>

  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <strong>Alan Resto 2020 <a> Developed by Budi Bachtiar</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!--cdn vueJS -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@yield('js')

</body>
</html>