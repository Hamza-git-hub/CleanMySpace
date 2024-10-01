<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('image/logos.png') }}">
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
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            color: #008080;
        }

        form {
            background-color: #d4ffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Registration Form</h1>
        <hr>
        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
        <form action="{{ route('registration-user') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{ old('firstname') }}">
                <span class="text-danger">@error('firstname'){{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}">
                <span class="text-danger">@error('lastname'){{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="profile_photo">
                <span class="text-danger">@error('profile_photo'){{ $message }} @enderror</span>
            </div>
            <button class="btn btn-primary" type="submit">Register</button>
            <br>
            <p class="mt-3">Already registered? <a href="login">Login here</a></p>
        </form>
    </div>
</body>
</html>
