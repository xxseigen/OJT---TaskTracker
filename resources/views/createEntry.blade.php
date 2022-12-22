<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Task Tracker</title>
</head>
<body>

     <!--NAVBAR-->
     <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 ">
        <div class="container logo col-5-md">
                <a href="#" class="navbar-brand">
                    <img src="/assets/img/logott.png" alt="" width="30%">
                </a>
          <a class="navbar-brand" href="{{ route('task.index')}}" >Home</a>
          <a class="navbar-brand" href="{{ route('about.index')}}" >About</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>

      
    
      <!--Content-->
    <section class="p-5">
        <div class="container">
            <h1 class="text-center font1">
                Add Task
            </h1>
            @include('message')
            <form class="form-section" method="POST" action="{{route('task.store')}}">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Task Title</label>
                  <input class="form-control" type="text" placeholder="Example: Weekly Report" aria-label="default input example" name="task_title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" type="text" placeholder="" aria-label="default input example" rows="5" name="description"></textarea>
                  </div>

                  <div class="mb-3">
                    <label for="status" class="form-label" >Status</label>
                    <select name="status" id="status" class="form-control" name="status">
                        @foreach ($statuses as $status)
                            <option value="{{$status['value']}}">{{$status['label']}}</option>
                        @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary m-3 float-end">Submit</button>
              </form>

        </div>
    </section>

</body>
</html>



