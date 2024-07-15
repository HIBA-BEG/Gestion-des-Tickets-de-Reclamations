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
            <!-- Number of Tickets in Progress -->
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets in Progress</h2>
                <p class="font-bold text-center text-3xl sm:text-4xl lg:text-5xl leading-9 text-primary ml-2">{{ $stats['in_progress_tickets'] }}</p>
            </div>

            <!-- Number of Resolved Tickets -->
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Resolved Tickets</h2>
                <p class="font-bold text-center text-3xl sm:text-4xl lg:text-5xl leading-9 text-primary ml-2">{{ $stats['resolved_tickets'] }}</p>
            </div>

            <!-- Total Number of Tickets -->
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Total Tickets</h2>
                <p class="font-bold text-center text-3xl sm:text-4xl lg:text-5xl leading-9 text-primary ml-2">{{ $stats['total_tickets'] }}</p>
            </div>

            <!-- Number of Tickets by Systeme -->
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets by Systeme</h2>
                <ul>
                    @foreach($stats['tickets_by_system'] as $system)
                    <li><span class="font-medium">{{ $system->systeme }}:</span> <span class="text-xl font-bold">{{ $system->total }}</span></li>
                    @endforeach
                </ul>
            </div>

            <!-- Number of Unopened Tickets -->
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Unopened Tickets</h2>
                <p class="font-bold text-center text-3xl sm:text-4xl lg:text-5xl leading-9 text-primary ml-2">{{ $stats['unopened_tickets'] }}</p>
            </div>

            <!-- Number of Users by Role -->
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Users by Role</h2>
                <ul>
                    @foreach($stats['users_by_role'] as $role)
                    <li> <span class="font-medium">{{ $role->role }}:</span>  <span class="text-xl font-bold">{{ $role->total }}</span></li>
                    @endforeach
                </ul>
            </div>

            
            <!-- Number of Tickets by Priority -->
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets by Priority</h2>
                <ul>
                    @foreach($stats['tickets_by_priority'] as $priority)
                    <li> <span class="font-medium">{{ $priority->priorite }}:</span> <span class="text-xl font-bold">{{ $priority->total }}</span></li>
                    @endforeach
                </ul>
            </div>

            <!-- Number of Tickets by Category -->
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets by Category</h2>
                <ul>
                    @foreach($stats['tickets_by_category'] as $category)
                    <li> <span class="font-medium">{{ $category->categorie }}:</span> <span class="text-xl font-bold">{{ $category->total }}</span></li>
                    @endforeach
                </ul>
            </div>

            <!-- Number of Tickets by Impact -->
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets by Impact</h2>
                <ul>
                    @foreach($stats['tickets_by_impact'] as $impact)
                    <li> <span class="font-medium">{{ $impact->impact }}:</span> <span class="text-xl font-bold">{{ $impact->total }}</span></li>
                    @endforeach
                </ul>
            </div>

            <!-- Number of Tickets by Reproducibility -->
            <div class="bg-[hsla(0,0%,100%,0.75)] p-4 rounded-lg shadow">
                <h2 class="font-semibold text-xl leading-6 my-3 text-center">Tickets by Reproducibility</h2>
                <ul>
                    @foreach($stats['tickets_by_reproducibility'] as $reproducibility)
                    <li> <span class="font-medium">{{ $reproducibility->reproductibilite }}:</span> <span class="text-xl font-bold">{{ $reproducibility->total }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>