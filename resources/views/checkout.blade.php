<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Checkout
        </h2>
    </x-slot>
    
        <h2> Delivery info </h2>   
    <form method="POST" action="{{  route('checkout.store') }}" class="checkout">
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
            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Numar de telefon')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Adresa de livrare completa')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Payment -->
            <div class="mt-4">
                <x-input-label for="paymnet" :value="__('Metoda de plata')" />
                <input type="radio" id="ramburs" name="payment" value="ramburs">
                <label for="ramburs">Ramburs la livrare</label><br>
                
                <input type="radio" id="card" name="payment" value="card">
                <label for="card">Card la livrare</label><br>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Order now') }}
                </x-primary-button>
            </div>
        </form>
        <div class="button-container d-flex justify-content-end">
            <a href="/cart">
                <button type="button" class="btn btn-danger cancel-product">Cancel</button>
            </a>
        </div>
    </div>
</x-app-layout>

<style>
    .checkout {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 80%;
    }

    .add-product {
        width: 80%;
        margin: auto;
        margin-top: 20px;
    }
    .cancel-product {
        background-color: red;
    }

    .button-container {
        width: 80%;
        margin: auto;
    }

    .continue-shopping {
        background-color: blue;
    }
</style>