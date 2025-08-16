<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <!-- Title section -->
        <div class="title">Registration</div>
        <div class="content">
            <!-- Registration form -->
            {{-- <form action="{{ route('twoilio_setting.update',  Auth::id()) }}" method="get" >
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">enter code </span>
                        <input type="text" placeholder="7899465356565565" name="valid" required>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="login">
                </div>
            </form> --}}

            <form action="{{ route('twoilio_setting.update', Auth::id()) }}" method="get">

                <div class="user-details">

                    <div class="input-box">
                        <span class="details">enter code </span>
                        <input type="text" placeholder="787845" name="code" required>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="login">
                </div>
                <div class="button">
                    <input type="submit" value="skep">
                </div>
            </form>



        </div>
    </div>
</body>

</html>
