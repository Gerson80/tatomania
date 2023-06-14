<div>
   <div>
      <h2 class="text-lg font-semibold mb-4">Lista de Chats</h2>
  
      <ul>
          @foreach ($conversations as $conversation)
              <li class="flex items-center py-2">
                  <img class="w-10 h-10 rounded-full mr-4" src="{{ $conversation->user->foto }}" alt="{{ $conversation->user->name }}">
                  <div>
                      <h3 class="text-base font-semibold">{{ $conversation->user->name }}</h3>
                      <p class="text-sm text-gray-500">Último mensaje: {{ $conversation->last_time_message }}</p>
                  </div>
              </li>
          @endforeach
      </ul>
  </div>
</div>
