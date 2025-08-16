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
    <title>Setting</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    @livewireStyles
</head>

<body>

    <body>
        <?php
$title = "Setting";
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
        <!--*******************
            Preloader end
        ********************-->

        <!--**********************************
            Main wrapper start
        ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
                Nav header start
            ***********************************-->
            @include('partials.nav')

            <!--**********************************
                Nav header end
            ***********************************-->



            <!--**********************************
                Header start
            ***********************************-->

            @include('partials.header')
            <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

            <!--**********************************
                Sidebar start
            ***********************************-->
            @include('partials.sidebar')
            <!--**********************************
                Sidebar end
            ***********************************-->

            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                @if (session('massges'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <strong>Success!</strong> {{ session('massges') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif
                <div class="container-fluid">
                    <!-- Test Button Section -->
                    <livewire:live-wire-test />
                    <br><br>
                    <!-- Update Settings Form -->

                    <!-- Sensor Enable Section -->

                    <!-- SMS Settings -->
                    <form action="" method="get">

                        <label>Send SMS to Numbers:</label><br>
                        <input type="input" name="n1_sms" value="+967778467871" readonly>
                        <input type="input" name="n2_sms" value="+967778989123" readonly>
                        <input type="input" name="n3_sms" value="+967711232316" readonly>
                    </form>

                        <br><br>

                        <!-- WhatsApp Settings -->
                        <label>Send WhatsApp Messages :</label><br>

                        <livewire:user-whatsaap />
                        <br>

                        <!-- Email Settings -->
                        <label>telegram:</label><br>
                        <livewire:users-telegram />
                        <form action="{{ route('update_setting', Auth::id()) }}" method="get">
                            @csrf
                        <br>
                        <label style="color: brown;">Select sensor to activate device:</label><br>

                        <input type="hidden" name="IR_senser" value="0">
                        <input type="checkbox" id="vehicle1" name="IR_senser" value="1" @if ($key->IR_senser) checked
                        @endif>
                        <label for="vehicle1">IR Sensor</label><br>

                        <input type="hidden" name="SWITCH_senser" value="0">
                        <input type="checkbox" id="vehicle2" name="SWITCH_senser" value="1" @if ($key->SWITCH_senser)
                        checked @endif>
                        <label for="vehicle2">Switch Sensor</label><br>

                        <input type="hidden" name="CAMRA_senser" value="0">
                        <input type="checkbox" id="vehicle3" name="CAMRA_senser" value="1" @if ($key->CAMRA_senser)
                        checked @endif>
                        <label for="vehicle3">Fire sensor</label><br>

                        <br><br>

                        <!-- Device Navigation Settings -->
                        <label>Setting Navigation Device:</label><br>

                        <input type="hidden" name="alart_sound" value="0">
                        <input type="checkbox" id="vehicle4" name="alart_sound" value="1" @if ($key->alart_sound)
                        checked @endif>
                        <label for="vehicle4">Alert Sound</label><br>

                        <input type="hidden" name="saaaq_electrical" value="0">
                        {{-- <input type="checkbox" id="vehicle6" name="saaaq_electrical" value="1" @if
                            ($key->saaaq_electrical) checked @endif> --}}
                        {{-- <label for="vehicle6">Electric Shock</label><br>

                        <input type="hidden" name="send_sms" value="0">
                        <input type="checkbox" id="vehicle7" name="send_sms" value="1" @if ($key->send_sms) checked
                        @endif>
                        <label for="vehicle7">Send SMS Message</label><br> --}}

                        <input type="hidden" name="send_whatapp" value="0">
                        <input type="checkbox" id="vehicle8" name="send_whatapp" value="1" @if ($key->send_whatapp)
                        checked @endif>
                        <label for="vehicle8">Send WhatsApp Message</label><br>

                        <input type="hidden" name="send_emil" value="0">
                        <input type="checkbox" id="vehicle9" name="send_emil" value="1" @if ($key->send_emil) checked
                        @endif>
                        <label for="vehicle9">Send Email Message</label><br>

                        <input type="hidden" name="send_pumm" value="0">
                        <input type="checkbox" id="vehicle10" name="send_pumm" value="1" @if ($key->send_pumm) checked
                        @endif>
                        <label for="vehicle10">Pumm Alert</label><br>

                        <input type="hidden" name="send_eleictrical" value="0">
                        <input type="checkbox" id="vehicle11" name="send_eleictrical" value="1" @if ($key->send_eleictrical) checked @endif>
                        <label for="vehicle11">Send Electrical Alert</label><br>

                        <input type="hidden" name="send_network" value="0">
                        <input type="checkbox" id="vehicle12" name="send_network" value="1" @if ($key->send_network)
                        checked @endif>
                        <label for="vehicle12">Send Network Alert</label><br>

                        <br><br>

                        <!-- Submit Button -->
                        <input type="submit" value="OK">
                    </form>
                </div>


                <div class="container mt-5">

                </div>
            </div>

        </div>
        <!--**********************************
                Content body end
            ***********************************-->

        <!--**********************************
                Footer start
            ***********************************-->
        <div class="footer">

        </div>
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
        <script src="vendor/global/global.min.js"></script>
        <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/dlabnav-init.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/styleSwitcher.js"></script>
        @livewireScripts
    </body>

</html>