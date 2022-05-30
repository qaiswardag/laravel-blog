<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <x-setting heading="Publish New Post"></x-setting>
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title"/>

            <x-form.input name="slug"/>

            <x-form.input name="thumbnail" type="file"/>

            <x-form.textarea name="excerpt"/>

            <x-form.textarea name="body"/>

            <hr class="mt-16 mb-12">
            <select name="category_id" id="category_id" required>
                @foreach (\App\Models\Category::all() as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >{{ ucwords($category->name) }}</option>
                @endforeach
            </select>


            {{--            <x-form.field>--}}
            {{--                <x-form.label name="category"/>--}}

            {{--                <select name="category_id" id="category_id" required>--}}
            {{--                    @foreach (\App\Models\Category::all() as $category)--}}
            {{--                        <option--}}
            {{--                            value="{{ $category->id }}"--}}
            {{--                            {{ old('category_id') == $category->id ? 'selected' : '' }}--}}
            {{--                        >{{ ucwords($category->name) }}</option>--}}
            {{--                    @endforeach--}}
            {{--                </select>--}}
            {{--                <x-form.error name="category"/>--}}
            {{--            </x-form.field>--}}

            <x-form.button>Publish</x-form.button>
        </form>
        {{--    </x-setting>--}}
    </main>
</x-layout>
