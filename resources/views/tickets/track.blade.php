<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-[#F7F5F4]">
    @guest
    @include('layouts.navbar')
    <div class="mx-auto py-12">
    @endguest

    @auth
    @include('layouts.sidebar')
    <div class="lg:ml-64 mx-auto py-20 px-10">
    @endauth
        <h2 class="text-2xl font-bold mb-6">Suivre mon ticket</h2>
        @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('guest_ticket.trackForm') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="tracking_code" class="block text-sm font-medium text-gray-700">Tracking Code</label>
                <input type="text" name="tracking_code" id="tracking_code" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Track</button>
        </form>
    </div>
</body>

</html>