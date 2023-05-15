<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Magazin') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success" style="text-align:center;">
            {{ session('success') }}
        </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 style="text-align:center; font-size: 35px;">Categorii</h1>
        </div>
            <div class="container mt-100">                       
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-4 col-sm-6">
                            <div class="card mb-30">
                                <a class="card-img-tiles" href="shop/{{$category->category}}" data-abc="true">
                                    <div class="inner">
                                    <div class="main-img"><img src="{{URL($category->path1)}}" alt="{{$category->name}}"></div>
                                    <div class="thumblist">
                                        <img src="{{URL($category->path2)}}" alt="{{$category->name}}">
                                        <img src="{{URL($category->path3)}}" alt="{{$category->name}}">
                                    </div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h4 class="card-title">{{ ucfirst($category->category) }}</h4>
                                <p class="text-muted">Incepand de la {{ $category->starting_price }} RON</p>
                                <a class="btn btn-outline-primary btn-sm" href="shop/{{$category->category}}" data-abc="true">Vezi produsele</a>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>

{{-- Footer --}}
    <footer
            class="text-center text-lg-start text-white"
            style="background-color: #5f5f5f"
            >
      <section
               class="d-flex justify-content-between p-4"
               style="background-color: #2c2c31"
               >
        <div class="me-5">
          <span>Regasiti mai jos link-uri si detalii:</span>
        </div>
      </section>
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <h6 class="text-uppercase fw-bold">www.dictionarul-de-masini.ro</h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: blue; height: 2px"
                  />
              <p>
                Produsele din cadrul magazinul dictionarul-de-masini.ro sunt vandute in parteneriat cu brand-urile prezente. Toate drepturile rezervate.
              </p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <h6 class="text-uppercase fw-bold">Categorii</h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: blue; height: 2px"
                  />
              <p>
                <a href="#!" class="text-white">Jante</a>
              </p>
              <p>
                <a href="#!" class="text-white">Suspensii</a>
              </p>
              <p>
                <a href="#!" class="text-white">Accesorii auto</a>
              </p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <h6 class="text-uppercase fw-bold">Link-uri utile</h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: blue; height: 2px"
                  />
              <p>
                <a href="#!" class="text-white">Termeni si condtii</a>
              </p>
              <p>
                <a href="#!" class="text-white">Politica datelor cu caracter personal</a>
              </p>
              <p>
                <a href="#!" class="text-white">Politica de retur si garantie</a>
              </p>
              <p>
                <a href="#!" class="text-white">Despre acest proiect</a>
              </p>
            </div>
            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <h6 class="text-uppercase fw-bold">Contact</h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: blue; height: 2px"
                  />
              <p><i class="fas fa-home mr-3"></i> Bucuresti, Aleea Florilor, Nr. 12, Sector 3</p>
            <p><i class="fas fa-envelope mr-3"></i> dictionarul-de-masini-magazin@gmail.com</p>
              <p><i class="fas fa-phone mr-3"></i> +40712345678</p>
              <p><i class="fas fa-print mr-3"></i> +40787654321</p>
            </div>
          </div>
        </div>
      </section>
      <div
           class="text-center p-3"
           style="background-color: rgba(0, 0, 0, 0.2)"
           >
        © 2023 Copyright:
        <a class="text-white" href="/"><ul>www.dictionarul-de-masini.ro<ul></a>
      </div>
    </footer>
</x-app-layout>


<style>
    body {
    background-color: #eee
}
    .mt-100{
        margin-top: 100px;
}
    .card {
    border-radius: 7px !important;
    border-color: #e1e7ec;
}

    .mb-30 {
        margin-bottom: 30px !important;
}

    .card-img-tiles {
        display: block;
        border-bottom: 1px solid #e1e7ec;
}

    a {
        color: #0da9ef;
        text-decoration: none !important;
}

    .card-img-tiles>.inner {
        display: table;
        width: 100%;
}

    .card-img-tiles .main-img, .card-img-tiles .thumblist {
        display: table-cell;
        width: 65%;
        padding: 15px;
        vertical-align: middle;
}

    .card-img-tiles .main-img>img:last-child, .card-img-tiles .thumblist>img:last-child {
        margin-bottom: 0;
}

    .card-img-tiles .main-img>img, .card-img-tiles .thumblist>img {
        display: block;
        width: 100%;
        margin-bottom: 6px;
}
    .thumblist {
        width: 35%;
        border-left: 1px solid #e1e7ec !important;
        display: table-cell;
        width: 65%;
        padding: 15px;
        vertical-align: middle;
}



    .card-img-tiles .thumblist>img {
        display: block;
        width: 100%;
        margin-bottom: 6px;
}
    .btn-group-sm>.btn, .btn-sm {
        padding: .45rem .5rem !important;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: .2rem;
}
</style>