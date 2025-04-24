<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog-Z Bootstrap 5.0 HTML Template</title>
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/templatemo-style.css">
<!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
</head>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    @include('frontend.layouts.header')

    @yield('content') <!-- container-fluid, tm-container-content -->

    @include('frontend.layouts.footer')
    
    <script src="{{asset('assets/frontend')}}/js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>