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
                    Statut du Ticket:
                </h2>
            </div>
        <!-- <h2 class="text-2xl font-bold mb-6">Ticket Status</h2> -->
        <div class="m-10 bg-[hsla(0,0%,100%,0.75)] p-6 rounded-lg shadow-md">
            <h3 class="text-2xl text-center font-bold mb-4">{{ $ticket->title }}</h3>
            <p class="text-xl"><strong>Description:</strong> {{ $ticket->description }}</p>
            <p class="text-xl"><strong>Status:</strong> {{ $ticket->etat }}</p>
            <p class="text-xl"><strong>Impact:</strong> {{ $ticket->impact }}</p>
            <p class="text-xl"><strong>Priority:</strong> {{ $ticket->priorite }}</p>
            <p class="text-xl"><strong>System:</strong> {{ $ticket->systeme }}</p>
            <p class="text-xl"><strong>Reproducibility:</strong> {{ $ticket->reproductibilite }}</p>
            <p class="text-xl"><strong>Submitted by:</strong> {{ $ticket->guest_name }} ({{ $ticket->guest_email }})</p>
        </div>
    </div>
</body>
</html>
