<!-- <nav class="w-full text-gray-700">
    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="flex flex-row items-center justify-between p-4">
            <a href="#" class="text-4xl font-semibold tracking-widest text-gray-900 rounded-lg focus:outline-none focus:shadow-outline">Réclam<span class="text-[#9B4846]">Action</span> </a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
            <a class="px-4 py-2 mt-2 font-semibold rounded-full md:mt-0 md:ml-4 hover:bg-gray-200" href="\">Accueil</a>
            <a class="px-4 py-2 mt-2 font-semibold rounded-full md:mt-0 md:ml-4 hover:bg-gray-200" href="{{ route('guest_ticket.create')}}">Soumettre un Ticket</a>
            <a class="px-4 py-2 mt-2 font-semibold rounded-full md:mt-0 md:ml-4 hover:bg-gray-200" href="{{ route('guest_ticket.trackForm')}}">Suivre Mon Ticket</a>
            <a class="px-4 py-2 mt-2 font-semibold rounded-full md:mt-0 md:ml-4 hover:bg-gray-200" href="#">......</a>
            <span class="px-4 py-2 mt-2 font-bold rounded-full md:mt-0 md:ml-4 text-[#9B4846] text-xl">|</span>
            <a class="bg-[#253743] hover:bg-[#3e5f77] text-white px-4 py-2 mt-2 font-semibold rounded-full md:mt-0 md:ml-4" href="{{ route('login') }}">Se Connecter</a>

        </nav>
    </div>
</nav>
 -->

<nav class="bg-[#f7f5f4] mx-4 shadow-xl rounded-br-3xl rounded-bl-3xl hover:border-slate-400 sticky top-0 z-50">
    <div x-data="{ open: false }" class=" flex flex-wrap items-center justify-between mx-4">
        <a href="#" class="p-4 text-4xl font-semibold tracking-widest text-gray-900 rounded-lg focus:outline-none focus:shadow-outline">Réclam<span class="text-[#9B4846]">Action</span> </a>
        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        <div :class="{'flex': open, 'hidden': !open}" class="lg:block w-full flex items-center justify-between lg:w-auto sm:justify-center">

            <ul class="text-xl font-semibold text-black text-center items-center gap-x-5 pt-4 md:gap-x-4 lg:text-lg lg:flex  lg:pt-0 ">
                <li class="py-2 lg:py-0 ">
                    <a class="hover:pb-4 hover:border-b-4 hover:border-[#4D1F24]" href="/">
                        Accueil
                    </a>
                </li>
                <li class="py-2 lg:py-0 ">
                    <a class="hover:pb-4 hover:border-b-4 hover:border-[#4D1F24]" href="{{ route('guest_ticket.create')}}">
                        Soumettre un Ticket
                    </a>
                </li>
                <li class="py-2 lg:py-0 ">
                    <a class="hover:pb-4 hover:border-b-4 hover:border-[#4D1F24]" href="{{ route('guest_ticket.trackForm')}}">
                        Suivre Mon Ticket
                    </a>
                </li>
                <li class="py-2 lg:py-0 ">
                    <a class="hover:pb-4 hover:border-b-4 hover:border-[#4D1F24]" href="{{ route('login') }}">
                        Se Connecter
                    </a>
                </li>
            </ul>

        </div>

    </div>
</nav>