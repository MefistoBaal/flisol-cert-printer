<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Certificados Flisol">
    <meta name="author" content="Santiago Hurtado">

    <!-- Title Page-->
    @yield('title')

    <!-- Fontfaces CSS-->
    <link href="{{asset('css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendors/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendors/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendors/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link rel="icon" href="{{asset('images/logo_flisol.png')}}">

    <!-- Bootstrap CSS-->
    <link href="" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/node_modules/animsition/dist/css/animsition.min.css" rel="stylesheet" media="all">
    <link href="/node_modules/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{asset('vendors/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendors/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" media="all">
    <link href="/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="/node_modules/jquery-toast-plugin/dist/jquery.toast.min.css">
    <link rel="stylesheet" href="{{asset('vendors/datatables/media/css/jquery.dataTables.min.css')}}">

    <!-- Main CSS-->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">

    @yield('css')

</head>

<body class="animsition">
<div class="page-wrapper">

    @yield('content')

</div>
<!-- Jquery JS-->
<script src="/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<!-- Bootstrap JS-->
<script src="{{asset('vendors/popper.min.js')}}"></script>
<script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="{{asset('vendors/slick/slick.min.js')}}">
</script>
<script src="{{asset('vendors/wow/wow.min.js')}}"></script>
<script src="/node_modules/animsition/dist/js/animsition.min.js"></script>
<script src="/node_modules/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="{{asset('vendors/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('vendors/counter-up/jquery.counterup.min.js')}}">
</script>
<script src="{{asset('vendors/circle-progress/circle-progress.min.js')}}"></script>
<script src="/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="{{asset('vendors/chartjs/Chart.bundle.min.js')}}"></script>
<script src="/node_modules/select2/dist/js/select2.min.js">
</script>
<script src="{{asset('vendors/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>

<!-- Main JS-->
<script src="{{asset('js/main.js')}}"></script>

@yield('scripts')
</body>

</html>
<!-- end document-->