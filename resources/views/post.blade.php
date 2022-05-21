<x-layout>
    <x-slot name="content">
        <article>
            <h1 class="center">
                {{$post->title}}
            </h1>

            {{$post->body}}

            <a href="/">Home</a>
        </article>
    </x-slot>
</x-layout>


