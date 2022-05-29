<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log in!</h1>

                <form method="POST" action="/login" class="mt-10">
                    @csrf

                    <p class="mt-8">email</p>
                    <input type="email" name="email" value="{{old('email')}}" class=" border border-gray-200 p-2 w-full
                           rounded"
                           autocomplete="off">
                    @error('email')
                    <p class="text-red-500 text-sm mt2">{{$message}}</p>
                    @enderror


                    <p class="mt-8">password</p>
                    <input type="password" name="password" value="{{old('password')}}" class=" border border-gray-200 p-2
                           w-full rounded"
                           autocomplete="off">
                    @error('password')
                    <p class="text-red-500 text-sm mt2">{{$message}}</p>
                    @enderror


                    <input type="submit" name="submit" value="login"
                           class="cursor-pointer bg-blue-500 text-white uppercase font-semibold text-xs py-4 px-10 rounded hover:bg-blue-600 mt-8">


                    @if ($errors->any())
                        <ul class="bg-gray-50 rounded-xl pt-4 pb-8 px-4 mt-4">
                            @foreach($errors->all() as $error)
                                <li class="text-red-500 text-sm my-4">{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif





                    {{--                    <x-form.input name="name" required/>--}}
                    {{--                    <x-form.input name="username" required/>--}}
                    {{--                    <x-form.input name="email" type="email" required/>--}}
                    {{--                    <x-form.input name="password" type="password" autocomplete="new-password" required/>--}}
                    {{--                    <x-form.button>Sign Up</x-form.button>--}}

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
