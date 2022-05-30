@props(['comment'])

<article class="flex space-x-8 bg-gray-100 px-4 py-8 rounded-2xl space-y-6 my-6">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="" width="60" height="60"
             class="rounded-xl">
    </div>

    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->author->username }}</h3>

            <p class="text-xs">
                Posted
                <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
            </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
