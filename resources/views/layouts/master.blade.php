<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords"
        content="">

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="/images/favicon.png" />

    <!-- TITLE -->
    <title>{{ getBrands() ? getBrands()->name : '' }}</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLE CSS -->
     <link href="/assets/css/style.css" rel="stylesheet">

	<!-- Plugins CSS -->
    <link href="/assets/css/plugins.css" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="/assets/css/icons.css" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="/assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="/assets/switcher/demo.css" rel="stylesheet">

</head>

<body class="app sidebar-mini ltr light-mode">


    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
                @include('layouts.app-header')
            <!-- /app-Header -->


            <!--APP-SIDEBAR-->
                @include('layouts.app-sidebar')
            <!--/APP-SIDEBAR-->

        </div>

        

 
        <!--app-content open-->
        <div class="main-content app-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">

                    @yield('content')

                </div>
                <!-- CONTAINER END -->
            </div>
        </div>
        <!--app-content close-->    

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SPARKLINE JS-->
    <script src="/assets/js/jquery.sparkline.min.js"></script>

    <!-- Sticky js -->
    <script src="/assets/js/sticky.js"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="/assets/js/circle-progress.min.js"></script>

    <!-- PIETY CHART JS-->
    <script src="/assets/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="/assets/plugins/peitychart/peitychart.init.js"></script>

    <!-- SIDEBAR JS -->
    <script src="/assets/plugins/sidebar/sidebar.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="/assets/plugins/p-scroll/pscroll.js"></script>
    <script src="/assets/plugins/p-scroll/pscroll-1.js"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="/assets/plugins/chart/Chart.bundle.js"></script>
    <script src="/assets/plugins/chart/utils.js"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="/assets/plugins/select2/select2.full.min.js"></script>

    <!-- INTERNAL Data tables js-->
    <script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="/assets/plugins/datatable/dataTables.responsive.min.js"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="/assets/js/apexcharts.js"></script>
    <script src="/assets/plugins/apexchart/irregular-data-series.js"></script>

    <!-- INTERNAL Flot JS -->
    <script src="/assets/plugins/flot/jquery.flot.js"></script>
    <script src="/assets/plugins/flot/jquery.flot.fillbetween.js"></script>
    <script src="/assets/plugins/flot/chart.flot.sampledata.js"></script>
    <script src="/assets/plugins/flot/dashboard.sampledata.js"></script>

    <!-- INTERNAL Vector js -->
    <script src="/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- SIDE-MENU JS-->
    <script src="/assets/plugins/sidemenu/sidemenu.js"></script>

	<!-- TypeHead js -->
	<script src="/assets/plugins/bootstrap5-typehead/autocomplete.js"></script>
    <script src="/assets/js/typehead.js"></script>

    <!-- INTERNAL Notifications js -->
    <script src="/assets/plugins/notify/js/rainbow.js"></script>
    <script src="/assets/plugins/notify/js/jquery.growl.js"></script>
    <script src="/assets/plugins/notify/js/notifIt.js"></script>
    @include('partials.notify')
    @include('partials.message')
    

    <!-- INTERNAL INDEX JS -->
    <script src="/assets/js/index1.js"></script>
     
    <!-- INTERNAL File-Uploads Js-->
    <script src="/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
    <script src="/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
    <script src="/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
    <script src="/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
    <script src="/assets/plugins/fancyuploder/fancy-uploader.js"></script>

    <!-- Color Theme js -->
    <script src="/assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="/assets/js/custom.js"></script>

    <!-- Custom-switcher -->
    <script src="/assets/js/custom-swicher.js"></script>

    <!-- Switcher js -->
    <script src="/assets/switcher/js/switcher.js"></script>
    @stack('script')
    @include('sweetalert::alert')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body', {
            
        })
    </script>
    <script>
        CKEDITOR.replace('editor', {
            
        })
    </script>
</body>

</html>