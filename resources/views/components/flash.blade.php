@if (session()->has('success'))
    <div
        class="bg-blue-500 bottom-0 fixed mb-8 mr-2 px-4 py-4 right-0 rounded-xl text-white">
        <p>{{session()->get('success')}}</p>
    </div>
@endif
