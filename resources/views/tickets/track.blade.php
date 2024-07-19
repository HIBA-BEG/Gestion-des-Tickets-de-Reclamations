<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-[#F7F5F4] bg-cover bg-no-repeat" style="background-image:  url('/img/zelij.jpg');">
    @guest
    @include('layouts.navbar')
    <div class="flex flex-col items-center m-auto">
        @endguest

        @auth
        @include('layouts.sidebar')
        <div class="lg:ml-64 flex flex-col items-center m-auto py-20">
            @endauth
            <div class="lg:mx-8 py-4 mt-10">
                <h2 class="font-semibold tracking-tight text-black sm:text-4xl text-3xl">
                    Suivre mon ticket:
                </h2>
            </div>
            @if ($errors->any())
            <div class="bg-red-500 text-white p-4 mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="w-1/2 m-10 bg-[hsla(0,0%,100%,0.75)] shadow-md rounded-lg p-6">
                <form action="{{ route('guest_ticket.trackForm') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="tracking_code" class="block font-medium text-gray-700">Code de suivi</label>
                        <input type="text" name="tracking_code" id="tracking_code" class="mt-1 block w-full border border-gray-300 p-2 rounded-full shadow-sm">
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="bg-[#253743] hover:bg-[#3e5f77] text-white px-4 py-2 font-semibold rounded-full">Track</button>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>