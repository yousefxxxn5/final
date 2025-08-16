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

</head>

<body>
    <?php
    $title = "User table";
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

            <!-- row -->
            <div class="container-fluid">
                @if (session('massges'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <strong>Success!</strong> {{ session('massges') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif
            </div>
            {{-- <table class="table table-bordered table-hover">
                    <div>
                    </div>
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>is_twoilo</th>
                            <th>twoilo_code</th>
                            <th>is_valid</th>
                            <th>whatsAppNumber</th>
                            <th>whatsAppToken</th>
                            <th>whatsAppTo</th>
                            <th>EmailNumber</th>
                            <th>EmailToken</th>
                            <th>EmailTo</th>
                            <th>smsNumber</th>
                            <th>smsToken</th>
                            <th>smsTo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_twoilo }}</td>
                                <td>{{ $user->twoilo_code }}</td>
                                <td>{{ $user->is_valid }}</td>
                                <td>{{ $user->whatsAppNumber }}</td>
                                <td>{{ $user->whatsAppToken }}</td>
                                <td>{{ $user->whatsAppTo }}</td>
                                <td>{{ $user->EmailNumber }}</td>
                                <td>{{ $user->EmailToken }}</td>
                                <td>{{ $user->EmailTo }}</td>
                                <td>{{ $user->smsNumber }}</td>
                                <td>{{ $user->smsToken }}</td>
                                <td>{{ $user->smsTo }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table> --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Patient</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Action</th>
                                        <th>Name</th>

                                        {{-- <th>email</th> --}}
                                        {{-- <th>is_twoilo</th> --}}
                                        {{-- <th>twoilo_code</th> --}}
                                        {{-- <th>is_valid</th> --}}
                                        <th>Status</th>
                                        <th>whatsAppNumber</th>
                                        {{-- <th>whatsAppToken</th> --}}
                                        <th>whatsAppTo</th>
                                        {{-- <th>EmailNumber</th> --}}
                                        {{-- <th>EmailToken</th> --}}
                                        {{-- <th>EmailTo</th> --}}
                                        <th>smsNumber</th>
                                        {{-- <th>smsToken</th> --}}
                                        <th>smsTo</th>
                                    </tr>
                                </thead>
                                {{-- <tr>

                                        <td>#P-00001</td>
                                        <td>26/02/2020, 12:42 AM</td>
                                        <td>Tiger Nixon</td>
                                        <td>Dr. Cedric</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger me-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                        <td>AB-001</td>
                                        <td>
                                            <div class="dropdown ms-auto text-end">
                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr> --}}
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                <div class="dropdown ms-auto text-end">
                                                    <div class="btn-link" data-bs-toggle="dropdown">
                                                        <svg width="24px" height="24px" viewbox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item"
                                                            href="{{ route('user_table.edit', $user->id) }}">edit</a>
                                                        <a class="dropdown-item" href="#">Reject Order</a>
                                                        <a class="dropdown-item" href="#">View Details</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            {{-- <td>{{ $user->email }}</td> --}}
                                            {{-- <td>{{ $user->is_twoilo }}</td> --}}
                                            {{-- <td>{{ $user->twoilo_code }}</td> --}}
                                            {{-- <td>{{ $user->is_valid }}</td> --}}
                                            <td>

                                                @if ($user->state == 0)
                                                    <span class="badge light badge-danger">
                                                        <i class="fa fa-circle text-danger me-1"></i>
                                                        غير مفعل
                                                    </span>
                                                @endif
                                                @if ($user->state == 1)
                                                    <span class="badge light badge-warning">
                                                        <i class="fa fa-circle text-warning me-1"></i>
                                                        مفعل
                                                    </span>
                                                @endif
                                                @if ($user->state == 3)
                                                <span class="badge badge-light badge-warning" style="background-color: #87CEEB;">
                                                        <i class="fas fa-circle" style="color: #74C0FC;"></i>
                                                        في انتضار الدفع
                                                    </span>
                                                @endif
                                                @if ($user->state == 2)
                                                <span class="badge light badge-success">
                                                    <i class="fa fa-circle text-success me-1"></i>
                                                    يعمل
                                                </span>
                                                @endif
                                            </td>

                                            <td>{{ $user->whatsAppNumber }}</td>
                                            {{-- <td>{{ $user->whatsAppToken }}</td> --}}
                                            <td>{{ $user->whatsAppTo }}</td>
                                            {{-- <td>{{ $user->EmailNumber }}</td> --}}
                                            {{-- <td>{{ $user->EmailToken }}</td> --}}
                                            {{-- <td>{{ $user->EmailTo }}</td> --}}
                                            <td>{{ $user->smsNumber }}</td>
                                            {{-- <td>{{ $user->smsToken }}</td> --}}
                                            <td>{{ $user->smsTo }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
        </div>
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
    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>
