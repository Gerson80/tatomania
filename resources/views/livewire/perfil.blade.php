<div>
    @if(!$ventanaEditarPerfil)
    <div class="grid grid-cols-3 gap-4 text-gray-700">
       <div class="">
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
       </div>
        <div class="col-span-2 grid text-center text-gray-700 overflow-auto h-96 ">
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
           
            @if(!$modalEditarPublicacion)
            <div class="grid grid-cols-12 overflow-auto h-96 ">
                
                <div class="col-start-2 col-span-10  ">
                    <div class="grid place-items-center  mb-4">
                        <button  class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 mt-4" wire:click="ventanaPublicaciones">Regresar</button>
                    </div>
                    <h1 class="mt-4 text-2xl text-center">Publicaciones</h1>
                    <div class="grid grid-cols-2 gap-10 ">
                        
                        @foreach($publicaciones as $publicacion)
                        @if($publicacion->user_id == $user->id)
                            

                            <div class="h-96 container my-2 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                                <div  class="h-56 bg-neutral-200 relative">
                                    <img src="data:image/jpeg;base64,{{ $publicacion->foto }}" alt="imagen" class="w-full h-full rounded-t-lg">
                                    @if($publicacion->user->id==$user->id)
                                    <button wire:click="opciones({{ $publicacion->id }})"  class=" m-2 absolute inset-y-0 right-0 transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-6  items-center w-10   bg-cover " style="background-image: url('{{ asset('/img/opciones.svg') }}')"></button>
                                    @endif
                                    @if($publicacion->autorizado=="si")
                                    <p class=" m-2 absolute inset-y-0   flex justify-center h-0  sm:h-6  items-center   bg-cover ">Publicación Autorizado</p>
                                    @else
                                    <p class=" text-base m-2 absolute inset-y-0   flex justify-center h-0  sm:h-6  items-center    bg-cover ">Publicación no autorizado</p>
                                    @endif
                                </div>
                                <div class="flex my-3 text-xl uppercase mx-3">
                                    <div class="w-5/6">  <p> {{ $publicacion->user->name }} &nbsp {{ $publicacion->user->last_name }}</p></div>

                                    
                                </div>
                                
                                <div class="flex justify-center items-center">
                                    
                                    <p class="mr-2 inline-flex items-center px-2 py-1 bg-Secundario border border-transparent rounded-md font-semibold text-xs text-white  tracking-widest    ">Tatuador</p>
                                    <p class="ml-2">{{ $publicacion->name }} &nbsp {{ $publicacion->last_name }}</p>
                                </div> 
                                <div class=" text-l mt-5 mx-3">
                                    <p  class="bg-Gris rounded-xl px-3 w-full py-2  ">La publicación tiene {{ $publicacion->comentariostatus->count() }} comentarios </p>
                                    
                                </div>
                                
                                
                            </div>

                        @endif
                        @endforeach
                  </div>
                </div>
            </div>
            @endif
            @if($modalEditarPublicacion)
            <div class="grid place-items-center  mb-4">
                <button  class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 mt-4" wire:click="ventanaPublicaciones">Regresar</button>
            </div>
            <div class="m-10 border-2 border-Adicional ">
                <div class="text-center text-2xl mt-3">
                    <h1>Foto</h1>
                </div>
                <div class="grid place-items-center">
                    <div class="flex items-center border-2 border-Primario">
                        <label for="imagen" class="cursor-pointer">
                            <input type="file" id="imagen" wire:model="imagen" class="hidden" style="background-image: url('{{ asset('/img/subir.svg') }}')">
                            <div class="w-48 h-48  bg-transparent flex items-center justify-center">
  
                                    @if ($imagen)
                                        <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen seleccionada" class="w-48 h-48 ">
                                        
                                    @elseif ($imagen2)
                                        <img src="data:image/jpeg;base64,{{ $imagen2 }}" alt="">

                                    @else
                                        <img src="{{ asset('/img/subir.svg') }}" alt="">
                                    @endif
                            
                                
                            </div>
                        </label>
                    </div>

                </div>
                <div class="grid place-items-center my-3 text-lg">
                    <div class="w-80 flex">
                        <x-label class=" text-lg mt-3 mr-3" for="name" value="{{ __('Categoria') }}" />
                        <select id="categoria" wire:model="categoria" name="categoria" :value="old('categoria')"  class=" bg-transparent border border-Primario text-gray-900 text-sm rounded-lg focus:ring-Secundario focus:border-Secundario block w-full p-2.5 ">
                            <option selected>Elige una opción</option>
                            <option value="flores"  class="bg-transparent hover:bg-Secundario focus:ring-Secundario">Flores</option>
                            <option value="animales">Animales</option>
                            <option value="varios">Varios</option>
                        
                        </select>

                    </div>
                            
                </div>
                <div class="grid grid-cols-6 gap-4 mx-5 text-lg border-2 border-transparent border-b-Primario">
                    <div class="col-start-2 col-span-4">
                        <x-label class=" text-lg mt-3" for="name" value="{{ __('Historia') }}" />
                        <textarea  id="historia" wire:model="historia" name="historia" : cols="30" rows="3" class=" mb-3 w-full block border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                    </div>

                </div>
                <h2 class="text-center text-lg mt-4 ">Datos del tatuador</h2>
                <div class="grid grid-cols-6 gap-4 mx-5 text-xl">
                    <div class="col-start-2 col-span-4">
                        <div class="mt-2">
                            <x-label class=" text-lg mt-3" for="name" value="{{ __('Nombre') }}" />
                            <x-input  id="nombre" wire:model="nombre" class="block text-lg mt-1 w-full h-10"  name="nombre" :value="old('nombre')" required   />
                        </div>
                        <div class="mt-2">
                            <x-label class=" text-lg mt-3" for="name" value="{{ __('Apellidos') }}" />
                            <x-input  id="apellidos" wire:model="apellidos" class="block text-lg mt-1 w-full h-10"  name="apellidos" :value="old('apellidos')" required   />
                        </div>
                        <div class="mt-2">
                            <x-label class=" text-lg mt-3" for="name" value="{{ __('Cuentame') }}" />
                            <textarea  id="cuentame" wire:model="cuentame" name="cuentame" : cols="30" rows="3" class="mt-1 text-lg mb-3 w-full block border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                        
                        </div>
                        <div class="mt-2">
                            <x-label class=" text-lg mt-3" for="name" value="{{ __('Numero') }}" />
                            <x-input  id="numero" wire:model="numero" class="block text-lg mt-1 w-full h-10"  name="numero" :value="old('numero')"    />
                        </div>
                        <div class="mt-2">
                            <x-label class=" text-lg mt-3" for="name" value="{{ __('Correo') }}" />
                            <x-input  id="correo" wire:model="correo" class="block text-lg mt-1 w-full h-10"  name="correo" :value="old('correo')"   />
                        </div>
                        
                        <div class="grid text-3xl place-items-center my-6">
                            <x-button wire:click="actualizarDatosPublicacion" >
                                Guardar
                            </x-button>
                        </div>
                        
                    
                    </div>

                </div>
                
                
                

            </div>
        @endif

            <div>        
                @if($modalOpciones)
                    <div class=" fixed inset-0 flex items-center justify-center z-50 text-gray-800">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                        
                        <div class=" bg-white rounded-2xl  relative z-10 w-80">
                            <div class="bg-Primario m-1 rounded-xl h-8">
                            <p class="ml-3 pt-1">Hola {{ $user->name }}</p>
                                <button  wire:click="opciones2"> <img src="{{ asset('/img/x.svg') }}" width="15" height="15" alt="Descripción de la imagen" usemap="#mi-mapa" class="my-3 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 absolute inset-y-0 right-0 m-2"></button>

                            </div>
                            <div class="grid text-3xl place-items-center mt-6">
                                <x-button wire:click="editarPublicacion">
                                    Editar 
                                </x-button>
                            </div>
                            <div class="grid text-3xl place-items-center my-6">
                                <x-button wire:click="deleteCard" >
                                    Eliminar
                                </x-button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            @else
                @if(!$editarVivencia)
                <div>
                    <div class="grid place-items-center  mb-4">
                        <button  class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 mt-4" wire:click="ventanaVivencias">Regresar</button>
                    </div>
                    <h1 class="mt-4 text-2xl">Vivencias</h1>
                    @foreach($vivencias as $vivencia)
                        @if($vivencia->user->id==$user->id)
        
                            <div class="flex py-5">
                                <div class="w-1/12">
                                </div>
                                <div class="w-10/12 relative flex bg-transparent text-white border-solid border-2 border-Adicional">
                                    
                                    <button wire:click="opcionesVive({{ $vivencia->id }})"  class=" m-2 absolute inset-y-0 right-0 transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-6  items-center w-10   bg-cover " style="background-image: url('{{ asset('/img/opciones.svg') }}')"></button>
                                    
                                    <div class="w-1/6  flex justify-center items-center">
                                        <img src="data:image/jpeg;base64,{{ $vivencia->user->foto }}" width="130" alt="Descripción de la imagen" class="rounded-full my-5 ml-3">
                                    </div>
                                    <div class="w-5/6 text-gray-700">
                                        
                                        <div class="ml-4 text-justify">
                                            <p class="mt-6 ml-2 text-xl font-semibold uppercase">{{$vivencia->user->name}} {{$vivencia->user->last_name}}</p>
                                            <p class=" text-lg p-2 mr-6 mb-2">{{$vivencia->vivencia}}</p>
                                        
                                        </div>
        
        
        
                                    
                                    </div>
                                    
                                </div>
                            </div>
                        
                        @endif
                    @endforeach
                </div>
                @endif
            <div>        
                @if($modalOpcionesVive)
                    <div class=" fixed inset-0 flex items-center justify-center z-50 text-gray-800">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                        
                        <div class=" bg-white rounded-2xl  relative z-10 w-80">
                            <div class="bg-Primario m-1 rounded-xl h-8">
                            <p class="ml-3 pt-1">Hola {{ $user->name }}</p>
                                <button  wire:click="opcionesVive2"> <img src="{{ asset('/img/x.svg') }}" width="15" height="15" alt="Descripción de la imagen" usemap="#mi-mapa" class="my-3 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 absolute inset-y-0 right-0 m-2"></button>

                            </div>
                            <div class="grid text-3xl place-items-center mt-6">
                                <x-button wire:click="editarVivencia">
                                    Editar 
                                </x-button>
                            </div>
                            <div class="grid text-3xl place-items-center my-6">
                                <x-button wire:click="deleteVive" >
                                    Eliminar
                                </x-button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if($editarVivencia)
            <div class="flex py-5">
                <div class="w-1/6">
            
                </div>
                <div class="w-4/6  border-solid border-2 border-Primario">
                    <div class="flex justify-center items-center m-4 text-gray-700">
                        <textarea wire:model="vivencia"  name="comentario"  id="comentario" cols="30" rows="3" class="  w-full border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                      
                    </div>
                    <div class="grid place-items-center mb-4">
                        
                            <div class="grid text-3xl place-items-center my-6">
                                <x-button wire:click="actualizarVivencia" >
                                    Guardar
                                </x-button>
                            </div>
                            
                        
                        
                    </div>
        
                    
                    
                </div>
           </div>
           @endif
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
        Livewire.on('mensajeEliminar', function (id) {
        Swal.fire({
            title: '¿Segura que lo deseas eliminar?',
            iconHtml: '<img src="{{ asset('img/delete.svg') }}" class="custom-icon">',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            buttonsStyling: false,
            customClass:{
                icon: 'custom-icon',
                confirmButton: 'mr-5 inline-flex items-center px-4 py-2 bg-Primario border border-transparent rounded-md font-semibold text-xs text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 uppercase tracking-widest hover:bg-Secundario focus:Secundario active:bg-Secundario focus:outline-none focus:Adicional focus:bg-Secundario focus:ring-offset-2 transition ease-in-out duration-150',
                cancelButton: 'ml-5 inline-flex items-center px-4 py-2 bg-Primario border border-transparent rounded-md font-semibold text-xs text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 uppercase tracking-widest hover:bg-Secundario focus:Secundario active:bg-Secundario focus:outline-none focus:Adicional focus:bg-Secundario focus:ring-offset-2 transition ease-in-out duration-150'
            },
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarArchivo',id);
                Swal.fire({
                    
                    icon: 'success',
                    title: 'Se ha eliminado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                
            }
            });
    });
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
    Livewire.on('actializacionListaPublicacion', function () {
        Swal.fire({
            title: 'Perfecto',
            text: 'Haz actualizado tu publicación correctamente',
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
    Livewire.on('vivenciaActualizada', function () {
        Swal.fire({
            title: 'Perfecto',
            text: 'Tu vivencia esta actualizada',
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
    Livewire.on('mensajeEliminarVive', function (id) {
        Swal.fire({
            title: '¿Segura que lo deseas eliminar?',
            iconHtml: '<img src="{{ asset('img/delete.svg') }}" class="custom-icon">',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            buttonsStyling: false,
            customClass:{
                icon: 'custom-icon',
                confirmButton: 'mr-5 inline-flex items-center px-4 py-2 bg-Primario border border-transparent rounded-md font-semibold text-xs text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 uppercase tracking-widest hover:bg-Secundario focus:Secundario active:bg-Secundario focus:outline-none focus:Adicional focus:bg-Secundario focus:ring-offset-2 transition ease-in-out duration-150',
                cancelButton: 'ml-5 inline-flex items-center px-4 py-2 bg-Primario border border-transparent rounded-md font-semibold text-xs text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 uppercase tracking-widest hover:bg-Secundario focus:Secundario active:bg-Secundario focus:outline-none focus:Adicional focus:bg-Secundario focus:ring-offset-2 transition ease-in-out duration-150'
            },
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarArchivoVive',id);
                Swal.fire({
                    
                    icon: 'success',
                    title: 'Se ha eliminado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                
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

