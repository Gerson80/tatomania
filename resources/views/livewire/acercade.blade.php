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
            <x-cuadro-pregunta titulo="Tiempo de espera para donar sangre" texto="La mayoría de los organismos reguladores de la donación de sangre, como la Cruz Roja y otros bancos de sangre, tienen políticas establecidas con respecto a la donación de sangre después de hacerse un tatuaje. En general, se suele requerir un período de espera de entre 3 y 12 meses, dependiendo del país y de las políticas específicas del banco de sangre.

            Esto se debe a que los tatuajes pueden generar pequeñas heridas en la piel que pueden tardar en curarse por completo, y durante ese tiempo existe el riesgo de infección. Además, algunos colores de tinta utilizados en los tatuajes pueden contener sustancias que podrían afectar la calidad de la sangre donada."/>
            <x-cuadro-pregunta titulo="Anemia" texto="Los tatuajes en sí no causan anemia. La anemia es una condición médica que se caracteriza por una disminución en el número de glóbulos rojos o en los niveles de hemoglobina en la sangre, lo que lleva a una capacidad reducida de transporte de oxígeno."/>
            <x-cuadro-pregunta titulo="Reacción alérgica " texto="Es posible experimentar reacciones alérgicas después de hacerse un tatuaje. Estas reacciones pueden variar en gravedad y presentarse de diferentes maneras. Algunas personas pueden experimentar enrojecimiento, hinchazón o picazón en el área del tatuaje, mientras que otras pueden desarrollar una erupción cutánea o ampollas."/>
            
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
