 <x-guest-layout>
         <x-auth-card>
             <x-slot name="text">
                 <h1 class="text-white text-xl md:text-3xl font-extrabold">Bienvenidos a la yincana del <span class="line-through">terror</span></h1>
             </x-slot>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-32	h-32 fill-current text-gray-500"></x-application-logo>
                </a>
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"></x-auth-session-status>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>

            <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('pages.login.email')"></x-label>

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus></x-input>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="pin" :value="__('pages.login.password')"></x-label>

                    <x-input id="pin" class="block mt-1 w-full"
                             minlength="4" maxlength="4"
                             type="password"
                             name="password"
                             required autocomplete="current-password"></x-input>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('pages.login.btn-login') }}
                    </x-button>
                </div>
            </form>

             <x-slot name="infoText">
                 <p>Recuerda que necesitas los datos previamente introducidos en el bot para poder iniciar sesión</p>
                 <p>Si no los recuerdas o aún no estás participando en la yincana, <span class="font-bold">pulsa aquí para hablar con el bot:</span> </p>
                 <p><a class="underline" href="https://t.me/horas24_bot?start=quiz" target="_blank" rel="noopener noreferrer">Pulsa Aquí</a></p>
             </x-slot>
        </x-auth-card>
 </x-guest-layout>
