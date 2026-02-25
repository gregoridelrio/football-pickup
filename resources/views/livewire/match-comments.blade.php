<div>
    <h2 class="text-xl font-bold mb-4">Comentarios ({{ $comments->count() }})</h2>

    @auth
    <div class="mb-6 bg-gray-50 p-4 rounded border border-gray-200">
        <form wire:submit.prevent="addComment">
            <textarea wire:model="content" placeholder="Escribe un comentario..." rows="3"
                class="w-full border border-gray-300 rounded px-3 py-2 mb-2"></textarea>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Comentar
            </button>
        </form>
    </div>
    @endauth

    @if($comments->isEmpty())
    <p class="text-gray-500">No hay comentarios.</p>
    @else
    <div class="space-y-4">
        @foreach($comments as $comment)
        <div class="bg-white p-4 rounded border border-gray-200">
            <div class="flex items-start gap-3">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="font-bold text-gray-800">{{ $comment->user->name }}</span>
                        <span class="text-sm text-gray-500">{{ $comment->created_at }}</span>
                    </div>
                    <p class="text-gray-700">{{ $comment->content }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>