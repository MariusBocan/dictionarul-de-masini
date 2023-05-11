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
        <div class="m-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <div class="container-fluid">
                <a href="/" class="navbar-brand">
                    <img src="/logo.png" height="50" alt="Dictionarul-de-masini" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a href="/parcare" class="nav-item nav-link text-light"
                        >Calculator parcare Bucuresti</a
                    >
                    <a href="#" class="nav-item nav-link text-light"
                        >Dictionar piese auto</a
                    >
                    <a href="/shop" class="nav-item nav-link text-light"
                        >Magazin</a
                    >
                    </div>
                    <div class="navbar-nav text-right ml-sm-auto">
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
        </div>
    <!-- Despre model -->
    <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-light bg-dark text-light">
            <div class="container-fluid">
                <p>
                    Alfa Romeo Brera a început să producă în 2005, iar producția s-a terminat în 2010. Este unul dintre modelele de mașini sport Alfa Romeo care este coupe 2+2. Au fost 21786 Brera produse în total. Modelul avea trei motoare diferite în versiunea pentru piața europeană: 2.2 L JTS 183 CP (136 kW) și un V6 de 3.2 L 260 CP (190 kW) și un 2.4 L JTD 200 CP (150 kW) ca motor turbodiesel. În 2008 a fost anunțată versiunea actualizată a lui Brera, unde a fost primită tracțiunea față în versiunea V6 de 3,2 L și, de asemenea, au fost actualizate cu diferențial electronic cu alunecare limitată e-Q2 pentru toate versiunile de Brera. Brera vine cu unul dintre nivelurile de echipare: „Medium” sau „Sky View”.
                </p>
            </div>
          </nav>
        </div>
    </div>
    <br>

    <!-- Carousel -->
    <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-light bg-dark text-light">
            <div class="container">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="10000">
                        <img src="carousel1.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item" data-bs-interval="2000">
                        <img src="carousel2.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="carousel3.jpg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
          </nav>
        </div>
    </div>
    <br>

<!-- Continut -->
<div class="fundal">
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
          <div class="container-fluid">
            <div class="col-x1 pt-3">
          </div>
          <table class="table table-attributes no-pad text-light">
                <thead>
                    <tr>
                        <td class="property">Modification</td>
                        <td class="property">Fuel</td>
                        <td class="property">Year</td>
                        <td class="property">Engine size</td>
                    </tr>
                </thead>
                <tbody>
                  @foreach($engines as $engine)
                    <tr>
                      <td>
                        <a href="#" style="color:green;">{{$engine->engine}}</a>
                      </td>
                      <td>{{$engine->fuel}}</td>
                      <td>{{$engine->year}}</td>
                      <td>{{$engine->engine_size}}</td>
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
        

    <footer class="bg-dark text-center text-white m-4">
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
            <span id="disclaimer">Disclaimer!!</span> Problemele prezentate pe acest site nu se manifesta 100% la toate masinile, acestea sunt date despre problemele / erorile de proiectare preluate de pe diferite forumuri. Echipa Dictionarul de Masini nu isi asuma responsabilitatea pentru eventualele tepe, neintelegeri, dvs. fiind nevoit sa verificati masina inainte de achizitionare.
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