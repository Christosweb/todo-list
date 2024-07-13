<!-- @if(session()->has('success'))
  <p>
    {{session()->get('success')}}
  </p> 
@endif
--> 
<!-- @if ($errors->any())
     <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
     </ul>

@endif -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>register</title>
</head>
<body class="bg-dark text-white">
    <form class="bg-white w-25 mx-auto d-flex flex-column mt-5 text-black" action="{{ route('registration.store') }}" method="post">
        @csrf
        <div class="">
            <label for="firstname">firstname</label>
            <input class="form-control" type="text" name="firstname" id="firstname" value="{{old('firstname')}}">
            <small class="text-danger">{{$errors->first('firstname')}}</small>
        </div>
        <br>
        <div class="">
            <label for="lastname">lastname</label>
            <input class="form-control" type="text" name="lastname" id="lastname" value="{{old('lastname')}}">
            <small class="text-danger">{{$errors->first('lastname')}}</small>
        </div>
        <br>
        <div class="">
            <label for="email">email</label>
            <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}">
            <small class="text-danger">{{$errors->first('email')}}</small>
        </div>
        <br>
        <div class="">
            <label for="phone">phone</label>
            <input class="form-control" type="number" name="phone" id="phone" value="{{old('phone')}}">
            <small class="text-danger">{{$errors->first('phone')}}</small>
        </div>
        <br>
        <div class="">
            <label for="age">age</label>
            <input class="form-control" type="number" name="age" id="age" value="{{old('age')}}">
            <small class="text-danger">{{$errors->first('age')}}</small>
        </div>
        <br>
        <div class="">
            <label for="password">password</label>
            <input class="form-control" type="password" name="password" id="password" value="{{old('password')}}">
            <small class="text-danger">{{$errors->first('password')}}</small>
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="Register">
    </form>
</body>
</html>