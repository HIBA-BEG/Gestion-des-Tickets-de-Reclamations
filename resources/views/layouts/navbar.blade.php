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
                @if($userCount == 0)
                <li class="py-2 lg:py-0 ">
                    <a class="hover:pb-4 hover:border-b-4 hover:border-[#4D1F24]" href="{{ route('register') }}">
                        S'inscrire
                    </a>
                </li>
                @endif
            </ul>

        </div>

    </div>
</nav>