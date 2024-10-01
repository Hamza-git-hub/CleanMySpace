<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ ('image/logos.png') }}">
    <style>
        body {
            background-image: url('image/cleaner2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            max-width: 400px;
            background-color: #d4ffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative; /* Changed from absolute to relative */
            z-index: 1; /* To keep it above the loader */
        }

        h1 {
            text-align: center;
            color: #008080;
        }

        form {
            margin-top: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #008080;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #008080;
            border-radius: 5px;
        }

        .alert {
            margin-top: 10px;
        }

        .btn-primary {
            width: 100%;
        }

        /* Loader Styles */
        .loader {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            display: none; /* Hide it by default */
            z-index: 1000; /* Ensure it's above other elements */
        }

        .loader span {
            display: block;
            width: 15px;
            height: 15px;
            margin: 5px;
            border-radius: 50%;
            background: #008080; /* Primary color */
            animation: blink 0.8s infinite alternate;
        }

        .loader span:nth-child(1) {
            animation-delay: 0s;
        }

        .loader span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .loader span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes blink {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(1.5);
                opacity: 0.7;
            }
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h1>Login</h1>
        <form action="{{ route('login-user') }}" method="post" onsubmit="showLoader()">
            @csrf

            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif

            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>

            <p class="mb-3">New User? <a href="registration">Register Here</a></p>
        </form>
    </div>

    <!-- Loader HTML -->
    <div class="loader" id="loader">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <script>
        function showLoader() {
            document.getElementById('loader').style.display = 'block'; // Show the loader
        }
    </script>
</body>

</html>
