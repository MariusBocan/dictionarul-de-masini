<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Dictionarul de masini</title>
  </head>
  <body
    class="bg-dark"
    style="
      background: rgb(0, 0, 0);
      background-image: linear-gradient(
        45deg,
      hsl(0deg 43% 10%) 0%,
      hsl(3deg 56% 14%) 20%,
      hsl(3deg 64% 17%) 40%,
      hsl(2deg 70% 21%) 60%,
      hsl(1deg 75% 24%) 80%,
      hsl(0deg 79% 28%) 100%)">
    <!-- Header -->
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
                    <a href="#" class="nav-item nav-link text-light"
                        >Dictionar piese auto</a>
                    <a href="/shop" class="nav-item nav-link text-light"
                        >Magazin</a>
                </ul>
                @if (Route::has('login'))
                  
                      @auth
                          <a href="{{ url('/profil') }}" class="nav-item nav-link text-light">Profil</a>
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
          <nav class="navbar navbar-expand-lg navbar-light text-light">
            <div class="container-fluid">
                <p>
                  @php
                  $aboutModel = $engine->first()->about_model;
                  @endphp
                  {{$aboutModel}}
                </p>
            </div>
          </nav>
        </div>
    </div>
    <br>

    <!-- Carousel -->
    <div class="container navLogo">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-light text-light">
            <div class="container">
              <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        @php
                            $carousel1 = $engine->carousel1;
                        @endphp
                        <img src="{{ URL($carousel1) }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        @php
                            $carousel2 = $engine->carousel2;
                        @endphp
                        <img src="{{ URL($carousel2) }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        @php
                            $carousel3 = $engine->carousel3;
                        @endphp
                        <img src="{{ URL($carousel3) }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            
              </div>
            </div>
          </nav>
        </div>
    </div>
    <br>

<!-- Continut -->
<div class="fundal">
    <div class="container">
      <div class="row m-2">
        <nav class="navbar navbar-light">
          <div class="container-fluid">
            <!-- Prima coloana -->
            <div class="col-x1 pt-3">
                <div class="tab1">
                <h3 class="text-light">General Information</h3>
                    <table class="table table-attributes no-pad text-light">
                        <tbody>
                            @foreach ($specs as $spec)
                            <tr>
                                <td class="property">Year</td>
                                <td class="value">{{$spec->year}}</td>
                            </tr>
                            <tr>
                                <td class="property">Brand</td>
                                <td class="value">{{$spec->brand}}</td>
                            </tr>
                            <tr>
                                <td class="property">Model</td>
                                <td class="value">{{$spec->model}}</td>
                            </tr>
                            <tr>
                                <td class="property">Engine</td>
                                <td class="value">{{$spec->engine}}</td>
                            </tr>
                            <tr>
                                <td class="property">Body type</td>
                                <td class="value">{{$spec->body_type}}</td>
                            </tr>
                            <tr>
                                <td class="property">Doors</td>
                                <td class="value">{{$spec->doors}}</td>
                            </tr>
                            <tr>
                                <td class="property">Seats</td>
                                <td class="value">{{$spec->seats}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="text-light">Body features</h3>
                    <table class="table table-attributes no-pad text-light">
                        <tbody>
                            <tr>
                                <td class="property">Lenght</td>
                                <td class="value">{{$spec->lenght}} mm</td>
                            </tr>
                            <tr>
                                <td class="property">Width</td>
                                <td class="value">{{$spec->width}} mm</td>
                            </tr>
                            <tr>
                                <td class="property">Height</td>
                                <td class="value">{{$spec->height}} mm</td>
                            </tr>
                            <tr>
                                <td class="property">Wheelbase</td>
                                <td class="value">{{$spec->wheelbase}} mm</td>
                            </tr>
                            <tr>
                                <td class="property">Weight</td>
                                <td class="value">{{$spec->weight}} kg</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- A doua coloana -->
            <div class="col-x1 pt-3">
                <div class="tab1">
                <h3 class="text-light">Engine Transmission</h3>
                    <table class="table table-attributes no-pad text-light">
                        <tbody>
                            <tr>
                                <td class="property">Engine</td>
                                <td class="value">{{$spec->engine_size}} cm3</td>
                            </tr>
                            <tr>
                                <td class="property">Engine kw</td>
                                <td class="value">{{$spec->engine_kw}} kw</td>
                            </tr>
                            <tr>
                                <td class="property">Engine hp</td>
                                <td class="value">{{$spec->engine_hp}} hp</td>
                            </tr>
                            <tr>
                                <td class="property">Torque</td>
                                <td class="value">{{$spec->torque}} Nm/rpm</td>
                            </tr>
                            <tr>
                                <td class="property">Fuel supply</td>
                                <td class="value">{{$spec->fuel_supply}}</td>
                            </tr>
                            <tr>
                                <td class="property">Cylinders</td>
                                <td class="value">{{$spec->cylinders}}</td>
                            </tr>
                            <tr>
                                <td class="property">Valves in cylinders</td>
                                <td class="value">{{$spec->valves}}</td>
                            </tr>
                            <tr>
                                <td class="property">Gears</td>
                                <td class="value">{{$spec->gears}}</td>
                            </tr>
                            <tr>
                                <td class="property">Fuel capacity</td>
                                <td class="value">{{$spec->fuel_capacity}} liters</td>
                            </tr>
                            <tr>
                                <td class="property">Eco standard</td>
                                <td class="value">Euro {{$spec->eco_standard}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="text-light">Chassis</h3>
                    <table class="table table-attributes no-pad text-light">
                        <tbody>
                            <tr>
                                <td class="property">Tires</td>
                                <td class="value">
                                    @php
                                        $tire_sizes = explode("<br>", $spec->tires);
                                    @endphp
                                    @foreach ($tire_sizes as $tire_size)
                                        <div style="display: block;">{{ $tire_size }}</div>
                                    @endforeach
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- A treia coloana -->
            <div class="col-x1 pt-3">
                <div class="tab1">
                <h3 class="text-light">Running features</h3>
                    <table class="table table-attributes no-pad text-light">
                        <tbody>
                            <tr>
                                <td class="property">Max speed</td>
                                <td class="value">{{$spec->max_speed}} km/h</td>
                            </tr>
                            <tr>
                                <td class="property">Acceleration</td>
                                <td class="value">{{$spec->acceleration}}s</td>
                            </tr>
                            <tr>
                                <td class="property">Fuel cons. -urban</td>
                                <td class="value">{{$spec->fuel_urban}}l/100km</td>
                            </tr>
                            <tr>
                                <td class="property">Fuel cons. -extra urban</td>
                                <td class="value">{{$spec->extra}}l/100km</td>
                            </tr>
                            <tr>
                                <td class="property">Fuel cons. -combined</td>
                                <td class="value">{{$spec->comb}}l/100km</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
          </div>
        </nav>
      </div>
    </div>
</div>


    <!-- Footer -->
        

    <footer class="text-center text-white m-4">
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
            <span id="disclaimer" style="color:red;">Disclaimer!!</span> Problemele prezentate pe acest site nu se manifesta 100% la toate masinile, acestea sunt date despre problemele / erorile de proiectare preluate de pe diferite forumuri. Echipa Dictionarul de Masini nu isi asuma responsabilitatea pentru eventualele tepe, neintelegeri, dvs. fiind nevoit sa verificati masina inainte de achizitionare.
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
    </footer>
</body>
</html>

<style>
    nav, footer {
            background-color: #343A40;
        }

        @media (max-width: 767px) {
        .navLogo {
            width: 90%;
        }
    }

    table {
        margin-left: auto;
        margin-right: auto;
    }
</style>