<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="/biometric.png" />
  <link rel="stylesheet" href="/assets/css/styles.min.css" />
  <script src="/assets/js/jquery-3.7.1.min.js"></script>
  <script src="/assets/js/jquery-3.7.1.min.js"></script>
  <script src="/assets/js/sweetalert2.all.js"></script>
  <link href="/assets/DataTables/datatables.min.css" rel="stylesheet">
  <script src="/assets/DataTables/datatables.min.js"></script>

  <script src="/fingerprint/js/es6-shim.js"></script>
  <script src="/fingerprint/js/websdk.client.bundle.min.js"></script>
  <script src="/fingerprint/js/fingerprint.sdk.min.js"></script>
  <script src="/fingerprint/js/custom.js"></script>

  <title>@yield('title') - {{ getenv('APP_NAME') }}</title>

  <link rel="stylesheet" href="/fingerprint/custom.css">

  <link href="/assets/select2/select2.min.css" rel="stylesheet" />
  <script src="/assets/select2/select2.min.js"></script>
  <link rel="stylesheet" href="/assets/select2/select2-bootstrap-5-theme.min.css" />
  <link rel="stylesheet" href="/assets/select2/select2-bootstrap-5-theme.rtl.min.css" />

  <script src="/assets/js/chart.js"></script>
  <script src="/assets/js/apexcharts.js"></script>
  <script src="/assets/js/index.min.js"></script>
  <div id="confetti-container">
    <canvas id="my-canvas"></canvas>
  </div>
  <style>
      #confetti-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 999; 
        pointer-events: none;
      }

      #my-canvas {
        width: 100%;
        height: 100%;
      }

  </style>  

  <style>
   @font-face {
      font-family: 'Plus Jakarta Sans';
      font-style: normal;
      font-weight: normal;
      src: url('/assets/font/static/PlusJakartaSans-Medium.ttf') format('truetype');
    }
  </style>

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    
    @include('layouts.partials.sidebar')

    <!--  Main wrapper -->
    <div class="body-wrapper">

      @include('layouts.partials.header')

        <div class="container-fluid">

            @yield('content')

            @include('layouts.partials.footer')
            
        </div>
    </div>
  </div>

  <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/sidebarmenu.js"></script>
  <script src="/assets/js/app.min.js"></script>
  <script src="/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>