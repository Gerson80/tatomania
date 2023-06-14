<div>
    <div class="flex h-screen">
        <div class="w-1/4 border-r border-gray-300">
            <!-- Barra lateral de contactos -->
            <div class="p-4 bg-gray-100 border-b border-gray-300">
                <h1 class="text-lg font-semibold">Chats</h1>
            </div>
            <div class="p-4">
                <!-- Lista de contactos -->
                @livewire('chat.chat-list')
            </div>
        </div>
        <div class="flex-1 flex flex-col">
            <div class="p-4 bg-gray-100 border-b border-gray-300">
                <!-- Cabecera del chat actual -->
                <h1 class="text-lg font-semibold">Nombre del chat</h1>
            </div>
            <div class="flex-1 p-4 bg-white overflow-y-auto">
                <!-- Historial de mensajes -->
                <div>
                    <div class="chat_box_container">
                        @livewire('chat.chat-box')
                    </div>
                </div>
            </div>
            <div class="p-4 bg-gray-100">
                <!-- Cuadro de entrada de mensaje -->
                @livewire('chat.send-message')
            </div>
        </div>
    </div>
</div>
