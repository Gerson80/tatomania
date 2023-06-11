<div>
    @if(!$modalDatosPublicacion)
        
        @if(!$modalAgregar)
        <div class="flex justify-center items-center mt-7">
            <div class="text-center text-xl w-2/3 text-gray-700">
                <p>Los tatuajes después de la mastectomía pueden ser una forma significativa de encontrar belleza y empoderamiento después de una experiencia difícil</p>
            </div>
        </div>
        <div class="flex justify-center items-center mt-2">
                <x-button  wire:click="agregarNuevo" class="my-4">
                    Crear
                </x-button>
            </div>
            <div class="flex justify-center items-center my-4 text-gray-600 hover:text-black">
                <button  wire:click="$set('selectedCategory', '')" class="mx-5">
                    <p class="btn {{ $selectedCategory == '' ? ' text-Adicional' : 'transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110' }}"> Varios</p>
                </button>
                <button  wire:click="$set('selectedCategory', 'flores')" class="mx-5">
                    <p class="btn {{ $selectedCategory == 'flores' ? ' text-Adicional' : 'transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110' }}"> Flores</p>
                </button>
                <button  wire:click="$set('selectedCategory', 'animales')" class="mx-5">
                    <p class="btn {{ $selectedCategory == 'animales' ? ' text-Adicional' : 'transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110' }}"> Animales</p>
                </button>
            </div>


            <div>        
                @if($modalVisible)
                    <div class=" fixed inset-0 flex items-center justify-center z-50 text-gray-800">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                    

                        
                        <div class=" bg-white rounded-xl  relative z-10 w-128">
                            <div class="grid grid-cols-6 bg-Primario rounded-t-lg ">
                                <div class="col-span-2 border-4 border-transparent border-r-white">
                                    <div class="py-4 px-6">
                                        <img src="{{ asset('/img/imgi.svg') }}" width="200px"  alt="Descripción de la imagen" usemap="#mi-mapa" >
                                    </div>
                                </div>
                                <div class="grid grid-rows-2 col-span-4">
                                    <div class="px-16 pt-16">
                                        <div class="text-center text-5xl border-4 border-transparent border-b-white">
                                        <p> OH AHÍ </p>
                                        <p>¡ESTAS!</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mx-16 mt-9 text-xl text-center">
                                            <p >“Su lucha nos inspira a nunca rendirnos y a siempre seguir adelante en cada adversidad”</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Contenido de la ventana modal -->
                            <h2 class="text-2xl font-bold text-center mt-5">CUENTAME TU HISTORIA</h2>
                            <div class="grid place-items-center my-5">
                                <x-button wire:click="toggleModal"  class="">
                                    Aceptar
                                </x-button>
                            </div>
                            
                        </div>
                    </div>
                @endif
            </div>


            
            <div class="grid grid-cols-12">
                <div class="col-start-2 col-span-10">

                    <div class="grid grid-cols-3 gap-10 ">
                        @foreach($publicaciones as $publicacion)
                        @if($publicacion->autorizado=="si")
                            @if ($selectedCategory ===  strtolower( $publicacion->categoria))

                            <div class="h-96 container my-2 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                                <div  class="h-56 bg-neutral-200 relative">
                                    <img src="data:image/jpeg;base64,{{ $publicacion->foto }}" alt="imagen" class="w-full h-full rounded-t-lg">
                                    @if($publicacion->user->id==$user->id)
                                    <button wire:click="opciones({{ $publicacion->id }})"  class=" m-2 absolute inset-y-0 right-0 transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-6  items-center w-10   bg-cover " style="background-image: url('{{ asset('/img/opciones.svg') }}')"></button>
                                    @endif
                                
                                </div>
                                <div class="flex my-3 text-xl uppercase mx-3">
                                    <div class="w-5/6">  <p> {{ $publicacion->user->name }} &nbsp {{ $publicacion->user->last_name }}</p></div>
                                    <div class="w-1/6 relative">  <button wire:click="actualizarContenido2"  class="absolute inset-y-0 right-0 transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-10  items-center w-12   bg-cover " style="background-image: url('{{ asset('/img/mensaje.svg') }}')"></button></div>
                                    
                                </div>
                                
                                <div class="flex justify-center items-center">
                                    
                                    <p class="mr-2 inline-flex items-center px-2 py-1 bg-Secundario border border-transparent rounded-md font-semibold text-xs text-white  tracking-widest    ">Tatuador</p>
                                    <p class="ml-2">{{ $publicacion->name }} &nbsp {{ $publicacion->last_name }}</p>
                                </div> 
                                <div class=" text-l mt-5 mx-3">
                                    <button wire:click="mostrarCPublicacion({{ $publicacion->id }})" class="bg-Gris rounded-xl px-3 w-full py-2 hover:bg-Primario transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">La publicación tiene {{ $publicacion->comentariostatus->count() }} comentarios </button>
                                    
                                </div>
                                
                            </div>
                            @endif
                            @empty($selectedCategory)
                                <div class="h-96 container my-2 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                                    <div  class="h-56 bg-neutral-200 relative">
                                        <img src="data:image/jpeg;base64,{{ $publicacion->foto }}" alt="imagen" class="w-full h-full rounded-t-lg">
                                        @if($publicacion->user->id==$user->id)
                                        <button wire:click="opciones({{ $publicacion->id }})"  class=" m-2 absolute inset-y-0 right-0 transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-6  items-center w-10   bg-cover " style="background-image: url('{{ asset('/img/opciones.svg') }}')"></button>
                                        @endif
                                    
                                    </div>
                                    <div class="flex my-3 text-xl uppercase mx-3">
                                        <div class="w-5/6">  <p> {{ $publicacion->user->name }} &nbsp {{ $publicacion->user->last_name }}</p></div>
                                        <div class="w-1/6 relative">  <button wire:click="actualizarContenido2"  class="absolute inset-y-0 right-0 transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-10  items-center w-12   bg-cover " style="background-image: url('{{ asset('/img/mensaje.svg') }}')"></button></div>
                                        
                                    </div>
                                    
                                    <div class="flex justify-center items-center">
                                        
                                        <p class="mr-2 inline-flex items-center px-2 py-1 bg-Secundario border border-transparent rounded-md font-semibold text-xs text-white  tracking-widest    ">Tatuador</p>
                                        <p class="ml-2">{{ $publicacion->name }} &nbsp {{ $publicacion->last_name }}</p>
                                    </div> 
                                    <div class=" text-l mt-5 mx-3">
                                        <button wire:click="mostrarCPublicacion({{ $publicacion->id }})" class="bg-Gris rounded-xl px-3 w-full py-2 hover:bg-Primario transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">La publicación tiene {{ $publicacion->comentariostatus->count() }} comentarios </button>
                                        
                                    </div>
                                    
                                </div>
                            @endempty
                        @endif
                        @endforeach

                        
                        
                    </div>


                </div>
                
                
            
            </div>

            <div>        
                @if($modalOpciones)
                    <div class=" fixed inset-0 flex items-center justify-center z-50 text-gray-800">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                    

                        
                        <div class=" bg-white rounded-2xl  relative z-10 w-80">
                            <div class="bg-Primario m-1 rounded-xl h-8">
                            <p class="ml-3 pt-1">Hola {{ $user->name }}</p>
                                <a  wire:click="opciones2"> <img src="{{ asset('/img/x.svg') }}" width="15" height="15" alt="Descripción de la imagen" usemap="#mi-mapa" class="my-3 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 absolute inset-y-0 right-0 m-2"></a>

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
            @endif


            @if($modalAgregar)
            <div class="m-10 border-2 border-Adicional">
                <div class="text-center text-2xl mt-3">
                    <h1>Foto</h1>
                </div>
                <div class="grid place-items-center">
                    <div class="flex items-center border-2 border-Primario">
                        <label for="imagen" class="cursor-pointer">
                            <input type="file" id="imagen" wire:model="imagen" class="hidden" style="background-image: url('{{ asset('/img/subir.svg') }}')">
                            <div class="w-48 h-48  bg-transparent flex items-center justify-center">
                                @if(!$cualVentanaEntro)
                                    @if ($imagen)
                                    
                                        <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen seleccionada" class="w-48 h-48 ">
                                    @else
                                        <img src="{{ asset('/img/subir.svg') }}" alt="">
                                    @endif
                                @else
                                    @if ($imagen)
                                        <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen seleccionada" class="w-48 h-48 ">
                                        
                                    @elseif ($imagen2)
                                        <img src="data:image/jpeg;base64,{{ $imagen2 }}" alt="">

                                    @else
                                        <img src="{{ asset('/img/subir.svg') }}" alt="">
                                    @endif
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
                        @if(!$cualVentanaEntro)
                        <div class="grid text-3xl place-items-center my-6">
                            <x-button wire:click="enviarDatos" >
                                Guardar
                            </x-button>
                        </div>
                        @endif
                        @if($cualVentanaEntro)
                        <div class="grid text-3xl place-items-center my-6">
                            <x-button wire:click="actualizarDatos" >
                                Guardar
                            </x-button>
                        </div>
                        @endif
                    
                    </div>

                </div>
                
                
                

            </div>
        @endif
    @endif



    
    
    @if($modalDatosPublicacion)
    <div>
        <div class="flex py-5">
            <div class="w-1/12">
        
            </div>
            <div class="w-10/12  flex bg-Primario text-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                <div class="w-1/6  flex justify-center items-center">
                    <img src="{{ asset('/img/tatuador3.svg') }}" width="130"  alt="Descripción de la imagen" usemap="#mi-mapa" class="rounded-full my-5 ml-3">
                </div>
                <div class="w-1/6 grid place-items-center">
                    <div class="text-center">
                        <p class=" font-semibold text-lg">Tatuador</p>
                        <p class=" text-lg pt-2">{{ $nombre }}</p>
                        <p class=" text-lg " >{{ $apellidos }}</p>

                    </div>
                   
                </div>
                <div class="w-4/6 mr-3">
                    <p class=" font-semibold pt-4 text-base ">Experiencia de {{$nombrePublico}}</p>
                    <p class="pt-1 text-base ">{{$cuentame}}</p>
                    <p class="  font-semibold pt-4 text-base ">Contacto</p>
                    <p class="pt-1 text-base ">Numero: {{$numero}}</p>
                    <p class="pt-1 pb-4 text-base ">Correro: {{$correo}}</p>
                </div>
                
            </div>
        </div>

        <div class="flex py-5">
                <div class="w-1/6">
            
                </div>
                <div class="w-4/6  border-solid border-2 border-Secundario">
                    <div class="flex justify-center items-center mt-4">
                        <img src="data:image/jpeg;base64,{{ $imagen2 }}" alt="">
                      
                    </div>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-start-2 col-span-10 text-gray-700 text-justify">
                            <p class=" text-lg p-2">{{$historia}}</p>
                        </div>
                       
                    </div>
                    
                    
                </div>
        </div>
        <div class="flex py-5">
            <div class="w-1/6">
        
            </div>
            <div class="w-4/6  border-solid border-2 border-Primario">
                <div class="flex justify-center items-center m-4 text-gray-700">
                    <textarea wire:model="comentario"  name="comentario"  id="comentario" cols="30" rows="3" class="  w-full border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                  
                </div>
                <div class="grid place-items-center mb-4">
                    @if(!$cualVentanaEntro2)
                        <div class="grid text-3xl place-items-center my-6">
                            <x-button type="submit" wire:click="cometarPublicacion" class="">
                                Comentar
                            </x-button>        
                        </div>
                        @endif
                        @if($cualVentanaEntro2)
                        <div class="grid text-3xl place-items-center my-6">
                            <x-button wire:click="actualizarComentario" >
                                Guardar
                            </x-button>
                        </div>
                        @endif
                    
                    
                </div>
    
                
                
            </div>
       </div>

        @foreach($comentarios as $comentario)
        
        @if($comentario->publicacionestatu_id == $selectedCardId)
            <div class="flex py-5">
                <div class="w-1/12">
                </div>
                <div class="w-10/12 relative flex bg-transparent text-white border-solid border-2 border-Adicional">
                    @if($comentario->user->id==$user->id)
                    <button wire:click="opcionesComentario({{ $comentario->id }})"  class=" m-2 absolute inset-y-0 right-0 transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-6  items-center w-10   bg-cover " style="background-image: url('{{ asset('/img/opciones.svg') }}')"></button>
                    @endif
                    <div class="w-1/6  flex justify-center items-center">
                        <img src="data:image/jpeg;base64,{{ $comentario->user->foto }}" width="130" alt="Descripción de la imagen" class="rounded-full my-5 ml-3">
                        
                    </div>
                    <div class="w-5/6 text-gray-700">
                        <p class="mt-6 ml-6 text-xl font-semibold uppercase">{{$comentario->user->name}} {{$comentario->user->last_name}}</p>
                        <div class="ml-4 text-justify">
                            
                            <p class=" text-lg p-2 mr-6 mb-2">{{$comentario->comentario}}</p>
                        
                        </div>
                        <div class="grid place-items-center mr-9">
                            <div class="mb-4 pr-9">
                                <x-button type="submit"  class="mx-2">
                                    <img src="{{ asset('/img/like.svg') }}" width="15" alt="Descripción de la imagen" usemap="#mi-mapa" class="">
                                    @foreach($meGusta as $me)
                                    @if($comentario->id == $me->comentariostatu_id)
                                    {{$me->valor}}
                                    @endif
                                    @endforeach
                                </x-button>
                                <x-button type="submit"  class="mx-2">
                                    enviar mensaje
                                </x-button>

                            </div>
                        </div>


                    
                    </div>
                    
                </div>
            </div>
        @endif
       
        @endforeach

        @if($modalOpcionesComentario)
                    <div class=" fixed inset-0 flex items-center justify-center z-50 text-gray-800">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                    

                        
                        <div class=" bg-white rounded-2xl  relative z-10 w-80">
                            <div class="bg-Primario m-1 rounded-xl h-8">
                            <p class="ml-3 pt-1">Hola {{ $user->name }}</p>
                                <a  wire:click="opcionesComentario2"> <img src="{{ asset('/img/x.svg') }}" width="15" height="15" alt="Descripción de la imagen" usemap="#mi-mapa" class="my-3 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 absolute inset-y-0 right-0 m-2"></a>

                            </div>
                            <div class="grid text-3xl place-items-center mt-6">
                                <x-button wire:click="editarComentario">
                                    Editar 
                                </x-button>
                            </div>
                            <div class="grid text-3xl place-items-center my-6">
                                <x-button wire:click="deleteCard2" >
                                    Eliminar
                                </x-button>
                            </div>
                            
                            
                            
                        </div>
                    </div>
            @endif
        



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
    Livewire.on('mensajeEnviado', function () {
        Swal.fire({
            title: 'Enviado',
            text: 'Su publicación se va a evaluar, le avisamos cuando se autorize',
            iconHtml: '<img src="{{ asset('img/icono-error.svg') }}" class="custom-icon">',
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
    Livewire.on('actializacionLista', function () {
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
    Livewire.on('comentarioAgregado', function () {
        Swal.fire({
            title: 'Perfecto',
            text: 'Haz comentado esta publicación correctamente',
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
    Livewire.on('actualComentario', function () {
        Swal.fire({
            title: 'Perfecto',
            text: 'Haz actualizado tu comentario correctamente',
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
    Livewire.on('mensajeEliminar2', function (id) {
        Swal.fire({
                    
                    icon: 'success',
                    title: 'Se ha eliminado correctamente',
                    showConfirmButton: false,
                    timer: 2500
                })
                location.reload();
    });
    
});

</script>
<style>
    .custom-icon{
        border: 0;
    }
</style>

