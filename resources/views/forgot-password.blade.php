<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>forgot password</title>
</head>
<body>
<main class="form-signin w-100 m-auto ">
  <form class="d-flex flex-column justify-center m-5" action="{{ route('password.email') }}" method="post">
  @csrf
  
    <div>{{ session('status')? session('status'):null }}</div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="email" id="email" value="{{ old('email')}}" placeholder="email">
      <label for="floatingInput">Email address</label>
      <small class="text-danger">{{$errors->first('email')}}</small>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">reset password</button>
    
  </form>
</main>
</body>
</html>