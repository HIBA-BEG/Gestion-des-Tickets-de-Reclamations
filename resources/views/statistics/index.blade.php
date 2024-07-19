<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-gray-100 text-gray-800 bg-cover bg-no-repeat" style="background-image: url('/img/zelij.jpg');">

    @include('layouts.sidebar')

    <div class=" lg:ml-64 flex flex-col m-auto p-6 py-20">
        <div class="lg:mx-8 py-4 m-10 ">
            <h2 class="flex justify-center font-semibold tracking-tight text-black sm:text-4xl text-3xl">
                Statistics:
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets en cours</h2>
                <p class="font-bold text-center text-3xl sm:text-4xl lg:text-5xl leading-9 text-primary ml-2">{{ $stats['in_progress_tickets'] }}</p>
            </div>

            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets résolus</h2>
                <p class="font-bold text-center text-3xl sm:text-4xl lg:text-5xl leading-9 text-primary ml-2">{{ $stats['resolved_tickets'] }}</p>
            </div>

            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Total des  Tickets</h2>
                <p class="font-bold text-center text-3xl sm:text-4xl lg:text-5xl leading-9 text-primary ml-2">{{ $stats['total_tickets'] }}</p>
            </div>

            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets par Système</h2>
                <ul>
                    @foreach($stats['tickets_by_system'] as $system)
                    <li><span class="font-medium text-xl">{{ $system->systeme }}:</span> <span class="text-xl font-bold">{{ $system->total }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets non ouverts</h2>
                <p class="font-bold text-center text-3xl sm:text-4xl lg:text-5xl leading-9 text-primary ml-2">{{ $stats['unopened_tickets'] }}</p>
            </div>

            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Utilisateurs par Role</h2>
                <ul>
                    @foreach($stats['users_by_role'] as $role)
                    <li> <span class="font-medium text-xl">{{ $role->role }}:</span>  <span class="text-xl font-bold">{{ $role->total }}</span></li>
                    @endforeach
                </ul>
            </div>

            
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets par  Priorité</h2>
                <ul>
                    @foreach($stats['tickets_by_priority'] as $priority)
                    <li> <span class="font-medium text-xl">{{ $priority->priorite }}:</span> <span class="text-xl font-bold">{{ $priority->total }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets par Categorie</h2>
                <ul>
                    @foreach($stats['tickets_by_category'] as $category)
                    <li> <span class="font-medium text-xl">{{ $category->categorie }}:</span> <span class="text-xl font-bold">{{ $category->total }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets par Impact</h2>
                <ul>
                    @foreach($stats['tickets_by_impact'] as $impact)
                    <li> <span class="font-medium text-xl">{{ $impact->impact }}:</span> <span class="text-xl font-bold">{{ $impact->total }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets par reproductibilité</h2>
                <ul>
                    @foreach($stats['tickets_by_reproducibility'] as $reproducibility)
                    <li> <span class="font-medium text-xl">{{ $reproducibility->reproductibilite }}:</span> <span class="text-xl font-bold">{{ $reproducibility->total }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>