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