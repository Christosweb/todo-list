<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>login</title>
</head>
<body class="bg-dark text-white">
    <form class="bg-white w-25 mx-auto d-flex flex-column mt-5 text-black" action="{{ route('login.show') }}" method="post">
        @csrf
        <div class="text-danger ">{{ $errors }}</div>
        <div class="">
            <label for="email">email</label>
            <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}">
            <small class="text-danger">{{$errors->first('email')}}</small>
        </div>
        <br>
        <div class="">
            <label for="password">password</label>
            <input class="form-control" type="password" name="password" id="password" value="{{old('password')}}">
            <small class="text-danger">{{$errors->first('password')}}</small>
        </div>
        <br>
        <div class="">
            
            <input class="" type="checkbox" name="remember" id="remember" value="1">
            <label for="password">remember me</label>
            
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="login">
    </form>
</body>
</html>