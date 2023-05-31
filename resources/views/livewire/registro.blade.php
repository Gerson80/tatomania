<div>
    <div>
        <div class="flex pt-7">
            <div class="w-1/6">
                
            </div>
            <div class="w-4/6">
                
               
                <form method="POST" action="{{ route('register') }}">
                    @if ($mostrarFormulario)
                    @csrf
                    <div class="grid place-items-center  mb-4">
                        <a  class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" wire:click="mostrarOcultarFormulario">Regresar</a>
        
                        
                    </div>
                   
                    <div class="text-center text-2xl">
                        <p>REGISTRO</p>
                    </div>
                    
                    <x-icono-mujer/>
        
                    <div class="flex mt-2">
                        <x-label class="p-4 w-1/6 text-right" for="name" value="{{ __('Nombre') }}" />
                        <x-input id="name" class="block mt-1 w-full h-10"  name="name" :value="old('name')" required autofocus  />
                    </div>
                    <div class="flex mt-2">
                        <x-label class="p-4 w-1/6 text-right" for="name" value="{{ __('Apellidos') }}" />
                        <x-input  id="name" class="block mt-1 w-full h-10"  name="last_name" :value="old('last_name')" required autofocus  />
                    </div>
                    <div class="flex mt-2">
                        <x-label class="p-4  w-1/6 text-right" for="name" value="{{ __('Edad') }}" />
                        <x-input  id="name" class="block mt-1 w-full h-10"  name="edad" :value="old('edad')" required autofocus  />
                    </div>
                    <div class="flex mt-2">
                        <x-label  class="p-4 w-1/6 text-right" for="name" value="{{ __('Foto') }}" />
                        
                        <input   class="relative m-0 block h-full w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-Secundario file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-Secundario focus:border-Primario focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-Primario dark:file:text-neutral-100 dark:focus:border-primary" type="file" name="foto" :value="old('foto')" required autofocus />
                    </div>
                    <div class="flex mt-2">
                        <x-label class="p-4  w-1/6 text-right" for="name" value="{{ __('Estado') }}" />
                        <x-input  id="name" class="block mt-1 w-full h-10"  name="estado" :value="old('estado')" required autofocus  />
                    </div>
                  
        
                    
                   
                    <div class="mt-2 flex">
                        <x-label class="p-4  w-1/6 text-right" for="email" value="{{ __('Email') }}" />
                        <x-input   id="email" class="block mt-1 w-full h-10"  name="email" :value="old('email')" required  />
                    </div>
        
                    <div class="mt-2 flex">
                        <x-label class="p-4  w-1/6 text-right" for="password" value="{{ __('Contraseña') }}" />
                        <x-input  id="password" class="block mt-1 w-full h-10"  name="password" required  />
                    </div>
        
                    <div class="mt-2 flex">
                        <x-label class="p-4  w-1/6 text-right" for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                        <x-input  id="password_confirmation" class="block mt-1 w-full h-10"  name="password_confirmation" required  />
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
                            <x-button wire:click="registrar"  class="ml-4">
                                registrar
                            </x-button>
            
                            
                        </div>
                   
                    
                    @else
                    
                    <div>
                        <div class="text-center text-2xl">
                            <p>REGISTRO</p>
                        </div>
                        <p>Fusce tempus fermentum sodales. Ut quam odio, scelerisque vitae sapien hendrerit, dictum accumsan purus. In urna purus, blandit eget semper eu, aliquet sed sapien. Curabitur eget massa varius, rutrum dui vel, placerat ipsum. Morbi tincidunt.</p>
                        <div class="grid grid-cols-4 gap-4 pt-9">
                            <div class="mt-6">
                                <img src="{{ asset('/img/cancer.svg') }}" width="100%"  alt="Descripción de la imagen" usemap="#mi-mapa" >
                            </div>
                            <div class="grid grid-rows-4 col-start-2 col-span-3 ">
                               <div class="border-solid border-2 border-Primario container mt-6">
                                    <div class="p-3 text-xl">
                                        <p>¿Cuál fue tu reacción inicial al enterarte de que necesitabas una 
                                            mastectomía?</p>
                                            <textarea wire:model="pregunta1" name="pregunta1" :value="old('pregunta1')" id="pregunta1" cols="30" rows="3" class="  w-full border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                                        
    
                                    </div>
                                
                                </div>
                               
                                <div class="border-solid border-2 border-Primario container mt-6">
                                    <div class="p-3 text-xl">
                                        <p>¿Cuál fue tu reacción inicial al enterarte de que necesitabas una 
                                            mastectomía?</p>
                                            <textarea wire:model="pregunta2" name="pregunta2" :value="old('pregunta2')" id="pregunta2" cols="30" rows="3" class="  w-full border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                                        
    
                                    </div>
                                
                               </div>
    
                               <div class="border-solid border-2 border-Primario container mt-6">
                                <div class="p-3 text-xl">
                                    <p>¿Cuál fue tu reacción inicial al enterarte de que necesitabas una 
                                        mastectomía?</p>
                                        <textarea wire:model="pregunta3" name="pregunta3" :value="old('pregunta3')" id="pregunta3" cols="30" rows="3" class="  w-full border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                                    
    
                                </div>
                            
                           </div>
    
                           <div class="border-solid border-2 border-Primario container mt-6">
                            <div class="p-3 text-xl">
                                <p>¿Cuál fue tu reacción inicial al enterarte de que necesitabas una 
                                    mastectomía?</p>
                                    <textarea wire:model="pregunta4" name="pregunta4" :value="old('pregunta4')" id="pregunta4" cols="30" rows="3" class="  w-full border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                                
    
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
                confirmButton: 'inline-flex items-center px-4 py-2 bg-Primario border border-transparent rounded-md font-semibold text-xs text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 uppercase tracking-widest hover:bg-Secundario focus:Secundario active:bg-gray-900 focus:outline-none focus:ring-2 focus:bg-Secundario focus:ring-offset-2 transition ease-in-out duration-150'
            },
            })
    });
    Livewire.on('mensajeAceptacion', function () {
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
});

</script>

<style>
    .custom-icon{
        border: 0;
    }
</style>