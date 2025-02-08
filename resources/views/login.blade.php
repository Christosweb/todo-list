<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>login</title>
</head>
<body class="">
    
   <div>{{session('status')? session('status'): null}}</div>

    <main class="form-signin w-100 m-auto ">
  <form class="d-flex flex-column justify-center m-5" action="{{ route('login.show') }}" method="post">
  @csrf
  
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="{{ session('error') ?'d-flex text-danger' : 'd-none'}} ">{{ session('error')}}</div>
  
    <div class="form-floating mb-3">
      <input type="email"
       class="form-control"
        name="email" 
        id="email"
        value="{{ $errors->any() ? old('email'):null}}" 
        placeholder="email"
        >
      <label for="floatingInput">Email address</label>
      <small class="text-danger">{{$errors->first('email')}}</small>
    </div>
    <div class="form-floating ">
      <input type="password" class="form-control" id="Password" name="password"  value="{{ $errors->any() ? old('password'):null}}" placeholder="Password">
      <label for="floatingPassword">Password</label>
      <small class="text-danger">{{$errors->first('password')}}</small>
    </div>

    <div class="checkbox mb-3">
      <label>
      <input class="" type="checkbox" name="remember" id="remember" value="1"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <a href="{{route('registration.create')}}">Don't have an account yet? sign up</a>
    <a href="{{route('password.request')}}">forgot password?</a>
  </form>

</main>

</body>
</html>