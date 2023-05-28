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
                <a href="{{ route('') }}" class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 bg-white hover:bg-gray-100 text-gray-800  py-2 px-4 border border-gray-400 rounded shadow">Registrarme ahora</a>
                
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
            <x-circulo-acerca wire:click="enviarEvento" ruta="preguntas" nombre="¿Cómo inicio?" />
        </div>
        <div class="w-1/4">
            <x-circulo-acerca ruta="preguntas" nombre="¿Que necesito?" />
        </div>
        <div class="w-1/4">
            <x-circulo-acerca ruta="preguntas" nombre="¿Por qué tatuarse?" />
        </div>
        <div class="w-1/4">
            <x-circulo-acerca ruta="preguntas" nombre="Riesgos" />
        </div>

        
    </div>
    

</div>