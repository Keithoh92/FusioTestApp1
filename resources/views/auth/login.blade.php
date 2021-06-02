<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./../fusio.css">
    <title>Title</title>
</head>
<body>
<div class="header">
    <h1>Login</h1>
</div>
<div class="mynav">
    <nav class="navbar navbar-dark bg-dark">
        <ul class="navbar-nav flex-wrap">
            <!--            <li class="nav-item">-->
            <!--                <span class="navbar-toggler-icon"></span>-->
            <!--            </li>-->
            <!--            <span class="navbar-toggler-icon"></span>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>Navbar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Login</a>
                    <a class="dropdown-item" href="#">Register</a>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </li>
            <li class="nav-item text-white">
                <span class="dots">...</span>
            </li>

        </ul>


    </nav>
</div>
<div class="register-form">
<form action="{{ route('auth.check') }}" method="post">
    @if(\Illuminate\Support\Facades\Session::get('fail'))
        <div class="alert alert-danger">
            {{\Illuminate\Support\Facades\Session::get('fail')}}
        </div>
    @endif
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <span class="text-danger">@error('email'){{ "$message" }} @enderror</span>
    <div class="form-group">
        <label for="exampleFormControlInput2">Password</label>
        <input type="password" class="form-control" name="password" id="exampleFormControlInput2" placeholder="*******">
    </div>
    <span class="text-danger">@error('password'){{ "Password must be minimum of 8 characters, have at least 1 uppercase and at least 1 number OR 1 symbol" }} @enderror</span>

    <button type="submit" class="btn btn-primary mb-2">Login</button>
    <a href="{{ route('auth.register') }}" id="register">Create an Account now</a>

</form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>

