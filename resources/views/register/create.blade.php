<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register!</h1>

                <form method="POST" action="/register" class="mt-10">
                    @csrf

                    <p class="mt-8">name</p>
                    <input type="text" name="name" class="border border-gray-200 p-2 w-full rounded" autocomplete="off">

                    <p class="mt-8">username</p>
                    <input type="text" name="username" class="border border-gray-200 p-2 w-full rounded"
                           autocomplete="off">

                    <p class="mt-8">email</p>
                    <input type="text" name="email" class="border border-gray-200 p-2 w-full rounded"
                           autocomplete="off">

                    <p class="mt-8">password</p>
                    <input type="text" name="password" class="border border-gray-200 p-2 w-full rounded"
                           autocomplete="off">

                    <p class="mt-8">Submit</p>
                    <input type="submit" name="submit"
                           class="cursor-pointer bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">


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
