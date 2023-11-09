<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('/form/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('/form/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('/form/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">

    <!-- Template Stylesheet -->
    <link href="{{ url('/form/css/style.css') }}" rel="stylesheet">
</head>

<body style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgb(39, 86, 161)); !important">


    @yield('myform')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/form/lib/chart/chart.min.js') }} "></script>
    <script src="{{ url('/form/lib/easing/easing.min.js') }} "></script>
    <script src="{{ url('/form/lib/waypoints/waypoints.min.js') }} "></script>
    <script src="{{ url('/form/lib/owlcarousel/owl.carousel.min.js') }} "></script>
    <script src="{{ url('/form/lib/tempusdominus/js/moment.min.js') }} "></script>
    <script src="{{ url('/form/lib/tempusdominus/js/moment-timezone.min.js') }} "></script>
    <script src="{{ url('/form/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ url('/form/js/main.js') }}"></script>
</body>

</html>