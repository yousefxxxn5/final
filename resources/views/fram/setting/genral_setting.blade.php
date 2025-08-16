<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>AL krymy</title>

    <!-- FAVICONS ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <?php
$title = "الاعدادات العامة";
    ?>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="main-wrapper">


        @include('partials.nav')

        @include('partials.header')


        @include('partials.sidebar')

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">


                <div>


                <livewire:update-password />


                </div>
                <!--**********************************
            Content body end
        ***********************************-->

                <!--**********************************
            Footer start
        ***********************************-->

                <!--**********************************
            Footer end
        ***********************************-->

                <!--**********************************
           Support ticket button start
        ***********************************-->

                <!--**********************************
           Support ticket button end
        ***********************************-->



            </div>
        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <!--**********************************
        Scripts
    ***********************************-->
        <!-- Required vendors -->
        @livewireScripts
        <script>
            window.addEventListener('nameupdated', () => {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            });
        </script>
        <script src="vendor/global/global.min.js"></script>
        <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/dlabnav-init.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/styleSwitcher.js"></script>
</body>

</html>