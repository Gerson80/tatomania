<div>
    @if(!$ventanaEditarPerfil)
    <div class="grid grid-cols-3 gap-4 text-gray-700">
        <div  class="grid place-items-center shadow-xl container ">
            <img src="data:image/jpeg;base64,{{ $user->foto }}" width="230" alt="Descripción de la imagen" class="rounded-full my-5">
            <h1 class="text-xl uppercase">{{ $user->name }} {{ $user->last_name }}</h1>
            <h2>Edad: {{ $user->edad }}</h2>
            <h2>Estado: {{ $user->estado }}</h2>
            <h2>Correo</h2>
            <h2 class="">{{ $user->email }}</h2>
            <x-button wire:click="editarPerfil"   class="m-4 ">
                Editar
            </x-button>
        </div>
        <div class="col-span-2 grid text-center text-gray-700">
            @if(!$ventanaPublicaciones && !$ventanaVivencias)
            <div>
                <h1 class="mt-4 text-2xl">¡Bienvenida {{ $user->name }}!</h1>
                <p class="text-justify mx-12 ">Recuerda, estás en un entorno seguro y respetuoso. Aquí, cada historia es valiosa y cada voz cuenta. Juntas, podemos superar obstáculos, encontrar la fuerza interior y recordarnos mutuamente que la belleza y la confianza no se definen por las apariencias externas, sino por la fuerza y el amor propio que llevamos dentro.</p>
            </div>
            <div>
                <x-button wire:click="ventanaPublicaciones" type="submit"  class="m-4 ">
                    Mis publicaciones
                </x-button>
                <x-button wire:click="ventanaVivencias" type="submit"  class="m-4 ">
                    Mis vivencias
                </x-button>
            </div>
            @elseif ($ventanaPublicaciones)
            <div class="grid place-items-center  mb-4">
                <button  class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 mt-4" wire:click="ventanaPublicaciones">Regresar</button>
            </div>
            <h1 class="mt-4 text-2xl">Publicaciones</h1>
            @else
            <div class="grid place-items-center  mb-4">
                <button  class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 mt-4" wire:click="ventanaVivencias">Regresar</button>
            </div>
            <h1 class="mt-4 text-2xl">Vivencias</h1>
            @endif
        </div>

       
    </div>
    @endif
    @if($ventanaEditarPerfil)
    <div class="grid grid-cols-6 gap-4">
        <div class="col-start-2 col-span-4">
            <form   enctype="multipart/form-data">
               
                @csrf
                <div class="grid place-items-center  mb-4">
                    <button  class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 mt-4" wire:click="editarPerfil">Regresar</button>
                    
                </div>
               
                <div class="grid place-items-center ">
                    <label for="imagen" class="cursor-pointer transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                        <input type="file" id="imagen" wire:model="imagen" class="hidden" style="background-image: url('{{ asset('/img/subir.svg') }}')">
                        <div class="w-48 h-48  bg-transparent flex items-center justify-center">
                            
                            @if ($imagen)
                                <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen seleccionada" class="w-48 h-48 ">
                                    
                            @elseif ($foto)
                                <img src="data:image/jpeg;base64,{{ $foto }}" alt="">
    
                            @else
                                <img src="{{ asset('/img/subir.svg') }}" alt="">
                                
                            @endif
                            
                        </div>
                    </label>
                </div>
    
                <div class="flex mt-2">
                    <x-label class="p-4 w-1/6 text-right" for="name" value="{{ __('Nombre') }}" />
                    <x-input id="name" wire:model="name" class="block mt-1 w-full h-10"  name="name" :value="old('name')" required autofocus  />
                </div>
                <div class="flex mt-2">
                    <x-label class="p-4 w-1/6 text-right" for="name" value="{{ __('Apellidos') }}" />
                    <x-input  id="name" wire:model="last_name" class="block mt-1 w-full h-10"  name="last_name" :value="old('last_name')" required autofocus  />
                </div>
                <div class="flex mt-2">
                    <x-label class="p-4  w-1/6 text-right" for="name" value="{{ __('Edad') }}" />
                    <x-input  id="name" wire:model="edad" class="block mt-1 w-full h-10"  name="edad" :value="old('edad')" required autofocus  />
                </div>

                <div class="flex mt-2">
                    <x-label class="p-4  w-1/6 text-right" for="name" value="{{ __('Estado') }}" />
                    <x-input  id="name" wire:model="estado" class="block mt-1 w-full h-10"  name="estado" :value="old('estado')" required autofocus  />
                </div>

               
                <div class="mt-2 flex">
                    <x-label class="p-4  w-1/6 text-right" for="email" value="{{ __('Email') }}" />
                    <x-input   id="email" wire:model="email" class="block mt-1 w-full h-10"  name="email" :value="old('email')" required  />
                </div>
    
                

            </form>
            <div class="grid place-items-center">
                <x-button wire:click="guardarPerfil" type="submit"  class="m-4 ">
                    Guardar
                </x-button>
            </div>
        </div>

    </div>

    @endif
</div>


<script>
    document.addEventListener('livewire:load', function () {
    

    Livewire.on('refreshComponent', function () {
        location.reload();
    });
   
    Livewire.on('actializacionPerfil', function () {
        Swal.fire({
            title: 'Perfecto',
            text: 'Haz actualizado tu perfil correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar',
            buttonsStyling: false,
            customClass:{
                icon: 'custom-icon',
                confirmButton: 'inline-flex items-center px-4 py-2 bg-Primario border border-transparent rounded-md font-semibold text-xs text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 uppercase tracking-widest hover:bg-Secundario focus:Secundario active:bg-Secundario focus:outline-none focus:Adicional focus:bg-Secundario focus:ring-offset-2 transition ease-in-out duration-150'
            },
            }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
                
                
            }
            });
            
    });

    
});

</script>
<style>
    .custom-icon{
        border: 0;
    }
</style>

