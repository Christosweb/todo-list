
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>register</title>
</head>
<body class="">
    
    <main class="form-signin w-100 m-auto ">
  <form class="d-flex flex-column justify-center m-5" action="{{ route('registration.store') }}" method="post">
  @csrf
  
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="{{ session('error') ?'d-flex text-danger' : 'd-none'}} ">{{ session('error')}}</div>
  
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="firstname" id="firstname" value="{{ old('firstname')}}" placeholder="firstname">
      <label for="firstname">First Name</label>
      <small class="text-danger">{{$errors->first('firstname')}}</small>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname')}}" placeholder="lastname">
      <label for="lastname">Last Name</label>
      <small class="text-danger">{{$errors->first('lastname')}}</small>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="email" id="email" value="{{ old('email')}}" placeholder="email">
      <label for="email">Email address</label>
      <small class="text-danger">{{$errors->first('email')}}</small>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" name="phone" id="phone" value="{{ old('phone')}}" placeholder="phone">
      <label for="phone">Phone</label>
      <small class="text-danger">{{$errors->first('phone')}}</small>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" name="age" id="age" value="{{ old('age')}}" placeholder="age">
      <label for="age">Age</label>
      <small class="text-danger">{{$errors->first('age')}}</small>
    </div>
    <div class="form-floating ">
      <input type="password" class="form-control" id="Password" name="password"  value="{{old('password')}}" placeholder="Password">
      <label for="Password">Password</label>
      <small class="text-danger">{{$errors->first('password')}}</small>
    </div>

    <div class="checkbox mb-3">
      <label>
      <input class="" type="checkbox" name="remember" id="remember" value="1"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">sign up</button>
    
  </form>
</main>
</body>
</html>