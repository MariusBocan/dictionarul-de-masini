<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Checkout
        </h2>
    </x-slot>
    <div class="add-customer">
        <h2 style="text-align:center; font-size: 25px;">Completeaza datele de livrare</h2>
        <form method="POST" action="{{ route('customer') }}">
            @csrf

            <!-- Firstname -->
            <div class="mt-4">
                <x-input-label for="firstname" :value="__('Prenume')" />
                <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
                <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
            </div>
            
            <!-- Lastname -->
            <div class="mt-4">
                <x-input-label for="lastname" :value="__('Nume')" />
                <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Numar de telefon')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Country -->
            <div class="mt-4">
                <x-input-label for="country" :value="__('Tara')" />
                <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autofocus autocomplete="country" />
                <x-input-error :messages="$errors->get('country')" class="mt-2" />
            </div>

            <!-- City -->
            <div class="mt-4">
                <x-input-label for="city" :value="__('Oras')" />
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Adresa completa')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Payment -->
            <div class="mt-4">
                <x-input-label for="-" :value="__('Metoda de plata')" />
                <input type="radio" name="ramburs" value="ramburs" checked>
                <label for="ramburs">Ramburs la livrare</label> <br>
                <input type="radio" name="card" value="card" disabled>
                <label for="card">Card <span style="color:red;"> - Momentan, plata cu cardul nu este disponibila. Ne cerem scuze pentru inconvenienta creata.</span></label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Comanda') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    {{-- Footer --}}
    <footer
            class="text-center text-lg-start text-white mt-5"
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
        <a class="text-white" href="https://mdbootstrap.com/"
           >MDBootstrap.com</a
          >
      </div>
    </footer>
</x-app-layout>

<style>
    .add-customer {
        width: 50%;
        margin: auto;
        margin-top: 20px;
    }
    .cancel-product {
        background-color: red;
    }
    .button-container {
        margin: auto;
    }
</style>