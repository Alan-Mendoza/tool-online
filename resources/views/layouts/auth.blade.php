<!doctype html>
<html lang="en" data-bs-theme="blue-theme">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <!--favicon-->
            <link rel="icon" href="{{ asset('admin/images/favicon-32x32.png') }}" type="image/png">
        <!-- loader-->
            <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet">
            <script src="{{ asset('admin/js/pace.min.js') }}"></script>

        <!--plugins-->
        <link href="{{ asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/metismenu/metisMenu.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/metismenu/mm-vertical.css') }}">
        <!--bootstrap css-->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
        <!--main css-->
        <link href="{{ asset('admin/css/bootstrap-extended.css') }}" rel="stylesheet">

        <link href="{{ asset('admin/sass/main.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/sass/dark-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/sass/blue-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/sass/responsive.css') }}" rel="stylesheet">
    </head>

    <body>

    @yield('content')
    <!--plugins-->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>

    <script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("bi-eye-slash-fill");
            $('#show_hide_password i').removeClass("bi-eye-fill");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("bi-eye-slash-fill");
            $('#show_hide_password i').addClass("bi-eye-fill");
        }
        });
    });
    </script>

    </body>
</html>
