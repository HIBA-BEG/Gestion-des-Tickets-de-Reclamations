<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-[#F7F5F4] bg-contain" style="background-image:  url('/img/zelij.jpg');">
    @include('layouts.sidebar')
    <div class="lg:ml-64 mx-auto py-20 px-10">
    <div class="lg:mx-8 py-4 mt-10">
                <h2 class="font-semibold text-center tracking-tight text-black sm:text-4xl text-3xl">
                    Tous les tickets:
                </h2>
            </div>
        <!-- <h1 class="text-2xl font-bold mb-6">All Tickets</h1> -->
        <div id="alertDiv" class="my-5">
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
        <div class="m-auto overflow-x-auto">
            <table class="bg-white border border-gray-200">
                <thead>
                    <tr class="bg-[#DCD0C4] text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-2 px-6 text-center">Actions</th>
                        <th class="py-2 px-4 text-center">Priorité</th>
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Categorie</th>
                        <th class="py-2 px-4 text-left">Impact</th>
                        <th class="py-3 px-4 text-left">Titre</th>
                        <th class="py-3 px-4 text-center">statut</th>
                        <th class="py-3 px-4 text-center">Assigné à</th>
                        <th class="py-3 px-4 text-center">Système</th>
                        <th class="py-3 px-4 text-left">Description</th>
                        <th class="py-3 px-4 text-center">Reproductibilité</th>
                        <th class="py-3 px-4 text-center">Date de soumission</th>
                        <th class="py-3 px-4 text-center">Dernière modification</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <!-- Example row -->
                    @foreach($tickets as $ticket)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a href="{{ route('oneTicket', $ticket->id) }}" class="w-4 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="#2ab78c" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                    </svg>
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h.01M12 15h.01M9 12h.01M12 9h.01M12 3v2m6 0h2a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h2M8 7v2m8-2v2m0 8H8m2-4h4" />
                                    </svg> -->
                                </a>
                                <a href="{{ route('editTicket', $ticket->id) }}" class="w-4 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="#fedc62" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                    </svg>
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h.01M12 15h.01M9 12h.01M12 9h.01M12 3v2m6 0h2a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h2M8 7v2m8-2v2m0 8H8m2-4h4" />
                                    </svg> -->
                                </a>
                                <form action="{{ route('destroyTicket', $ticket->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="#d93030" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h.01M12 15h.01M9 12h.01M12 9h.01M12 3v2m6 0h2a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h2M8 7v2m8-2v2m0 8H8m2-4h4" />
                                        </svg> -->
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs whitespace-nowrap">{{ $ticket->priorite }}</span>
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
                            @if(Auth::user()->role === 'Responsable')
                            <select id="assigned_to_{{ $ticket->id }}" class="whitespace-nowrap rounded-3xl bg-[#F7F5F4] py-2 text-center text-inherit shadow-lg" onchange="assignTicket({{ $ticket->id }}, this.value)">
                                <option value="">Select User</option>
                                @foreach($eligibleUsers as $user)
                                <option value="{{ $user->id }}" {{ $ticket->assigned_to == $user->id ? 'selected' : '' }}>
                                    {{ $user->firstname }} {{ $user->lastname }} ({{ $user->role }})
                                </option>
                                @endforeach
                            </select>
                            @else
                            {{ $ticket->assignedUser ? $ticket->assignedUser->firstname . ' ' . $ticket->assignedUser->lastname : 'Unassigned' }}
                            @endif
                        </td>

                        <td class="py-3 px-4 text-center text-red-600 font-semibold whitespace-nowrap">{{ $ticket->systeme }}</td>
                        <td class="py-3 px-4 text-left">{{ $ticket->description }}</td>
                        <td class="py-3 px-4 text-center">
                            <span class="bg-blue-200 text-green-600 py-1 px-3 rounded-full text-xs whitespace-nowrap">{{ $ticket->reproductibilite }}</span>
                        </td>
                        <td class="py-3 px-4 text-center font-semibold whitespace-nowrap">{{ $ticket->created_at }}</td>
                        <td class="py-3 px-4 text-center font-semibold whitespace-nowrap">{{ $ticket->updated_at }}</td>
                        <!-- <td class="py-3 px-4 text-center">
                            @if ($ticket->user)
                            {{ $ticket->user->firstname }} {{ $ticket->user->lastname }}
                            @else
                            <div class="font-semibold underline">
                                {{ $ticket->guest_name }}
                            </div>
                            @endif
                        </td> -->

                    </tr>
                    @endforeach
                    <!-- End example row -->
                </tbody>
            </table>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('alertDiv').style.display = 'none';
        }, 4000); // 4000 milliseconds 

        // function assignTicket(ticketId, userId) {
        //     fetch(`/tickets/${ticketId}/assign`, {
        //             method: 'PATCH',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //             },
        //             body: JSON.stringify({
        //                 assigned_to: userId
        //             })
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data.success) {
        //                 console.log('Ticket assigned successfully');
        //             } else {
        //                 console.error('Failed to assign ticket');
        //             }
        //         })
        //         .catch(error => console.error('Error:', error));
        // }

        function assignTicket(ticketId, userId) {
            fetch(`/tickets/${ticketId}/assign`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        assigned_to: userId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Ticket assigned successfully');
                        // Optionally update the UI here
                    } else {
                        alert('Failed to assign ticket: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while assigning the ticket');
                });
        }
    </script>
</body>

</html>