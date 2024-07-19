<!-- component -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head')

<body class="bg-[#F7F5F4] bg-cover" style="background-image:  url('/img/zelij.jpg');">
    @include('layouts.sidebar')
    <div class="lg:ml-64 mx-auto py-20 px-10">
        <div class="lg:w-1/2 mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-64">
                <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                            <div class="relative">
                                <img alt="..." src="{{ asset('img/ministere_equipement_eau_logo.jpg') }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-28 mb-10">
                        <h3 class="text-4xl font-bold leading-normal text-blueGray-700 mb-2">
                            {{ $user->firstname }}  {{ $user->lastname }}
                        </h3>
                        <div class="text-lg leading-normal mt-0 mb-2 text-blueGray-400 font-bold">
                            <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                            {{ $user->email }}
                        </div>
                        <div class="mb-2 font-semibold text-blueGray-600 uppercase">
                            <i class="fas fa-university mr-2 text-xl text-blueGray-400"></i>{{ $user->role }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>