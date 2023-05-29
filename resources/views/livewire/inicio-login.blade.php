<div>
   <div class="flex justify-center items-center mt-7">
    <div class="text-center text-xl w-2/3">
        <p>Los tatuajes después de la mastectomía pueden ser una forma significativa de encontrar belleza y empoderamiento después de una experiencia difícil</p>
    </div>
   </div>
   <div class="flex justify-center items-center mt-2">
        <x-button  wire:click="" class="my-4">
            Crear
        </x-button>
    </div>
    <div class="flex justify-center items-center my-4 text-gray-600 hover:text-black">
        <a href="{{ route('iniciologin') }}" class="mx-5">
            <p class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110"> Varios</p>
        </a>
        <a href="{{ route('acerca') }}" class="mx-5">
            <p class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110"> Flores</p>
        </a>
        <a href="{{ route('acerca') }}" class="mx-5">
            <p class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110"> Animales</p>
        </a>
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
                <div class="h-96 container my-2 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                    <div class="h-56 bg-neutral-200 relative">
                        <img src="{{ $publicacion->foto }}" alt="" class="w-full h-full rounded-t-lg">
                        <button wire:click="actualizarContenido2" class=" m-2 absolute inset-y-0 right-0 transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-6  items-center w-10   bg-cover " style="background-image: url('{{ asset('/img/opciones.svg') }}')"></button>
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
                        <button class="bg-Gris rounded-xl px-3 w-full py-2 hover:bg-Primario transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">La publicación tiene {{ $publicacion->comentariostatus->count() }} comentarios </button>
                        
                    </div>
                    
                </div>
                @endforeach

                
                
            </div>


        </div>
        
        
       
    </div>





</div>
