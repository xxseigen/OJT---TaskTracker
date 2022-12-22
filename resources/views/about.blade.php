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
                <a href="{{ route('task.index')}}" class="navbar-brand">
                    <img src="/assets/img/logott.png" alt="" width="30%">
                </a>
          <a class="navbar-brand" href="{{ route('task.index')}}" >Home</a>
          <a class="navbar-brand" href="#" >Archive</a>
          <a class="navbar-brand" href="{{ route('about.index')}}" >About</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>

    <section class="p-5">
        <img src="/assets/img/jdi1.png" alt="banner" width="100%" class="img-fluid">
        <div class="container">
            <h1 class="text-center p-3">
                About Us
            </h1>
            <div class="content-sec ms-5">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia est obcaecati neque sequi, eligendi ut officiis corrupti molestias odio minus nesciunt minima eius eum rem dicta in tenetur qui labore!</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia est obcaecati neque sequi, eligendi ut officiis corrupti molestias odio minus nesciunt minima eius eum rem dicta in tenetur qui labore!</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia est obcaecati neque sequi, eligendi ut officiis corrupti molestias odio minus nesciunt minima eius eum rem dicta in tenetur qui labore!</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia est obcaecati neque sequi, eligendi ut officiis corrupti molestias odio minus nesciunt minima eius eum rem dicta in tenetur qui labore!</p>
            </div>

        </div>
    </section>

    <!--Footer-->
    <section
    class="d-flex justify-content-between p-2"
    style="background-color:aliceblue">
    </section>
    <section class="text-center text-lg-start color1" style="background-color:aliceblue">
    <div class="container">
    <div class="d-lg-flex align-items-center justify-content-between">
    <div class="col-lg-5 p-5">
    <span><img id="logo"src="/assets/img/logott.png" width="25%"></span></a>
    <p class="text-color1 ml-3">Cagayan de Oro <br>
    Misamis Oriental, Philippines 9000</p>
    </div>

    </section>



</body>
</html>



