<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>password reset</title>
</head>
<body class="">
    
    <main class="form-signin w-100 m-auto ">
  <form class="d-flex flex-column justify-center m-5" action="{{ route('password.update') }}" method="POST">
  @csrf
  
  
    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="email">
      <label for="floatingInput">Email address</label>
      <small class="text-danger">{{$errors->first('email')}}</small>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="Password" name="password"  value="{{old('password')}}" placeholder="Password">
      <label for="floatingPassword">Password</label>
      <small class="text-danger">{{$errors->first('password')}}</small>
    </div>
    <div class="form-floating mb-3 ">
      <input type="password" class="form-control" id="Password_confirmation" name="password_confirmation"  value="{{old('password_confirmation')}}" placeholder="confirm password">
      <label for="confirm password">confirm password</label>
      <small class="text-danger">{{$errors->first('password_confirmation')}}</small>
    </div>
    
    <input type="hidden" name="token" value="{{ $token }}">
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">reset</button>
    
  </form>
</main>

</body>
</html>