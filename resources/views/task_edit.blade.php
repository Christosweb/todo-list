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
  

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow p-4">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search"> -->
    <!-- <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Sign out</a>
      </div>
    </div> -->
  </header>
  
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" >
        <!-- < class="position-sticky pt-3 sidebar-sticky"> -->
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active {{request()->is('dashboard') ? 'link-dark':'link-primary'}}" href="{{ route('dashboard') }}">
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
              <a class="nav-link " href="{{ route('active_tasks.active')}}">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                Active
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('completed_tasks.complete')}}">
                <span data-feather="users" class="align-text-bottom"></span>
                Completed
              </a>
            </li>
          </ul> 
      </nav>
  
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">

        <!-- modal -->
 <div class="modal bg-light" tabindex="-1" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="status"></h5>
      </div>
      <div class="modal-body">
        <p class="text-capitalize"  id="message"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
      </div>
    </div>
  </div>
</div>
         <!-- modal end -->

        <div class="mt-5 w-75">
          <div class="card bg-black text-ight">
            <div class="card-title text-white text-center">task to do</div>
            <div class="card-body">
              <form action="{{route('update.update', $task->id)}}" method="POST" id="update-form">
                @csrf
                @method('PATCH')

              <input class="form-control"
               type="text" 
               name="task"
               id="task"
               placeholder="Enter to do here..." 
               value="{{$task->todo}}"
               data-update="{{$task->id}}">
              </form>
            </div>
            <div class="card-footer">
              <input class="btn btn-primary" type="submit" value="UPDATE" id="update" form="update-form" data-edit="{{route('update.update', $task->id)}}">
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  
<script src="{{ asset('vendor/bootstrap/js/custom.js') }}"></script>

</body>
</html>