<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head')

<body class="bg-[#F7F5F4]">
    @include('layouts.sidebar')

    <div class="lg:ml-64 px-6 py-8">

        <!-- search -->
        <!-- <div class="bg-[#DCD0C4] rounded-full border-none p-3 mb-4 shadow-md">
            <div class="flex items-center">
                <i class="px-3 fas fa-search ml-1"></i>
                <input type="text" placeholder="Rechercher..." class="ml-3 focus:outline-none decoration-none w-full">
            </div>
        </div> -->


        <div class="flex justify-between max-w-7xl overflow-hidden p-6 lg:gap-x-20 lg:px-24 lg:pt-0">
            <div class="m-auto lg:mx-0">
                <h2 class="font-semibold tracking-tight text-black sm:text-4xl text-3xl">
                Soumettre une requête:
                </h2>
            </div>
            <img class="h-40" src="{{ asset('img/reclamation.jpg') }}" alt="reclamation pic" />
        </div>

        <!-- <div class="rounded-xl bg-[#DCD0C4] px-16 py-10 shadow-lg max-sm:px-8">
            <div class="text-black mb-8 flex flex-col items-center gap-4">
                
                <div class="mt-5">
                    @if ($errors->any())
                    <div class="col-12">
                        @foreach ($errors->all() as $error)
                        <div class="bg-red-100 border border-red-400 text-red-700 w-full px-4 py-3 lg:px-0 mx-auto rounded relative" role="alert">
                            <strong class="font-bold">
                                {{ $error }}
                            </strong>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 w-full px-4 py-3 lg:px-0 mx-auto rounded relative" role="alert">
                        <strong class="font-bold">
                            {{ session('error') }}
                        </strong>
                    </div>
                    @endif
                    @if (session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 w-full px-4 py-3 lg:px-0 mx-auto rounded relative" role="alert">
                        <strong>
                            {{ session('success') }}
                        </strong>
                    </div>
                    @endif
                </div>

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-4 text-lg ">
                        <div class="py-2">Objet: </div>
                        <input type="text" name="objet" id="objet" placeholder="Entrez un objet" class="w-full rounded-3xl border-none bg-[#F7F5F4] px-6 py-2 text-start text-inherit placeholder-grey-500 shadow-lg outline-none backdrop-blur-md" @error('lastname') border-red-500 @enderror">
                        @error('objet')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 text-lg">
                        <div class="py-2">Description: </div>
                        <input type="text" name="description" id="description" placeholder="Ajoutez une description" class="w-full rounded-3xl border-none bg-[#F7F5F4] px-6 py-2 text-start text-inherit placeholder-grey-500 shadow-lg outline-none backdrop-blur-md" @error('firstname') border-red-500 @enderror">
                        @error('description')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap gap-4 justify-center">
                        <div class="mb-4 text-lg">
                            <div class="py-2">Priorité: </div>
                            <select name="priorite" id="priorite" class="w-full rounded-3xl border-none bg-[#F7F5F4] px-6 py-2 text-start text-inherit placeholder-grey-500 shadow-lg outline-none backdrop-blur-md" @error('role') border-red-500 @enderror">
                                <option selected disabled>Selectionnez la priorite</option>
                                <option value="Association">Association</option>
                                <option value="Club">Club</option>
                            </select>
                            @error('priorite')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 text-lg">
                            <div class="py-2">Impacte: </div>
                            <select name="impacte" id="impacte" class="w-full rounded-3xl border-none bg-[#F7F5F4] px-6 py-2 text-start text-inherit placeholder-grey-500 shadow-lg outline-none backdrop-blur-md" @error('role') border-red-500 @enderror">
                                <option selected disabled>Selectionnez l'impacte</option>
                                <option value="Association">Association</option>
                                <option value="Club">Club</option>
                            </select>
                            @error('impacte')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="px-4 pb-2 pt-4 flex justify-center">
                        <button type="submit" class="rounded-3xl bg-[#253743] px-10 py-2 text-white shadow-xl hover:bg-white hover:text-[#253743] ">
                            SOUMETTRE
                        </button>
                    </div>
                </form>

            </div>
        </div> -->

        <!-- <div class="bg-[#DCD0C4] rounded-full">

        </div> -->

        <!-- <div class="lg:flex gap-4 items-stretch">

            <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%]">
                <div class="flex justify-center items-center space-x-5 h-full">
                    <div>
                        <p>Saldo actual</p>
                        <h2 class="text-4xl font-bold text-gray-600">50.365</h2>
                        <p>25.365 $</p>
                    </div>
                    <img src="https://www.emprenderconactitud.com/img/Wallet.png" alt="wallet" class="h-24 md:h-20 w-38">
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg xs:mb-4 max-w-full shadow-md lg:w-[65%]">

            <div class="flex flex-wrap justify-between h-full">

            <div class="flex-1 bg-gradient-to-r from-cyan-400 to-cyan-600 rounded-lg flex flex-col items-center justify-center p-4 space-y-2 border border-gray-200 m-2">
                        <i class="fas fa-hand-holding-usd text-white text-4xl"></i>
                        <p class="text-white">Depositar</p>
                    </div>


                    <div class="flex-1 bg-gradient-to-r from-cyan-400 to-cyan-600 rounded-lg flex flex-col items-center justify-center p-4 space-y-2 border border-gray-200 m-2">
                        <i class="fas fa-exchange-alt text-white text-4xl"></i>
                        <p class="text-white">Transferir</p>
                    </div>


                    <div class="flex-1 bg-gradient-to-r from-cyan-400 to-cyan-600 rounded-lg flex flex-col items-center justify-center p-4 space-y-2 border border-gray-200 m-2">
                        <i class="fas fa-qrcode text-white text-4xl"></i>
                        <p class="text-white">Canjear</p>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="bg-[#DCD0C4] rounded-lg p-4 shadow-md my-4">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left border-b-2 w-full">
                            <h2 class="text-ml font-bold text-gray-600">Transacciones</h2>
                        </th>
                        <th class="px-4 py-2 text-left border-b-2 w-full">
                            <h2 class="text-ml font-bold text-gray-600">Transacciones</h2>
                        </th>
                        <th class="px-4 py-2 text-left border-b-2 w-full">
                            <h2 class="text-ml font-bold text-gray-600">Transacciones</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b w-full">
                        <td class="px-4 py-2 text-left align-top w-1/2">
                            <div>
                                <h2>Comercio</h2>
                                <p>24/07/2023</p>
                            </div>
                        </td>
                        <td class="px-4 py-2 text-right text-cyan-500 w-1/2">
                            <p><span>150$</span></p>
                        </td>
                    </tr>
                    <tr class="border-b w-full">
                        <td class="px-4 py-2 text-left align-top w-1/2">
                            <div>
                                <h2>Comercio</h2>
                                <p>24/06/2023</p>
                            </div>
                        </td>
                        <td class="px-4 py-2 text-right text-cyan-500 w-1/2">
                            <p><span>15$</span></p>
                        </td>
                    </tr>
                    <tr class="border-b w-full">
                        <td class="px-4 py-2 text-left align-top w-1/2">
                            <div>
                                <h2>Comercio</h2>
                                <p>02/05/2023</p>
                            </div>
                        </td>
                        <td class="px-4 py-2 text-right text-cyan-500 w-1/2">
                            <p><span>50$</span></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var menuButton = document.getElementById('menu-button');
        var sidebar = document.getElementById('sidebar');

        menuButton.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('lg:block');
        });
    });
</script>



</html>