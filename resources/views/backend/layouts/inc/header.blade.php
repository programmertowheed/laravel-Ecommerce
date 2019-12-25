<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield("title") :: Programmer Towheed, Full Stack Web Developer, Get my qualified services now!</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset("/Backend") }}/images/favicon.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{ asset("/Backend") }}/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset("/Backend") }}/assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- Toastr css -->
    <link rel="stylesheet" href="{{ asset('/toastr') }}/toastr.css">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset("/Backend") }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset("/Backend") }}/assets/css/atlantis.min.css">

    <!--custom style -->
    <link rel="stylesheet" href="{{ asset("/Backend") }}/assets/css/style.css">

</head>
<body data-background-color="dark">
<div class="wrapper">
