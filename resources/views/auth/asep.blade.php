<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="w-50 center border rounded px-3 py-3 mx-auto">
    <h1>Login</h1>
    <form action="/alumni/login" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button name="submit" type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
</body>
</html>
 -->

 <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AlumniLink Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="asset{{('css/login.css')}}">
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login-box">
        <h2>AlumniLink Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="user-box">
                <input type="text" name="email" required value="{{ old('email') }}" autofocus>
                <label>Email</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password" required>
                <label>Password</label>
                <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="user-box">
                <select name="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="alumni">Alumni</option>
                    <option value="company">Company</option>
                    <option value="admin">Admin</option>
                </select>
                <label>Role</label>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="submit-btn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Login
            </button>
        </form>
    </div>
</div>
@endsection
    <script src="asset{{('js/login.js')}}"></script>
</body>
</html> -->

<!-- resources/views/auth/asep.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

@extends ('layouts.app')
    <div class="container">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
