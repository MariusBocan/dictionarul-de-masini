<x-app-layout>
    <x-slot name="header">
    </x-slot>
    @if (count($carts) == 0) 
        <h1 style="text-align:center; margin-top:20px; font-size:2em;"> Nu aveti produse in cos <h1>
        <div class="d-flex"  style=" margin-top:35px; display:flex; justify-content:center">
            <a href="/shop">
                <button type="button" class="btn btn-primary continue-shopping">Du-ma la magazin</button>
            </a>
        </div>
    @else
        <section class="h-100 gradient-custom">
            <div class="container py-5">
              <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                  <div class="card mb-4">
                    <div class="card-header py-3">
                        @if( Auth::user()->productsNumber === 1)
                      <h5 class="mb-0">Cos de cumparaturi - {{ Auth::user()->productsNumber}} produs</h5>
                      @else
                      <h5 class="mb-0">Cos de cumparaturi - {{ Auth::user()->productsNumber}} produse</h5>
                      @endif
                    </div>
                    @foreach($carts as $cart)
                    <div class="card-body">
                      <!-- Single item -->
                      <div class="row">
                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                          <!-- Image -->
                          <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                            <img src="{{URL($cart->product->image)}}"
                              class="w-100" alt="$cart->product->name" />
                            <a href="#!">
                              <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                            </a>
                          </div>
                          <!-- Image -->
                        </div>
          
                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                          <!-- Data -->
                          <p><strong>{{$cart->product->brand}} {{$cart->product->name}}</strong></p>
                          <p>{{$cart->product->category}}</p>
                          <p>Pret/Bucata: {{$cart->product->price}} RON</p>
                          <a href="/delete-from-cart/{{$cart->id}}">
                            <button class="btn btn-danger">
                                x
                            </button>  
                        </a> 
                          <!-- Data -->
                        </div>
          
                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                          <!-- Quantity -->
                          <div class="d-flex mb-4" style="max-width: 300px">
                            
                            <div class="form-inline">
                                @if ($cart->quantity > 1)
                                    <a href="/decrease-quantity-from-cart/{{$cart->product->id}}">
                                        <button type="button" class="btn btn-primary continue-shopping">-</button>
                                    </a>
                                @else
                                    <button type="button" class="btn btn-primary no-stock" title="Trebuie sa aveti cel putin un produs in cos!">-</button>
                                @endif
                                <div style="display:flex; justify-content:center; width:35px; height:38px; border: 1px solid black">
                                    <p class="text-center">{{$cart->quantity}}</p>
                                </div>
                                @if ($cart->quantity < $cart->product->quantity)
                                    <a href="/increase-quantity-from-cart/{{$cart->product->id}}">
                                        <button type="button" class="btn btn-primary continue-shopping">+</button>
                                    </a>
                                @else
                                    <button type="button" class="btn btn-primary no-stock" title="Stoc insuficient!">+</button>
                                @endif
                            </div>
          
                            
                          </div>
                          <!-- Quantity -->
          
                          <!-- Price -->
                          <p class="text-start">
                            <strong>Total: {{$cart->product->price * $cart->quantity}} RON</strong>
                          </p>
                          <!-- Price -->
                        </div>
                      </div>
                      <!-- Single item -->
          
                      
                      <hr class="my-4" />
          
                      
                  
                  
                </div>
                
          @endforeach
                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-header py-3">
                      <h5 class="mb-0">Sumar</h5>
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li
                          class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                          Total:
                          <span>{{ Auth::user()->cartPrice }} RON</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                          Transport:
                          <span>25 RON</span>
                        </li>
                        <li
                          class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                          <div>
                            <strong>Suma totala</strong>
                            <strong>
                              <p class="mb-0">(include TVA)</p>
                            </strong>
                          </div>
                          <span><strong>{{ Auth::user()->cartPrice + 25 }} RON</strong></span>
                        </li>
                      </ul>
                      <a href="cart/checkout">
                        <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: blue;">
                            Finalizarea comenzii
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
    @endif   
    
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

    .continue-shopping {
        background-color: blue;
    }

    .no-stock {
        background-color: grey;
    }

    .no-stock:hover {
        background-color: grey;
    }

    /*TEST*/

    
</style>