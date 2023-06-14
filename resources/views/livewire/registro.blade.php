<div>
    <div>
        <div class="flex pt-7">
            <div class="w-1/6">
                
            </div>
            <div class="w-4/6">
                
                
                <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                    @if ($mostrarFormulario)
                    @csrf
                    <div class="grid place-items-center  mb-4">
                        <a  class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" wire:click="mostrarOcultarFormulario">Regresar</a>
        
                        
                    </div>
                   
                    <div class="text-center text-2xl">
                        <p>REGISTRO</p>
                    </div>
                    
                    <x-icono-mujer/>
                    
                    <div class="flex mt-4">
                        <x-label class="p-4 w-1/6 text-right" for="name" value="{{ __('Nombre') }}" />
                        <div class="w-full">
                            <div class="px-4">
                                <p class="text-gray-500 text-sm">Regístrate con el nombre que quieres que los demás usuarios vean.</p>
                            </div>
                            <x-input placeholder="Adriana" id="name" wire:model="name" class="block mt-1 w-full h-10" name="name" :value="old('name')" required autofocus />

                        </div>
                        @error('name')
                        <span class="text-Adicional text-center mt-1">{{ $message }}</span>
                        @enderror
                        
                    </div>
                    
                    <div class="flex mt-4">
                        <x-label class="p-4 w-1/6 text-right" for="name" value="{{ __('Apellidos') }}" />
                        <x-input placeholder="Herrera" wire:model="last_name" id="name" class="block mt-1 w-full h-10" name="last_name" :value="old('last_name')" required autofocus />
                        @error('last_name')
                        <span class="text-Adicional text-center mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="flex mt-4">
                        <x-label class="p-4  w-1/6 text-right" for="name" value="{{ __('Edad') }}" />
                        <div class="w-full">
                            <div class="px-4">
                                <p class="text-gray-500 text-sm">Ingrese su edad, el cual debe ser mayor a 18 años.</p>
                            </div>
                            <x-input placeholder="34" wire:model="edad" type="number" id="name" class="block mt-1 w-full h-10"  name="edad" :value="old('edad')" required autofocus  />
                        </div>
                        @error('edad')
                            <p class="text-Adicional text-center mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex mt-4">
                        <x-label  class="p-4 w-1/6 text-right" for="name" value="{{ __('Foto') }}" />   
                        <div class="w-full">
                            <div class="px-4">
                                <p class="text-gray-500 text-sm">La imagen no debe ser mayor a 1500 x 1500 píxeles.</p>
                            </div>
                            <input wire:model="foto"  class="h-11 relative m-0 block  w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-Secundario file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-Secundario focus:border-Primario focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-Primario dark:file:text-neutral-100 dark:focus:border-primary" type="file" name="foto" :value="old('foto')" required autofocus />
                        </div>
                        @error('foto')
                        <span class="text-Adicional text-center mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex mt-4">
                        <x-label class="p-4  w-1/6 text-right" for="name" value="{{ __('Estado') }}" />
                        <div class="w-full">
                            <div class="px-4">
                                <p class="text-gray-500 text-sm">Ingrese su estado en el que vive, Eje. Yucatán.</p>
                            </div>
                            <x-input placeholder="Yucatan" id="name" wire:model="estado" class="block mt-1 w-full h-10"  name="estado" :value="old('estado')" required autofocus  />
                        </div>
                       
                        @error('estado')
                        <span class="text-Adicional text-center mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                  
        
                    
                   
                    <div class="mt-4 flex">
                        <x-label class="p-4  w-1/6 text-right" for="email" value="{{ __('Email') }}" />
                        <div class="w-full">
                            <div class="px-4">
                                <p class="text-gray-500 text-sm">Ingrese su email personal, de preferencia el que más usa.</p>
                            </div>
                            <x-input placeholder="Adriana34@gmail.com" wire:model="email" id="email" class="block mt-1 w-full h-10"  name="email" :value="old('email')" required  />
                        </div>
                        
                        
                        @error('email')
                        <span class="text-Adicional text-center mt-1">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="mt-4 flex">
                        <x-label class="p-4  w-1/6 text-right" for="password" value="{{ __('Contraseña') }}" />
                        <div class="w-full">
                            <div class="px-4">
                                <p class="text-gray-500 text-sm">La contraseña debe contener al menos una letra minúscula, una letra mayúscula, un número y 8 caracteres.</p>
                            </div>
                            <x-input placeholder="Aherrera34" type="password" wire:model="password" id="password" class="block mt-1 w-full h-10"  name="password" required  />
                        </div>
                       
                        @error('password')
                        <span class="text-Adicional text-center mt-1">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="mt-4 flex">
                        <x-label class="p-4  w-1/6 text-right" for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                        <div class="w-full">
                            <div class="px-4">
                                <p class="text-gray-500 text-sm">Ingrese su contraseña nuevamente.</p>
                            </div>
                            <x-input   placeholder="Aherrera34" type="password" wire:model="passwordConf" id="password_confirmation" class="block mt-1 w-full h-10"  name="password_confirmation" required  />
                        </div>
                       
                    </div>
        
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />
        
                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                        
                        
                       
        
                        
                    @endif
                        
                        <x-input  type="hidden" name="admision" value="no" />
                        <x-input  type="hidden" name="pregunta1" wire:model="pregunta2"    />
                        <x-input  type="hidden" name="pregunta2" wire:model="pregunta2"    />
                        <x-input  type="hidden" name="pregunta3" wire:model="pregunta3"    />
                        <x-input  type="hidden" name="pregunta4" wire:model="pregunta4"    />

                        <div class="grid place-items-center  mt-4">
                            <a  wire:click="validar" class="ml-4 inline-flex items-center px-4 py-2 bg-Primario border border-transparent rounded-md font-semibold text-xs text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 uppercase tracking-widest hover:bg-Secundario focus:Secundario active:bg-Secundario focus:outline-none focus:Adicional focus:bg-Secundario focus:ring-offset-2 ">
                                registrar
                            </a>

                            <button id="myButton" type="submit"  style="display: none;">Ejecutar</button>
                            
                        </div>
                   
                    
                    @else
                    
                    <div class="text-gray-700">
                        <div class="text-center text-2xl">
                            <p>REGISTRO</p>
                        </div>
                        <p class="text-justify">Sabemos que la mastectomía es un tema importante y emocionalmente cargado. Queremos brindarte un espacio seguro para que puedas expresar tus sentimientos y compartir tus vivencias. A continuación, te invitamos a responder algunas preguntas:</p>
                        <div class="grid grid-cols-4 gap-4 pt-9">
                            <div class="mt-6">
                                <img src="{{ asset('/img/cancer.svg') }}" width="100%"  alt="Descripción de la imagen" usemap="#mi-mapa" >
                            </div>
                            <div class="grid grid-rows-4 col-start-2 col-span-3 ">
                               <div class="border-solid border-2 border-Primario container mt-6">
                                    <div class="p-3 text-xl">
                                        <p>¿Cómo te sientes con respecto a la mastectomía?</p>
                                            <textarea wire:model="pregunta1" name="pregunta1" :value="old('pregunta1')" id="pregunta1" cols="30" rows="3" autofocus class="  w-full border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                                            @error('pregunta1')
                                            <span class="text-Adicional text-center mt-1">{{ $message }}</span>
                                            @enderror
    
                                    </div>
                                
                                </div>
                               
                                <div class="border-solid border-2 border-Primario container mt-6">
                                    <div class="p-3 text-xl">
                                        <p>¿Cuál fue tu reacción inicial al enterarte de que necesitabas una 
                                            mastectomía?</p>
                                            <textarea wire:model="pregunta2" name="pregunta2" :value="old('pregunta2')" id="pregunta2" cols="30" rows="3" class="  w-full border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                                            @error('pregunta2')
                                            <span class="text-Adicional text-center mt-1">{{ $message }}</span>
                                            @enderror
    
                                    </div>
                                
                               </div>
    
                               <div class="border-solid border-2 border-Primario container mt-6">
                                <div class="p-3 text-xl">
                                    <p>¿Cómo fue tu experiencia durante el proceso de la mastectomía?</p>
                                        <textarea wire:model="pregunta3" name="pregunta3" :value="old('pregunta3')" id="pregunta3" cols="30" rows="3" class="  w-full border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                                    
                                        @error('pregunta3')
                                        <span class="text-Adicional text-center mt-1">{{ $message }}</span>
                                        @enderror
                                </div>
                            
                           </div>
    
                           <div class="border-solid border-2 border-Primario container mt-6">
                            <div class="p-3 text-xl">
                                <p>¿Cómo afectó la mastectomía a tu vida cotidiana y actividades 
                                    diarias?</p>
                                    <textarea wire:model="pregunta4" name="pregunta4" :value="old('pregunta4')" id="pregunta4" cols="30" rows="3" class="  w-full border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                                    @error('pregunta4')
                                    <span class="text-Adicional text-center mt-1">{{ $message }}</span>
                                    @enderror
    
                            </div>
                        
                       </div>
                       <div class="grid place-items-center  mt-4">
                       
                        
                        
                    </div>
                            </div>
    
                        </div>
    
                    </div>

                    <div class="grid place-items-center  mt-4">
                        <a  class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" wire:click="mostrarOcultarFormulario">Siguiente</a>
        
                        
                    </div>

                    @endif
                    
                    
                </form>
                
               
    
            </div>
            
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('contenidoActualizado', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</div>
<script>
    document.addEventListener('livewire:load', function () {
    Livewire.on('mensajeCamposVacios', function () {
        Swal.fire({
            title: 'Disculpa!',
            text: 'Porfavor llena todo los campos',
            iconHtml: '<img src="{{ asset('img/icono-error.svg') }}" class="custom-icon">',
            confirmButtonText: 'Aceptar',
            buttonsStyling: false,
            customClass:{
                icon: 'custom-icon',
                confirmButton: 'inline-flex items-center px-4 py-2 bg-Primario border border-transparent rounded-md font-semibold text-xs text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 uppercase tracking-widest hover:bg-Secundario focus:Secundario active:bg-Secundario focus:outline-none focus:Adicional focus:bg-Secundario focus:ring-offset-2 transition ease-in-out duration-150'
            },
            })
    });
    Livewire.on('mensajeAceptacion', function () {
        const button = document.getElementById('myButton');

        // Simula el clic en el botón
        button.click();
        Swal.fire({
            title: '¡REGISTRO COMPLETO!',
            text: 'Sus respuestas serán evaluadas',
            text: 'Espere el correo de aceptación',
            text: 'Compruebe su correo (Incluyendo la bandeja de correos no deseados o spam',
            showConfirmButton: false,
            iconHtml: '<img src="{{ asset('img/icono-error.svg') }}" class="custom-icon">',
            customClass:{
                icon: 'custom-icon',
                
            },
            })
    });
    Livewire.on('formularioNoEnviado', function () {
        Swal.fire({
            title: 'Disculpa!',
            text: 'Porfavor revise los campos ingresados',
            iconHtml: '<img src="{{ asset('img/icono-error.svg') }}" class="custom-icon">',
            confirmButtonText: 'Aceptar',
            buttonsStyling: false,
            customClass:{
                icon: 'custom-icon',
                confirmButton: 'inline-flex items-center px-4 py-2 bg-Primario border border-transparent rounded-md font-semibold text-xs text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 uppercase tracking-widest hover:bg-Secundario focus:Secundario active:bg-Secundario focus:outline-none focus:Adicional focus:bg-Secundario focus:ring-offset-2 transition ease-in-out duration-150'
            },
            })
    });
});

</script>

<style>
    .custom-icon{
        border: 0;
    }
</style>