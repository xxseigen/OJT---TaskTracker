<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Task Tracker</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container">
      <div class="row">
        <div class="col-3 ">
          <div class="side">
              <div class="d-flex container mx-auto my-5">
                  <a href="#" class="navbar-brand">
                      <img src="/assets/img/logott.png" alt="Logo" width="100%">
                  </a>
              </div>
              <div class="d-flex sidebarmenu mx-auto">
                  <a class="navbar-brand mt-5 ms-5" href="{{ route('task.index')}}" > 
                      <img src="/assets/img/home.svg" alt="Home" width="30%" class=""> 
                      Home
                  </a>
              </div>
              <div class="d-flex sidebarmenu mx-auto">
                  <a class="navbar-brand mt-5 ms-5" href="#" >
                      <img src="/assets/img/done.svg" alt="Done" width="30%" class=""> 
                      Archive
                  </a>
              </div>
              <div class="d-flex sidebarmenu mx-auto">
                  <a class="navbar-brand mt-5 ms-5" href="{{ route('about.index')}}" >
                      <img src="/assets/img/about.svg" alt="Done" width="30%" class=""> 
                      About
                  </a>
              </div>
          </div>
        </div>
        <div class="col-9 my-5">
          <div class="greeting d-flex mx-auto my-5">
              <h1>GOOD AFTERNOON, User</h1>
              
          </div>
          <hr class="" style="width: 100%; height:2px">
          <div class="taskSection mt-3 mb-3">
              <h3>Tasks</h3>
          </div>
          <div class="container mb-3 ">
            <div class="d-flex float-start mb-3">
              <a class="btn btn-primary" href="{{ route('task.create')}}" role="button">
                  Add Task
              </a>
              
            </div>
            <!--
            <form class="d-flex float-end w-45 me-5 mb-3 col-4" action="{{ route('task.index')}}" method="GET" role="search">
              <div>
              -->
                <!--<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
              <!--
                <input class="form-control me-2" type="search" name="search" placeholder="Search by task title" aria-label="Search">
              </div>
              <button class="btn btn-primary mx-2" type="submit">Search</button>
            </form>
            -->

            <div>
              <div class="mx-auto pull-right">
                  <div class="">
                      <form action="{{ route('task.index') }}" method="POST" role="search">
                          @csrf
                          <div class="input-group">
                              <input type="text" class="form-control mr-2" name="q" placeholder="Search by task title" id="term"> <span class="input-group-btn">
                                <button type="submit" class="ms-2 btn btn-primary">
                                  Search
                                </button>
                              </span>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          </div>
         
          <div class="table-data">
              @include('message')
    
              <table class="table table-striped table-hover">

                  <thead class="table-dark ">
                      <tr>
                      <th scope="col-3">Task Title</th>
                      <th scope="col-5">Description</th>
                      <th scope="col-1">Status</th>
                      <th scope="col-2"></th>
                      </tr>
                  </thead>

                  @foreach ($tasks as $task)
                  <tbody>
                      <tr>
                      <td>{{$task->task_title}}</td>
                      <td>{{$task->description}}</td>
                      <td>
                          @if ($task->status === "Ongoing")
                              <span>Ongoing</span>
                              <form action="{{ route('task.destroy', $task->id)}}" method="post"> 
                                  @csrf
                                  @method('delete')
                                  <a class="btn btn-primary" href="{{ route('task.edit', $task->id)}}" role="button">Edit</a>
                                  <button id="submit" name="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                              </form>

                              @else
                              <span style="background-color: forestgreen;">Done</span>
                                  
                          @endif
                      </td>
                      <td>
                        <!--
                          <form action="{{ route('task.destroy', $task->id)}}" method="post"> 
                                  @csrf
                                  @method('delete')
                                  <a class="btn btn-primary" href="{{ route('task.edit', $task->id)}}" role="button">Edit</a>
                                  <button id="submit" name="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                              </form>
                        -->
                       
                      </td>
                      </tr>
                  </tbody>
                  
                  @endforeach
              </table>
          </div>
        </div>
      </div>
    </div>

  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">


  </div>
  </div>


    <!--
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light py-3 ">
        <div class="container logo col-5-md">
                <a href="#" class="navbar-brand">
                    <img src="/assets/img/logott.png" alt="" width="30%">
                </a>
          <a class="navbar-brand" href="{{ route('task.index')}}" >Home</a>
          <a class="navbar-brand" href="{{ route('about.index')}}" >About</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        -->

          <!--newsearch-->
          <!--
          <div class="container-fluid">
            <form class="d-flex" type="get" action="{{url('/search')}}">
              <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>

      -->

        
        <!--search
        <div class="col-3-md">
          <form action="" class="d-flex">
              <input type="search" class="form-control form-control-ms me-2 text-font1" placeholder="Search" aria-label="Search">
              <button type="button" class="btn btn-light"> <i class="bi bi-search"></i></button>
          </form>
        </div>
        </div>
          <button class="navbar-toggler navbar-light ms-auto" type="button" data-bs-toggle="collapse"
          data-bs-target="#navmenu">
          <span class="navbar-toggler-icon"></span>
          </button>
      </nav>

      </nav>

      -->
      <!--

    <section class="p-5">
        <div class="container">
            <h1 class="text-center  font1">
                Task List
            </h1>
            
            <div class="container-fluid">

              <div class="mb-3 float-end">
                <a class="btn btn-primary" href="{{ route('task.create')}}" role="button">Add Task</a>
              </div>

              <form class="d-flex w-25">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>

              
            </div>
          -->
            <!--
            <div class="table-data">

                @include('message')
              
                    <table class="table table-striped table-hover">

                        <thead class="table-light ">
                            <tr>
                              <th scope="col-3">Task Title</th>
                              <th scope="col-5">Description</th>
                              <th scope="col-1">Status</th>
                              <th scope="col-2"></th>
                            </tr>
                          </thead>

                          @foreach ($tasks as $task)
                          <tbody>
                            <tr>
                              <td>{{$task->task_title}}</td>
                              <td>{{$task->description}}</td>
                              <td>
                                @if ($task->status === "Ongoing")
                                    <span>Ongoing</span>
    
                                    @else
                                    <span>Done</span>
                                        
                                @endif
                              </td>
                              <td>

                                <form action="{{ route('task.destroy', $task->id)}}" method="post"> 
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-primary" href="{{ route('task.edit', $task->id)}}" role="button">Edit</a>
                                    <button id="submit" name="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                              </td>
                            </tr>
                          </tbody>
                        
                        @endforeach
                  </table>
               
            </div>

        </div>
    </section>

  -->



</body>
</html>



