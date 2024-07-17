<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-[#F7F5F4] bg-contain" style="background-image:  url('/img/zelij.jpg');">
    @include('layouts.sidebar')
    <div class="lg:ml-64 mx-auto py-20 px-10">
        <div class="lg:mx-8 py-4 mt-10">
            <h2 class="font-semibold text-center tracking-tight text-black sm:text-3xl text-4xl">
                Archived Tickets:
            </h2>
        </div>
        <div id="alertDiv" class="my-5">
            @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 w-full px-4 py-3 lg:px-0 mx-auto rounded relative" role="alert">
                <strong>
                    {{ session('success') }}
                </strong>
            </div>
            @endif
        </div>
        @if ($archivedTickets->isEmpty())
        <div class="box w-full rounded-br-3xl rounded-tl-3xl flex flex-col justify-center p-12 bg-opacity-30 bg-white border border-opacity-25 backdrop-filter backdrop-blur-md transition-all duration-300">
            <div class="text-center py-12">
                <p class="text-base font-bold text-gray-500">Aucun Ticket n'est archivée</p>
            </div>
        </div>
        @else
        <div class="m-auto overflow-x-auto ">
            <table class="w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-[#DCD0C4] text-gray-600 uppercase leading-normal">
                        <th class="py-2 px-6 text-center">Actions</th>
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Categorie</th>
                        <th class="py-2 px-4 text-left">Impact</th>
                        <th class="py-3 px-4 text-left">Titre</th>
                        <th class="py-3 px-4 text-center">statut</th>
                        <th class="py-3 px-4 text-center">Assigné à</th>
                        <th class="py-3 px-4 text-center">Système</th>
                        <th class="py-3 px-4 text-left">Description</th>
                        <th class="py-3 px-4 text-center">Date de soumission</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-base font-light">
                    @foreach($archivedTickets as $ticket)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <form action="{{ route('tickets.unarchive', $ticket->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="border-green-200 hover:bg-green-300 text-green-600 border-2 font-bold py-2 px-4 rounded">
                                        Unarchive
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td class="py-3 px-4 text-left whitespace-nowrap">{{ $ticket->id }}</td>
                        <td class="py-3 px-4 text-left">{{ $ticket->categorie }}</td>
                        <td class="py-3 px-4 text-center">
                            <span class="bg-yellow-200 text-blue-600 py-1 px-3 rounded-full text-xs whitespace-nowrap">{{ $ticket->impact }}</span>
                        </td>
                        <td class="py-3 px-4 text-left">{{ $ticket->title }}</td>
                        <td class="py-3 px-4 text-center">
                            <span class="bg-red-200 text-blue-600 py-1 px-3 rounded-full text-xs whitespace-nowrap">{{ $ticket->etat }}</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            {{ $ticket->assignedUser ? $ticket->assignedUser->firstname . ' ' . $ticket->assignedUser->lastname : 'Unassigned' }}
                        </td>
                        <td class="py-3 px-4 text-center text-red-600 font-semibold whitespace-nowrap">{{ $ticket->systeme }}</td>
                        <td class="py-3 px-4 text-left">{{ $ticket->description }}</td>
                        <td class="py-3 px-4 text-center font-semibold whitespace-nowrap">{{ $ticket->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('alertDiv').style.display = 'none';
        }, 4000); // 4000 milliseconds 
    </script>
</body>

</html>