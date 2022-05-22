<x-layout>
    <x-slot name="content">
        <article>
            <h1 class="center">
                {{$post->title}}
            </h1>
            <p>By
                <a href="/authors/{{$post->author->username}}">
                    {{$post->author->name}}
                </a> in
                category: <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            </p>

            {!! $post->body !!}

            <p>
                <a href="/">Back to overview</a>
            </p>
        </article>
    </x-slot>
</x-layout>


