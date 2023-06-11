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
        
    
        <div class="flex md:mx-14 md:text-3xl text-base text-gray-700 md:m-8">
            
            
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
            <x-cuadro-pregunta titulo="¿Acceder a registrar?" texto="Lo primero que tienes que hacer es dirigirte al botón que dice -Registrarme ahora- el cual está ubicado en la parte central izquierda de la ventana principal, este les mandara a un formulario el cual deberán llenar.
            La otra manera de registrarse es ingresando en el icono superior derecho, este les abrirá una ventana de Inicio de sección, en el mismo recuadro van a ver un enlace con la frase, -crear una cuenta-. Al presionarlo este mandará a un formulario el cual deberán llenar. "/>
            <x-cuadro-pregunta titulo="Procede a contestar formulario" texto="El siguiente formulario es parte del proceso de solicitud de ingreso y nos brinda información valiosa sobre tu experiencia y sentimientos en relación con la mastectomía. Estas preguntas nos ayudarán a evaluar tu solicitud de manera integral y decidir si cumples con los requisitos para unirte."/>
            <x-cuadro-pregunta titulo="Esperar que se valide la información" texto="Durante el período de validación, nuestro equipo revisará y analizará detenidamente la información que has proporcionado. Esto puede llevar algún tiempo, ya que nos aseguramos de realizar un proceso minucioso y exhaustivo. Te pedimos paciencia y comprensión mientras llevamos a cabo esta importante etapa."/>
            <x-cuadro-pregunta titulo="Una vez que se valide podras iniciar sesión" texto="Una vez que hayamos completado el proceso de validación y confirmemos que tus datos son correctos, recibirás una notificación por correo electrónico. Esta notificación te proporcionará las instrucciones necesarias para iniciar sesión en tu cuenta"/>
            
        </div>
    
        
        
        
    </div>
    @elseif($contenido==2)
    <div class="text-gray-700">
            
        <div>
            <div class="md:text-3xl text-base grid place-items-center">
                <x-circulo-preguntas nombre="¿Que necesito?"/>
            </div>
            <x-cuadro-pregunta titulo="Para poder acceder necesitas:" texto="Debido a la naturaleza íntima y personal de los temas discutidos en nuestra plataforma, hemos decidido mantener la aplicación cerrada. Esto significa que solo las mujeres que se encuentren en la situación de haber pasado por una mastectomía podrán ingresar y participar en nuestra comunidad. Esto nos permite garantizar un ambiente seguro, confidencial y libre de juicios."/>
           
        </div>
    
        
        
        
    </div>
    @elseif($contenido==3)
    <div class="text-gray-700">
            
        <div>
            <div class="md:text-3xl text-base grid place-items-center">
                <x-circulo-preguntas nombre="¿Por qué tatuarse?"/>
            </div>
            <x-cuadro-pregunta titulo="Los tatuajes son un cuidado" texto="Los tatuajes pueden considerarse una forma de cuidado personal para muchas personas, incluidas aquellas que han pasado por una mastectomía. Después de enfrentar una experiencia tan desafiante y transformadora como la mastectomía, algunas mujeres encuentran en los tatuajes una manera de expresar su individualidad y recuperar el control de su imagen corporal."/>
            <x-cuadro-pregunta titulo="Minimiza la cicatriz" texto="Los tatuajes pueden ofrecer una opción estética para minimizar la apariencia de las cicatrices resultantes de la mastectomía. Si bien los tatuajes no pueden eliminar completamente las cicatrices, pueden ayudar a camuflarlas y redirigir la atención hacia un diseño artístico."/>
            <x-cuadro-pregunta titulo="físico, estético y emocional" texto="Los tatuajes después de la mastectomía ofrecen beneficios físicos, estéticos, emocionales y de cuidado mutuo. Físicamente, pueden camuflar cicatrices y mejorar la apariencia. Estéticamente, permiten la expresión individual y la personalización del cuerpo. Emocionalmente, promueven la sanación y la aceptación del cuerpo transformado. Además, al conectarse con mujeres que han pasado por la misma situación, se crea un ambiente de cuidado mutuo que brinda apoyo y comprensión invaluable. Los tatuajes se convierten en una forma poderosa de empoderamiento y cuidado integral tanto para uno mismo como para las mujeres que comparten esta experiencia."/>
            <x-cuadro-pregunta titulo="No te conformes" texto="Los tatuajes se convierten en un canal de comunicación que trasciende las palabras y permite expresar tu historia y emociones de una manera única. A través de los diseños artísticos en tus tatuajes, puedes mostrar tu transformación, fortaleza y belleza interna. Estos tatuajes se convierten en símbolos de superación y una fuente de inspiración tanto para ti como para otras mujeres que enfrentan desafíos similares."/>
            
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
