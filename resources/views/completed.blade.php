<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>completed Tasks</title>
</head>

<body>


    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow p-4">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">TO DO APP</a>
        <div class="d-flex flex-column">
            <a class="text-light text-decoration-none" href="{{ route('user_profile.getUser') }}">PROFILE</a>
            <a class="text-light text-decoration-none" href="{{ route('logOut') }}">Log out</a>
        </div>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </header>

    <div class="container-fluid">
                         <!-- modal -->
 <div class="modal"  id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="status"></h5>
      </div>
      <div class="modal-body">
        <p class="text-capitalize"  id="message"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  id="delete">YES</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">No</button>
      </div>
    </div>
  </div>
</div>
         <!-- modal end -->
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <!-- < class="position-sticky pt-3 sidebar-sticky"> -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all_tasks.find')}}">
                            <span data-feather="file" class="align-text-bottom"></span>
                            All
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('active_tasks.active')}}">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Active
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{request()->is('complete') ? 'link-dark':'link-primary'}}"
                            href="{{ route('completed_tasks.complete') }}">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Completed
                        </a>
                    </li>
                </ul>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
                @foreach ($completedTasks as $completedTask)
                <div class="card bg-info mt-3">
                    <div class="card-body">
                        <div class="wrapper d-flex">
                            <input class="form-check-input me-2" type="checkbox" name="checkbox" id="checkbox"
                                value="{{$completedTask->id}}" {{'checked'}}>
                            <p class="me-auto text-capitalize">{{$completedTask->todo}}</p>
                            <button class="btn btn-warning me-2 edit"><a class="link-dark text-decoration-none"
                                    href="{{route('edit_tasks.getEdit', $completedTask->id)}}">Edit</a></button>
                            <button class="btn btn-danger delete"
                                data-delete="{{route('delete', $completedTask->id)}}">Delete</button>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="float-end">{{ $completedTasks->links() }}</div>
            </main>
        </div>
    </div>
    <script src="{{ asset('vendor/bootstrap/js/custom.js') }}"></script>
</body>

</html>