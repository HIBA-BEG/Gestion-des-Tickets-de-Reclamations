<nav class="bg-white fixed top-0 z-10 w-full border-b border-gray-300">
    <div class="flex justify-between items-center px-9  py-4 ">
        <!-- menu -->
        <button id="menu-button" class="lg:hidden">
            <i class="fas fa-bars text-[#9B4846] text-lg"></i>
        </button>
        <!-- Logo -->
        <div class="ml-1">
            <a href="#" class="text-4xl font-semibold tracking-widest text-gray-900 rounded-lg focus:outline-none focus:shadow-outline">Réclam<span class="text-[#9B4846]">Action</span> </a>
        </div>

        <!-- notifications -->
        <div class="space-x-4">
            <button>
                <i class="fas fa-bell text-[#9B4846] text-lg"></i>
            </button>

            <!-- profile -->
            <button>
                <i class="fas fa-user text-[#9B4846] text-lg"></i>
            </button>
        </div>
    </div>
</nav>


<div id="sidebar" class="lg:block hidden bg-[#F7F5F4] border-r border-[#9B4846] w-64 pt-20 h-screen fixed rounded-none">

    <div class="p-4 space-y-4 ">

        <a href="{{ route('indexTickets')}}" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-lg text-gray-600 bg-[#DCD0C4]">
            <i class="fas fa-home text-gray-600"></i>
            <span class="-mr-1 font-medium">Tableau de Bord</span>
        </a>
        <a href="{{ route('guest_ticket.create')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
            <i class="fas fa-gift"></i>
            <span>Soumettre un Ticket</span>
        </a>
        </a>
        <a href="{{ route('guest_ticket.trackForm')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
            <i class="fas fa-store"></i>
            <span>Suivre Mon Ticket</span>
        </a>

        <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
            <i class="fas fa-wallet"></i>
            <span>.........................</span>
        </a>
        <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
            <i class="fas fa-exchange-alt"></i>
            <span>Calendrier</span>
        </a>
        <!-- <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
            <i class="fas fa-user"></i>
            <span>Calendrier</span>
        </a> -->
        <div class="flex justify-center container mx-auto p-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-[#253743] hover:bg-[#3e5f77] text-white px-4 py-2 mt-2 font-semibold rounded-full md:mt-0 md:ml-4 uppercase " data-ripple-light="true">
                    <i class="fas fa-sign-out-alt"></i>
                    LOGOUT
                </button>
            </form>
        </div>
    </div>
</div>