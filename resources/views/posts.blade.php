<x-layout>

    @include('_post-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div>
            <x-post-featured-card :post="$posts[0]"></x-post-featured-card>
        </div>

        <div class="lg:grid lg:grid-cols-2">

            @foreach($posts->skip(1) as $post)
                <x-post-card :post="$post"></x-post-card>
            @endforeach
        </div>
    </main>


</x-layout>


