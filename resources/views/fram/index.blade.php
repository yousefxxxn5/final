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
    <title>Admin Dashboard</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <?php
    $title = "Home";
    ?>
    @livewireScripts
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

                {{-- @livewire('livewire.live-wire-button-state') --}}
                <livewire:live-wire-button-state />

                {{-- @if (session('add_user'))
                <div class="alert alert-success solid alert-dismissible fade show">
                    <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                    fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg>
                <strong>Success!</strong> {{ session('add_user') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>
            @endif --}}
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
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    {{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('65706cc0b4fe13fb0554', {
          cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
          alert(JSON.stringify(data));
        });
      </script> --}}
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>

</body>

</html>
