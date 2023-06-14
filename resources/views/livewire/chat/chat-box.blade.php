<div>
    <div class="bg-white rounded-lg shadow p-4">
        <ul class="space-y-2">
            @foreach($messages as $message)
            <li class="flex flex-col {{ $message->sender_id == auth()->id() ? 'items-end' : 'items-start' }}">
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">{{ $message->created_at->format('H:i') }}</span>
                    <span class="text-sm text-gray-600">{{ $message->sender->name }}</span>
                </div>
                <div class="bg-gray-200 p-2 rounded-lg">
                    <span class="text-sm text-gray-800">{{ $message->body }}</span>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
