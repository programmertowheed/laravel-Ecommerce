<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Programmer Towheed, Full Stack Web Developer & Social Entrepreneur">
    <meta name="keywords" content="Entrepreneur,Web Developer, Programmer, Programmer Towheed, Bangladesh, Online Earning, Earn Money online, Bangla Video Tutorial">
    <meta name="author" content="Programmer Towheed">
    <meta property="og:image" content="{{ asset("/Backend") }}/images/favicon.png" />

    <title>@yield("title")</title>


    <!-- Favicon -->
    <link href="{{ asset("/Backend") }}/images/favicon.ico" rel="shortcut icon" >
    <link href="{{ asset("/Backend") }}/images/favicon.png" rel="icon" type="image/png">




    <!-- bootstrap stylesheet-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- fontawesome stylesheet-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css" media="all" />

    <!-- coustom style-->
    <style type="text/css">
        body {
            font-family: arial;
            position: relative;
            background: #58757C;
        }

        label {
            margin-bottom: 0;
        }
        .form-control {
            display: inline-block;
        }
        .lfrom-inner {
            padding: 20px;
            margin: 100px auto;
            border: 1px solid #F98D79;
            border-radius: 5px;
            background-color: #0504044d;
            color: #F9F9F9;
        }
        .lfrom-inner h4.log-text.text-center.mb-4 {
            font-size: 25px;
            border-bottom: 2px solid tomato;
            padding-bottom: 10px;
            margin: 20px 61px;
        }
        .lfrom-inner .form-group {
            margin: 10px 0;
        }
        .lfrom-inner label {
            font-size: 17px;
            padding: 5px 0;
        }
        .lfrom-inner svg:not(:root).svg-inline--fa {
            font-size: 16px;
        }
        .lfrom-inner .form-control {
            font-size: 1em;
        }
        .lfrom-inner .tomato{
            background-color:tomato;
            color:#fff;
            border:1px solid #ce7867;
            font-size: 18px;
            padding: 5px;
            margin-bottom: 10px;
        }
        .lfrom-inner .tomato:hover{
            background-color:#cf442b;
        }

        .lfrom-inner a{
            color:#52ded2;
        }

        .lfrom-inner a:hover{
            text-decoration: none;
            color:#2abdb1;
        }

        .requerd{
            color:#f81616;
            background-color: #f000;
            margin-left: 3px;
        }

        .form-check-input{
            margin-top: 11px;
        }

    </style>


</head>
<body>

<div class="lbgpic">
    <div class="container">
        <div class="row">
            <div class="lfrom-inner " style="@yield('registerClass')">

                @yield("content")

            </div>
        </div>
    </div>
</div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- fontawesome file-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/js/all.min.js" type="text/javascript"></script>


</body>
</html>
