<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>dashboard</title>
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow p-4 d-flex">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 me-auto" href="#">TO DO APP</a>
        <a class="text-light text-decoration-none" href="{{ route('user_profile.getUser') }}">PROFILE</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <div class="container-fluid">
        <div class="row">
                     <div>
                        <p>{{session('status')? session('status'):null}}</p>
                     </div>
                <main class="form-signin w-75 m-auto">
                    <form class="d-flex flex-column" method="post" action="{{route('user_profile_edit', [$user->id])}}">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal">Profile</h1>

                        <div class="form-control mb-3">
                            <label class="text-capitalize" for="firstname">first name</label>
                            <input type="text" class="form-control" name="firstname" id="floatingInput" value="{{ $user->firstname }}" placeholder="">
                        </div>
                        <div class="form-control mb-3">
                        <label class="text-capitalize" for="lasttname">last name</label>
                            <input type="text" class="form-control" name="lastname" id="floatingPassword" value="{{ $user->lastname }}" placeholder="">
                        </div>
                        <div class="form-control mb-3">
                        <label class="text-capitalize" for="email">email</label>
                            <input type="email" class="form-control" name="email" id="floatingPassword" value="{{ $user->email }}" placeholder="">
                        </div>
                        <div class="form-control mb-3">
                        <label class="text-capitalize" for="age">age</label>
                            <input type="number" class="form-control"  name="age" id="floatingPassword" value="{{ $user->age }}" placeholder="">
                        </div>
                        <div class="form-control mb-3">
                        <label class="text-capitalize" for="phone">phone</label>
                            <input type="number" class="form-control"  name="phone" id="floatingPassword" value="{{ $user->phone }}" placeholder="">
                        </div>

                        <button class="btn btn-lg btn-primary align-self-end" type="submit" data-edit-profile="{{route('user_profile_edit', [$user->id])}}">Edit</button>
                        
                    </form>
                    <hr>

                    <form class="d-flex flex-column" method="post" action="{{route('reset_password', [$user->id])}}">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal">Reset/Change Password</h1>

                        <div class="form-control mb-3">
                        <label class="text-capitalize" for="email">email</label>
                            <input type="email" class="form-control" name="email" id="floatingPassword" value="{{ $user->email }}" placeholder="">
                        </div>
                        <div class="form-control mb-3">
                        <label class="text-capitalize" for="password">password</label>
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder=" enter new password...">
                        </div>
                
                        <button class="btn btn-lg btn-primary align-self-end" type="submit" data-edit-profile="{{route('reset_password', [$user->id])}}">Rset Password</button>
                        
                    </form>
                </main>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/custom.js') }}"></script>
</body>

</html>