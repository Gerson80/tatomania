<div>
    @if($contenido==0)
    <div class="text-gray-700">
        <x-icono-mujer/>
        <div class="text-center">
            <div class="text-2xl pb-7 pt-2">
                CONTACTO
            </div>
            <div class="py-1 text-xl">
                9911236789
            </div>
    
            <div class="py-1 text-xl">
                Tatomania_oficial@gmail.com
            </div>

        </div>
        

        <div class="py-1 text-xl flex">
            <div class="w-1/4">

            </div>
            <div class="w-2/4 text-center">
                <p>
                    Sabemos que cada mujer tiene una historia única y valiente para contar. Nuestro objetivo es proporcionar una forma de mostrar tu belleza y una comunidad solidaria para que puedas encontrar consuelo y fortaleza durante este viaje.
                </p>
                
                <br/>
    
               <p>
                 Honoramos tu fuerza y ​​resiliencia mientras navegamos juntas por los altibajos emocionales que acompañan a la mastectomía. Estamos aquí para brindarte apoyo y aliento en cada paso del camino.

               </p>
                <p>
                    Recuerda que no estás sola. Juntas, podemos crear un espacio de empoderamiento y apoyo mutuo, donde todas las voces son escuchadas y valoradas. 
                </p>
               
                <p class="pt-10">
                    ¡Bienvenida a esta comunidad! Estamos aquí para ti."
                </p>
                
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
    <div class="text-gray-700">
            
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
    <div class="text-gray-700">
            
        <div>
            <div class="md:text-3xl text-base grid place-items-center">
                <x-circulo-preguntas nombre="¿Que necesito?"/>
            </div>
            <x-cuadro-pregunta titulo="Para poder acceder necesitas:" texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce congue sem euismod, pretium nibh vel, blandit orci. Nam at dolor dolor. Phasellus sit amet dignissim ligula, consequat venenatis tellus. Pellentesque blandit velit et ante blandit tempor. Suspendisse ut sollicitudin diam. Phasellus fermentum, ex id blandit placerat, sem nisi commodo augue"/>
           
        </div>
    
        
        
        
    </div>
    @elseif($contenido==3)
    <div class="text-gray-700">
            
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
    <div class="text-gray-700">
            
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
