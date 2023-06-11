<div>
    @if(!$modalComentario)
   <div>
        <div>
            <div class="my-4 text-center">
                <h1 class="text-gray-700 font-semibold text-2xl">Mi testimonio</h1>
            </div>
            <div class="flex py-5">
                <div class="w-1/6">
                
                </div>
                <div class="w-4/6  border-solid border-2 border-Primario">
                        <div class="flex justify-center items-center m-4 text-gray-700">
                            <textarea wire:model="vivencia"  name="comentario"  id="comentario" cols="30" rows="3" class="  w-full border-b-black autofill:bg-white border-2 border-transparent bg-white focus:border-Secundario focus:bg-white focus:outline-none"></textarea>
                        
                        </div>
                        <div class="grid place-items-center mb-4">
                            @if(!$cualVentanaEntro)
                                <div class="grid text-3xl place-items-center my-6">
                                    <x-button type="submit" wire:click="cometar" class="">
                                        Comentar
                                    </x-button>        
                                </div>
                                @endif
                                @if($cualVentanaEntro)
                                <div class="grid text-3xl place-items-center my-6">
                                    <x-button wire:click="actualizarVivencia" >
                                        Guardar
                                    </x-button>
                                </div>
                                @endif
                            
                            
                        </div>

                        
                        
                </div>
            </div>
        </div>

    @if(!$cualVentanaEntro)
    <div>
        @foreach($vivencias as $vivencia)
                
                
                <div class="flex py-5">
                    <div class="w-1/12">
                    </div>
                    <div class="w-10/12 relative flex bg-transparent text-white border-solid border-2 border-Adicional">
                        @if($vivencia->user->id==$user->id)
                        <button wire:click="opciones({{ $vivencia->id }})"  class=" m-2 absolute inset-y-0 right-0 transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-6  items-center w-10   bg-cover " style="background-image: url('{{ asset('/img/opciones.svg') }}')"></button>
                        @endif
                        <div class="w-1/6  flex justify-center items-center">
                            <img src="data:image/jpeg;base64,{{ $vivencia->user->foto }}" width="130" alt="Descripción de la imagen" class="rounded-full my-5 ml-3">
                        </div>
                        <div class="w-5/6 text-gray-700">
                            <p class="mt-6 ml-6 text-xl font-semibold uppercase">{{$vivencia->user->name}} {{$vivencia->user->last_name}}</p>
                            <div class="ml-4 text-justify">
                                
                                <p class=" text-lg p-2 mr-6 mb-2">{{$vivencia->vivencia}}</p>
                            
                            </div>
                            <div class="grid place-items-center mr-9">
                                <div class="mb-4 pr-9">
                                    <x-button type="submit" wire:click="abrirComentario({{ $vivencia->id }})" class="mx-2">
                                        {{ $vivencia->comentarios->count() }}
                                        Comentarios
                                    </x-button>
                                    <x-button type="submit"  class="mx-2">
                                        <img src="{{ asset('/img/like.svg') }}" width="15" alt="Descripción de la imagen" usemap="#mi-mapa" class="">
                                        
                                    </x-button>
                                    <x-button type="submit"  class="mx-2">
                                        enviar mensaje
                                    </x-button>

                                </div>
                            </div>


                        
                        </div>
                        
                    </div>
                </div>
            
        
        @endforeach
    </div>
    @endif
    @if($modalOpciones)
                    <div class=" fixed inset-0 flex items-center justify-center z-50 text-gray-800">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                    

                        
                        <div class=" bg-white rounded-2xl  relative z-10 w-80">
                            <div class="bg-Primario m-1 rounded-xl h-8">
                            <p class="ml-3 pt-1">Hola {{ $user->name }}</p>
                                <button  wire:click="opciones2"> <img src="{{ asset('/img/x.svg') }}" width="15" height="15" alt="Descripción de la imagen" usemap="#mi-mapa" class="my-3 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 absolute inset-y-0 right-0 m-2"></button>

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
   @endif

   @if($modalComentario)
   <div>
        <div class="flex py-5">
            <div class="w-1/12">
        
            </div>
            <div class="w-10/12  flex bg-Primario text-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                <div class="w-1/6  flex justify-center items-center">
                    <img src="data:image/jpeg;base64,{{ $img }}" width="130"  alt="Descripción de la imagen" usemap="#mi-mapa" class="rounded-full my-5 ml-3">
                </div>
                <div class="w-1/6 grid place-items-center">
                    <div class="text-center">
                        <p class=" text-lg pt-2">{{ $vivenciaComentario->user->name }}</p>
                        <p class=" text-lg " >{{$vivenciaComentario->user->last_name}}</p>

                    </div>
                
                </div>
                <div class="w-4/6 mr-3">
                    <p class="pt-4 pb-4 text-base m-1"> {{$vivenciaComentario->vivencia}}</p>
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

       @if(!$cualVentanaEntro2)
       <div>
            @foreach($comentarios as $comentario)
            
            @if($comentario->vivencia_id == $vivenciaComentarioId)
                <div class="flex py-5">
                    <div class="w-1/12">
                    </div>
                    <div class="w-10/12 relative flex bg-transparent text-white border-solid border-2 border-Adicional">
                        @if($comentario->user->id==$user->id)
                        <button wire:click="opcionesComentario({{ $comentario->id }})"  class=" m-2 absolute inset-y-0 right-0 transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-6  items-center w-10   bg-cover " style="background-image: url('{{ asset('/img/opciones.svg') }}')"></button>
                        @endif
                        <div class="w-1/6  flex justify-center items-center">
                            <img src="data:image/jpeg;base64,{{ $comentario->user->foto }}" width="130" alt="Descripción de la imagen" class="rounded-full my-5 ml-3">
                            <img src="{{ asset($img) }}" alt="Imagen">
                            {{ $comentario->user->foto }}
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
       </div>
       @endif


        @if($modalOpcionesComentario)
        <div class=" fixed inset-0 flex items-center justify-center z-50 text-gray-800">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        

            
            <div class=" bg-white rounded-2xl  relative z-10 w-80">
                <div class="bg-Primario m-1 rounded-xl h-8">
                <p class="ml-3 pt-1">Hola {{ $user->name }}</p>
                    <button  wire:click="opcionesComentario2"> <img src="{{ asset('/img/x.svg') }}" width="15" height="15" alt="Descripción de la imagen" usemap="#mi-mapa" class="my-3 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 absolute inset-y-0 right-0 m-2"></button>

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
        Livewire.on('vivenciaAgregado', function () {
        Swal.fire({
            title: 'Muy bien',
            text: 'Tu relato ayudar a otras mujeres que pasan por esa situación',
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
    Livewire.on('comentarioAgregado', function () {
        Swal.fire({
            title: 'Perfecto',
            text: 'Haz comentado esta vivencia correctamente',
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
                Livewire.emit('eliminarArchivoo',id);
                Swal.fire({
                    
                    icon: 'success',
                    title: 'Se ha eliminado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                
            }
            });
    });
    Livewire.on('contenidoActualizado', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
    });

    
    
});

</script>
<style>
    .custom-icon{
        border: 0;
    }
</style>


