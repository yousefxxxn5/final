<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        h1 {
            color: #4CAF50;
        }
        /* تنسيق الزر */
        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <p>We are glad to have you here.</p>

    <!-- رابط على شكل زر -->
    <a href="{{ route('data.index') }}" class="button">Go to Dashboard</a>
</body>
</html>
