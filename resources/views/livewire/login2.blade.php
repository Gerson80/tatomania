<div>
    
        
        <x-authentication-card>
            
    
            <x-validation-errors class="mb-4" />
    
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <div class="text-center text-2xl">
                <p>INICIAR SESIÓN</p>
            </div>
            
            <x-icono-mujer/>
    
            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                <div class="flex">
                    <div class="w-1/3">
                        <x-label class="p-4" for="email" value="{{ __('Email') }}"  />
                    </div>
    
                    
                    <x-input wire:model="email" id="email" class=" mt-1 w-full"  name="email" :value="old('email')" required autofocus autocomplete="" />
                </div>
    
                <div class=" flex mt-4">
                    <x-label class="p-4" for="password" value="{{ __('Password') }}" />
                    <x-input id="password" wire:model="password" class="block mt-1 w-full" name="password" required autocomplete="current-password" />
                </div>
    
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recordar') }}</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    
    
                    
                </div>
                <div class="grid place-items-center">
                    <x-button type="submit" wire:click="login" class="">
                        Iniciar
                    </x-button>
                    <div>
                        
                    </div>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 mt-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-Secundario" href="{{ route('password.request') }}">
                            {{ __('Olvide mi contraseña?') }}
                        </a>
                    @endif
    
                    
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 mt-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-Secundario" href="{{ route('registro') }}">
                        {{ __('Crear una cuenta') }}
                    </a>
                    
    
                </div>
                
            </form>
        </x-authentication-card>

    
</div>
