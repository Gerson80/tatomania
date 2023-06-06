<div>
    @if($contenido==0)
    <div>
        <div class="flex w-full mt-2">
            <div class="bg-Secundario w-2/3 text-gray-800">
                <div class="h-1/4 ">
                </div>
    
                <div class="flex">
                    <div class="w-1/6">
    
                    </div>
                    <p class="text-5xl text-gray-800">¡HOLA HERMOSA!</p>
                </div>
    
                <div class="flex pt-6">
                    <div class="w-1/6">
                    </div>                           
                    <p>“ERES AMOR, ERES FUENTE DE VIDA, ERES FUERTE”</p>
                </div>
    
                <div class="flex pt-6">
                    <div class="w-1/6">
                    </div>                           
                    <a href="{{ route('registro') }}" class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 bg-white hover:bg-gray-100 text-gray-800  py-2 px-4 border border-gray-400 rounded shadow">Registrarme ahora</a>
                    
                </div>
        
            </div>
            <div class="w-1/3">
                <img src="{{ asset('/img/bienvenida.svg') }}" width="100%"  alt="Descripción de la imagen" usemap="#mi-mapa" >
                    
            </div>
    
        </div>
        <div class="w-full text-center text-5xl text-gray-800 mt-5">
            PUEDES AMAR
        </div>
        <div class="w-full text-center text-5xl text-gray-800">
            ♡
        </div>
        <div class="text-center text-xl">
            <p>"Tu belleza trasciende cualquier definición superficial. Eres una prueba viviente de fortaleza y amor propio. "</p>
        </div>
        <div class="border-2 border-transparent border-b-gray-800/30">
            <div class="flex pt-4 mx-10 ">
                <div class="w-1/3 m-4 shadow">
                    <img src="{{ asset('/img/bienvenida2.svg') }}" width="100%"  alt="Descripción de la imagen" usemap="#mi-mapa" >
                </div>
                <div class="w-1/3 m-4 shadow">
                    <img src="{{ asset('/img/bienvenida1.svg') }}" width="100%"  alt="Descripción de la imagen" usemap="#mi-mapa" >
                </div>
                <div class="w-1/3 m-4 shadow">
                    <img src="{{ asset('/img/bienvenida3.svg') }}" width="100%"  alt="Descripción de la imagen" usemap="#mi-mapa" >
                </div>
                
            </div>
    
        </div>
        
    
        <div class="flex md:mx-14 md:text-3xl text-base  md:m-8">
            
            
            <div class="w-1/4 ">
                
                <button wire:click="actualizarContenido"  class="transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-60  items-center w-60 m-2 sm:m-8 bg-cover rounded-full" style="background-image: url('{{ asset('/img/circulo.png') }}')">
                    <div class="text-center">
                        <p class=""> ¿Cómo inicio?</p>
                    </div> 
                </button>
            </div>
            <div class="w-1/4">
                <button wire:click="actualizarContenido2"  class="transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-60  items-center w-60 m-2 sm:m-8 bg-cover rounded-full" style="background-image: url('{{ asset('/img/circulo.png') }}')">
                    <div class="text-center">
                        <p class="">¿Que necesito?</p>
                    </div> 
                </button>
            </div>
            <div class="w-1/4">
                <button wire:click="actualizarContenido3"  class="transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-60  items-center w-60 m-2 sm:m-8 bg-cover rounded-full" style="background-image: url('{{ asset('/img/circulo.png') }}')">
                    <div class="text-center">
                        <p class="">¿Por qué tatuarse?</p>
                    </div> 
                </button>
                
            </div>
            <div class="w-1/4">
                <button wire:click="actualizarContenido4"  class="transition  duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex justify-center h-0  sm:h-60  items-center w-60 m-2 sm:m-8 bg-cover rounded-full" style="background-image: url('{{ asset('/img/circulo.png') }}')">
                    <div class="text-center">
                        <p class="">Riesgos</p>
                    </div> 
                </button>
                
            </div>
    
            
        </div>
        
    
    </div>
    @elseif($contenido==1)
    <div>
            
        <div>
            <div class="md:text-3xl text-base grid place-items-center">
                <x-circulo-preguntas nombre="¿Cómo inicio?"/>
            </div>
            <x-cuadro-pregunta titulo="¿Acceder a registrar?" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            <x-cuadro-pregunta titulo="Procede a contestar formulario" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            <x-cuadro-pregunta titulo="Esperar que se valide la información" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            <x-cuadro-pregunta titulo="Una vez que se valide podras iniciar sesión" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            
        </div>
    
        
        
        
    </div>
    @elseif($contenido==2)
    <div>
            
        <div>
            <div class="md:text-3xl text-base grid place-items-center">
                <x-circulo-preguntas nombre="¿Que necesito?"/>
            </div>
            <x-cuadro-pregunta titulo="Para poder acceder necesitas:" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
           
        </div>
    
        
        
        
    </div>
    @elseif($contenido==3)
    <div>
            
        <div>
            <div class="md:text-3xl text-base grid place-items-center">
                <x-circulo-preguntas nombre="¿Por qué tatuarse?"/>
            </div>
            <x-cuadro-pregunta titulo="Los tatuajes son un cuidado" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            <x-cuadro-pregunta titulo="Minimiza la cicatriz" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            <x-cuadro-pregunta titulo="físico, estético y emocional" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            <x-cuadro-pregunta titulo="No te conformes" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            
        </div>
    
        
        
        
    </div>
    @else
    <div>
            
        <div>
            <div class="md:text-3xl text-base grid place-items-center">
                <x-circulo-preguntas nombre="Riesgos"/>
            </div>
            <x-cuadro-pregunta titulo="¿Acceder a registrar?" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            <x-cuadro-pregunta titulo="Procede a contestar formulario" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            <x-cuadro-pregunta titulo="Esperar que se valide la información" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            <x-cuadro-pregunta titulo="Una vez que se valide podras iniciar sesión" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
            
        </div>
    
        
        
        
    </div>
    
    @endif

    
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
