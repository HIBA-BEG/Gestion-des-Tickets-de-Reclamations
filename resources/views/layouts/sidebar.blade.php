<style>
    #sidebar a.active {
        background: #DCD0C4;
        background-color: #DCD0C4;
    }
</style>

<nav id="navbar" class="bg-white fixed top-0 z-10 w-full border-b border-gray-300">
    <div class="flex justify-between items-center px-9  py-4 ">
        <!-- menu -->
        <button id="menu-button" class="lg:hidden">
            <i class="fas fa-bars text-[#9B4846] text-lg"></i>
        </button>
        <!-- Logo -->
        <div class="ml-1">
            <a href="#" class="text-4xl font-semibold tracking-widest text-gray-900 rounded-lg focus:outline-none focus:shadow-outline">Réclam<span class="text-[#9B4846]">Action</span> </a>
        </div>

        <div class="space-x-4">
            <button>
                <a href="{{ route('profile.showProfile')}}">
                    <i class="fas fa-user text-[#9B4846] text-lg">  Mon Profile</i>
                </a>
            </button>
        </div>
    </div>
</nav>


<div id="sidebar" class="lg:block hidden bg-[#F7F5F4] border-r border-[#9B4846] w-64 pt-20 h-screen fixed rounded-none">

    <div class="p-4 space-y-4 ">

        <a href="{{ route('indexTickets')}}" aria-label="dashboard" class="nav-link relative px-4 py-3 flex items-center space-x-4 rounded-lg text-gray-600 hover:bg-[#DCD0C4] active:opacity-[0.85] active:shadow-none">
            <i class="fas fa-home text-gray-600"></i>
            <span class="font-medium">Tableau de Bord</span>
        </a>
        <a href="{{ route('guest_ticket.create')}}" class="nav-link px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:bg-[#DCD0C4] active:opacity-[0.85] active:shadow-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5">
                <path fill="#6e6e6e" d="M352 224H305.5c-45 0-81.5 36.5-81.5 81.5c0 22.3 10.3 34.3 19.2 40.5c6.8 4.7 12.8 12 12.8 20.3c0 9.8-8 17.8-17.8 17.8h-2.5c-2.4 0-4.8-.4-7.1-1.4C210.8 374.8 128 333.4 128 240c0-79.5 64.5-144 144-144h80V34.7C352 15.5 367.5 0 386.7 0c8.6 0 16.8 3.2 23.2 8.9L548.1 133.3c7.6 6.8 11.9 16.5 11.9 26.7s-4.3 19.9-11.9 26.7l-139 125.1c-5.9 5.3-13.5 8.2-21.4 8.2H384c-17.7 0-32-14.3-32-32V224zM80 96c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16H400c8.8 0 16-7.2 16-16V384c0-17.7 14.3-32 32-32s32 14.3 32 32v48c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V112C0 67.8 35.8 32 80 32h48c17.7 0 32 14.3 32 32s-14.3 32-32 32H80z" />
            </svg>
            <span class="font-medium">Soumettre un Ticket</span>
        </a>
        </a>
        <a href="{{ route('guest_ticket.trackForm')}}" class="nav-link px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:bg-[#DCD0C4] active:opacity-[0.85] active:shadow-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="w-5">
                <path fill="#6e6e6e" d="M88 216c81.7 10.2 273.7 102.3 304 232H0c99.5-8.1 184.5-137 88-232zm32-152c32.3 35.6 47.7 83.9 46.4 133.6C249.3 231.3 373.7 321.3 400 448h96C455.3 231.9 222.8 79.5 120 64z" />
            </svg>
            <span class="font-medium">Suivre Mon Ticket</span>
        </a>

        @if (auth()->user()->role == 'Responsable')
        <a href="{{ route('tickets.archived') }}" class="nav-link px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:bg-[#DCD0C4] active:opacity-[0.85] active:shadow-none">
            <svg class="w-5 h-5 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
            </svg>
            <span class="font-medium">Tickets archivés</span>
        </a>
        <a href="{{ route('statistics.index')}}" class="nav-link px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:bg-[#DCD0C4] active:opacity-[0.85] active:shadow-none">
            <i class="fas fa-wallet"></i>
            <span class="font-medium">Statistiques</span>
        </a>
        <a href="{{ route('AllUsers')}}" class="nav-link px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:bg-[#DCD0C4] active:opacity-[0.85] active:shadow-none">
            <i class="fas fa-users"></i>
            <span class="font-medium">Tous les utilisateurs</span>
        </a>
        <a href="{{ route('register')}}" class="nav-link px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group hover:bg-[#DCD0C4] active:opacity-[0.85] active:shadow-none">
            <i class="fas fa-user-plus"></i>
            <span class="font-medium">Ajouter un nouveau compte</span>
        </a>
        @endif
        <!-- <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
            <i class="fas fa-user"></i>
            <span>Calendrier</span>
        </a> -->
        <div class="flex justify-center container mx-auto p-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-[#253743] hover:bg-[#3e5f77] text-white px-4 py-2 mt-2 font-semibold rounded-full md:mt-0 md:ml-4 uppercase " data-ripple-light="true">
                    <i class="fas fa-sign-out-alt"></i>
                    Se Déconnecter
                </button>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    var currentUrl = window.location.href;

    var navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(function(link) {
        var linkUrl = link.getAttribute('href');

        if (currentUrl === linkUrl) {
            link.classList.add('active');
        }
    });
</script>