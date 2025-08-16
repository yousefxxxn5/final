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
	<meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

	<!-- Style css -->
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

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
		{{-- @include('partials.nav') --}}
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Chat box start
        ***********************************-->

		<!--**********************************
            Chat box End
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
       {{-- @include('partials.header') --}}
       <!--**********************************
        Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
            ***********************************-->
            {{-- @include('partials.sidebar') --}}

        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <h2>Registration</h2>
    </div>
    <div class="content">
      <!-- Registration form -->
      <form action="{{ route('conf_user.store') }}" method="post">
        @csrf
        <div class="row">
          <!-- Input for Full Name -->
          <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your Username" name="Username" required>
          </div>
          <!-- Input for Username -->
          <div class="col-md-6 mb-3">
            <label for="username" class="form-label">Serrial number</label>
            <input type="text" class="form-control" id="username" placeholder="Enter your Serrial number" name="Serial_number" required>
            @if (session('error'))
           <span> {{ session('error') }}</span>

    </div>
@endif
          </div>





          <!-- Input for Password -->


        </div>

        <!-- Gender selection -->


        <!-- Submit button -->
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>


  <!-- إضافة Bootstrap JS و Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

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
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>
