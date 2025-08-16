<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Telegram Bot Registration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa; /* لون خلفية خفيف */
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
    @livewireStyles
</head>
<body>

<div class="container">
    
    <div class="form-container">
        <h2 class="text-center mb-4">Registration </h2>
        <livewire:user-registration-form :id="$user_id" :number_test="$number_test" />

    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
@livewireScripts
</body>
</html>










{{-- <form action="{{ route('conf_user.update', $user_id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <!-- Input for Full Name -->
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name"
                name="name" required>
        </div>

        <!-- Input for Username -->


        <!-- Input for Email -->
        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email"
                name="email" required>
        </div>

        <!-- Input for Phone Number -->
        <div class="col-md-6 mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" placeholder="Enter your number"
                name="phone" required>
        </div>

        <!-- Input for Password -->
        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password"
                name="password" required>
        </div>

    </div>

    <!-- Gender selection -->
    <div class="mb-3">
        <label class="form-label">يرجى التسجيل </label><br>

    </div>

    <!-- Submit button -->
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form> --}}
