<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dictionarul de masini</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="icon" href="/logo.png">

        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Styles -->
        <style>
            body {
                background: rgb(0, 0, 0);
                background-image: linear-gradient(45deg, hsl(0deg, 43%, 10%) 0%, hsl(3deg, 56%, 14%) 20%, hsl(3deg, 64%, 17%) 40%, hsl(2deg, 70%, 21%) 60%, hsl(1deg, 75%, 24%) 80%, hsl(0deg, 79%, 28%) 100%);         
            }

            nav, footer {
                background-color: #333333;
            }
        </style>
    </head>
    <body class="antialiased">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-light m-4">
          <div class="container-fluid">
              <a href="/" class="navbar-brand">
                  <img src="/logo.png" height="50" alt="Dictionarul-de-masini" />
              </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <a href="/parcare" class="nav-item nav-link text-light"
                  >Calculator parcare Bucuresti</a>
                  <a href="/shop" class="nav-item nav-link text-light"
                      >Magazin</a>
              </ul>
              @if (Route::has('login'))
                
                    @auth
                        <a href="{{ url('/setari-profil') }}" class="nav-item nav-link text-light">Profil</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-item nav-link text-light">Login</a>
  
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-item nav-link text-light">Register</a>
                        @endif
                    @endauth
              @endif
            </div>
          </div>
        </nav>

    <!-- Despre model -->
    <div class="container navLogo" style="margin-top: 4%; margin-bottom: 2%;">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-light  text-light">
            <div class="container-fluid pt-3">
                <p>
                  @php
                  $aboutBrand = $models->first()->about_brand;
                  @endphp
                  {{$aboutBrand}}
                </p>
            </div>
          </nav>
        </div>
    </div>
    <br>

    <!-- Continut -->

    <div class="container modelsBlock navLogo">
      <div class="row justify-content-center">
        <nav class="navbar navbar-expand-lg navbar-light" style="width:100%">
          @if (count($models) > 2)
            @for ($i = 0; $i < count($models); $i += 2)
              <div class="col-xl-6 pt-3 coloana text-center d-flex flex-column align-items-center">
                @for ($j = $i; $j < min($i + 2, count($models)); $j++)
                  <a href="{{$models[$j]->brand_id}}/{{$models[$j]->id}}" style="color:white;">
                    <img src="{{URL($models[$j]->image)}}" alt="{{$models[$j]->model}}" class="img-fluid pt-5 models_img">
                    <br>
                    <span>{{$models[$j]->model}}</span>
                  </a>
                @endfor
              </div>
            @endfor
          @elseif (count($models) == 2)
            <div class="col-xl-6 pt-3 coloana text-center d-flex flex-column align-items-center">
              <a href="{{$models[0]->brand_id}}/{{$models[0]->id}}" style="color:white;">
                <img src="{{URL($models[0]->image)}}" alt="{{$models[0]->model}}" class="img-fluid pt-5 models_img">
                <br>
                <span>{{$models[0]->model}}</span>
              </a>
            </div>
            <div class="col-xl-6 pt-3 coloana text-center d-flex flex-column align-items-center">
              <a href="{{$models[1]->brand_id}}/{{$models[1]->id}}" style="color:white;">
                <img src="{{URL($models[1]->image)}}" alt="{{$models[1]->model}}" class="img-fluid pt-5 models_img">
                <br>
                <span>{{$models[1]->model}}</span>
              </a>
            </div>
          @else
            <div class="col-12 pt-3 coloana text-center d-flex flex-column align-items-center">
              @foreach ($models as $model)
                <a href="{{$model->brand_id}}/{{$model->id}}" style="color:white;">
                  <img src="{{URL($model->image)}}" alt="{{$model->model}}" class="img-fluid pt-5 models_img">
                  <br>
                  <span>{{$model->model}}</span>
                </a>
              @endforeach
            </div>
          @endif
        </nav>
      </div>
    </div>

    
<!-- Footer -->

<footer class=" text-center text-white m-4">
<!-- Grid container -->
<div class="container p-4">
  <!-- Section: Form -->
  <section class="">
    <form action="">
      <!--Grid row-->
      <div class="row d-flex justify-content-center">
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-5 col-12">
          <!-- Sugestii -->
          <p>
            Am omis/gresit ceva? Vrei sa adaugi date noi despre modelele noi sau cele existente? Vrei sa ne impartasesti o idee? Nu ezita sa ne contactezi la adresa de mail : <span style="color:wheat">dictionarul-de-masini@gmail.com</span>
          </p>
          <hr>
        </div>
      </div>
      <!--Grid row-->
    </form>
  </section>
  <!-- Section: Text -->
  <section class="mb-4">
    <p>
      <span style="color: red;">Disclaimer!!</span> Problemele prezentate pe acest site nu se manifesta 100% la toate masinile, acestea sunt date despre problemele / erorile de proiectare preluate de pe diferite forumuri. Echipa Dictionarul de Masini nu isi asuma responsabilitatea pentru eventualele tepe, neintelegeri, dvs. fiind nevoit sa verificati masina inainte de achizitionare.
    </p>
  </section>
  <!-- Section: Text -->

  <!-- Section: Links -->
  <section class="">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Link-uri</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-white">Termeni si condtii</a>
          </li>
          <li>
            <a href="#!" class="text-white">Politica reclamelor</a>
          </li>
          <li>
            <a href="#!" class="text-white">Politica datelor cu caracter personal</a>
          </li>
          <li>
            <a href="#!" class="text-white">Despre acest proiect</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

     
    </div>
    <!--Grid row-->
  </section>
  <!-- Section: Links -->
</div>
<!-- Grid container -->

<!-- Copyright -->
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  © 2022 Copyright:
  <a class="text-white" href="/">www.dictionarul-de-masini.ro</a>
</div>

</body>
</html>

<style>
  nav, footer {
            background-color: #343A40;
  }

  .models_img{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 90%;
  }

  .modelsBlock {
    margin-top: 1%;
    margin-bottom: 5%;
  }

  @media (max-width: 767px) {
        .navLogo {
            width: 90%;
        }
    }
</style>