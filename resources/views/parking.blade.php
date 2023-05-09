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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <!-- Styles -->
    <style>
        body {
            background: rgb(0, 0, 0);
            background-image: linear-gradient(45deg, hsl(0deg, 43%, 10%) 0%, hsl(3deg, 56%, 14%) 20%, hsl(3deg, 64%, 17%) 40%, hsl(2deg, 70%, 21%) 60%, hsl(1deg, 75%, 24%) 80%, hsl(0deg, 79%, 28%) 100%);         
        }

        nav {
            background-color: #333333;
        }
    </style>
</head>
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
            <a href="#" class="nav-item nav-link text-light"
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
                            <a href="{{ url('/dashboard') }}" class="nav-item nav-link text-light">Profil</a>
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

    <!-- Continut -->
    <div class="container continut">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <div>
                    <img src="{{ URL('parcare.jpg') }}" class="img-fluid" alt="zone">
                </div>
                <div class="container-fluid">
                    <div class="col-11 parcareArea">
                            <form>
                            <div class="form-group">
                                <label class="text-light" for="exampleFormControlSelect1">Alege zona orasului</label>
                                <select
                                class="form-control selectZone"
                                id="exampleFormControlSelect1"
                                >
                                <option value="1">Zona 0</option>
                                <option value="2">Zona 1</option>
                                <option value="3">Zona 2</option>
                                </select>
                            </div>
                            </form>
                        <div class="col">
                            <form>
                            <div class="form-group">
                                <label class="text-light" for="exampleFormControlSelect1">Alege durata</label>
                                <select
                                class="form-control selectTime"
                                id="exampleFormControlSelect1"
                                >
                                <option value="1">O ora</option>
                                <option value="2">O zi</option>
                                <option value="3">O saptamana</option>
                                <option value="4">O luna</option>
                                <option value="5">Un semestru</option>
                                <option value="6">Un an</option>
                                </select>
                            </div>
                            </form>
                        </div>
                        <div class="col pt-4 ps-0">
                            <button class="btn btn-danger buton1">Click</button>
                            <span class="text-light">Ai de plata:</span>
                            <span class="pretFinal text-light">0</span>
                        </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Footer -->

<footer class="bg-dark text-center text-white mt-4">
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
    <a class="text-white" href="index.html">www.dictionarul-de-masini.ro</a>
    </div>
        
    </body>
</html>

<script>
$(document).ready(function () {
    $("body").css("background-color", "azure");
    $("h1").click(function () {
    $(this).hide(); 
});

$(".buton1").click(function () {


    const arrayTabel = [
    [1, 1, 2, 3],
    [1, 10, 5, 2.5],
    [2, 75, 38, 15],
    [3, 300, 150, 60],
    [4, 1050, 525, 210],
    [5, 5250, 2625, 1050],
    [6, 9450, 4725, 1890],
    ];

    const arrayTime = [
    [0, "nimic"],
    [1, "O ora"],
    [2, "O zi"],
    [3, "O saptamana"],
    [4, "O luna"],
    [5, "Un semestru"],
    [6, "Un an"]
    ]
    const arrayZone = [
    [0, "nimic"],
    [1, "Zona 0"],
    [2, "Zona 1"],
    [3, "Zona 2"]
    ]



    let indexZona = parseInt($(".selectZone option:selected").val());
    let indexTimp = parseInt($(".selectTime option:selected").val());

    
    $(".pretFinal").text(arrayTabel[indexTimp][indexZona]);

    return arrayTabel[indexTimp][indexZona];
})
});
</script>

<style>
    .continut {
        margin-top: 10%;
        margin-bottom: 20%;
    }
</style>