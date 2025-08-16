<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Page</title>
    <!-- تضمين Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header class="bg-dark text-white py-3 text-center">
        <div class="container">
            <h1 class="mb-3">My Website</h1>
            <nav>
                <a href="#home" class="text-white text-decoration-none mx-2">Home</a>
                <a href="#about" class="text-white text-decoration-none mx-2">About</a>
                <a href="#services" class="text-white text-decoration-none mx-2">Services</a>
                <a href="#contact" class="text-white text-decoration-none mx-2">Contact</a>
            </nav>
        </div>
    </header>



    <!-- Banner -->


    <!-- Main Content -->
    <section class="container my-5" id="home">
        <h3 class="text-center mb-4">Data Table for user</h3>
        <!-- Bootstrap Table -->
        <table class="table table-bordered table-hover">
            <div>



            </div>
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>email</th>
                    {{-- <th>is_twoilo</th> --}}
                    {{-- <th>twoilo_code</th> --}}
                    {{-- <th>is_valid</th> --}}
                    <th>whatsAppNumber</th>
                    {{-- <th>whatsAppToken</th> --}}
                    <th>whatsAppTo</th>
                    <th>EmailNumber</th>
                    {{-- <th>EmailToken</th> --}}
                    <th>EmailTo</th>
                    <th>smsNumber</th>
                    {{-- <th>smsToken</th> --}}
                    <th>smsTo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- <td>{{ $user->is_twoilo }}</td> --}}
                        {{-- <td>{{ $user->twoilo_code }}</td> --}}
                        {{-- <td>{{ $user->is_valid }}</td> --}}
                        <td>{{ $user->whatsAppNumber }}</td>
                        {{-- <td>{{ $user->whatsAppToken }}</td> --}}
                        <td>{{ $user->whatsAppTo }}</td>
                        <td>{{ $user->EmailNumber }}</td>
                        {{-- <td>{{ $user->EmailToken }}</td> --}}
                        <td>{{ $user->EmailTo }}</td>
                        <td>{{ $user->smsNumber }}</td>
                        {{-- <td>{{ $user->smsToken }}</td> --}}
                        <td>{{ $user->smsTo }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </section>

    <!-- Features -->


    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 My Website | All Rights Reserved</p>
        <p>
            Follow us:
            <a href="#" class="text-white text-decoration-none mx-2">Facebook</a>
            <a href="#" class="text-white text-decoration-none mx-2">Twitter</a>
            <a href="#" class="text-white text-decoration-none mx-2">Instagram</a>
        </p>
    </footer>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
