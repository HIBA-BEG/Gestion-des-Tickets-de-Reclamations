<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-contain" style="background-image:  url('/img/zelij.jpg');">
    @guest
    @include('layouts.navbar')
    <div class="flex flex-col px-10 mx-auto">
        @endguest

        @auth
        @include('layouts.sidebar')
        <div class="lg:ml-64 py-20 px-10 flex flex-col mx-auto ">
            @endauth
            <div class="lg:mx-8 py-4 mt-10 text-center">
                <h2 class="font-semibold tracking-tight text-black sm:text-4xl text-3xl">
                    Details du Ticket:
                </h2>
            </div>
            <div class="p-6 m-10 bg-[hsla(0,0%,100%,0.75)] rounded-lg shadow-md ">
                <div class="mb-6">
                    <!-- <h2 class="text-2xl font-bold mb-4">Ticket Details</h2> -->

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <p><strong>Identifiant:</strong> {{ $ticket->id }}</p>
                            <p><strong>Projet:</strong> {{ $ticket->systeme }}</p>
                            <p><strong>Rapporteur:</strong> {{ $ticket->name }}</p>
                            <p><strong>Priorité:</strong> {{ $ticket->priorite }}</p>
                            <p><strong>Statut:</strong> {{ $ticket->etat }}</p>
                            <p><strong>Résumé:</strong> {{ $ticket->title }}</p>
                        </div>
                        <div>
                            <p><strong>Catégorie:</strong> {{ $ticket->categorie }}</p>
                            <p><strong>Visibilité:</strong> {{ $ticket->visibility }}</p>
                            <p><strong>Date de soumission:</strong> {{ $ticket->created_at }}</p>
                            <p><strong>Impact:</strong> {{ $ticket->impact }}</p>
                            <!-- <p><strong>Résolution:</strong> {{ $ticket->resolution }}</p> -->
                            <p><strong>Reproductibilité:</strong> {{ $ticket->reproductibilite }}</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-xl font-semibold">Description</h3>
                        <p class="border p-4 rounded-md mt-2">{{ $ticket->description }}</p>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-xl font-semibold">Screenshots</h3>
                        <div class="border p-4 rounded-md mt-2 flex gap-5">
                            @foreach ($ticket->screenshots as $screenshot)
                            <img src="{{ $screenshot->url }}" alt="Screenshot" class="mb-4 h-96">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div id="alertDiv" class="mt-5">
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

            <div class="p-6 m-10 bg-[hsla(0,0%,100%,0.75)] rounded-lg shadow-md">
                <div>
                    <h2 class="text-2xl font-bold mb-4">Activités</h2>
                    @if ($ticket->solutions->count() > 0)
                    @foreach ($ticket->solutions as $solution)
                    <div class="border m-4 rounded-md flex">
                        <div class="w-1/4 p-4 bg-[#9b47468c]">
                            <div>
                                @if(is_null($solution->submitted_by))
                                <p class="font-semibold text-gray-800"> Guest: {{ $solution->ticket->guest_name }}</p>
                                @else
                                <p class="font-semibold text-gray-800">{{ $solution->user->firstname }} {{ $solution->user->lastname }}</p>
                                @endif
                            </div>

                            <p>ID: {{ $solution->ticket_id }}</p>
                            <p class="text-sm">{{ $solution->created_at }}</p>
                        </div>
                        <div class=" p-4">
                            <p>{{ $solution->solution }}</p>
                            @if ($solution->screenshots->count() > 0)
                            <div class="mt-4">
                                @foreach ($solution->screenshots as $screenshot)
                                <img src="{{ $screenshot->url }}" alt="Solution Screenshot" class="mb-4 h-96 flex gap-5">
                                @endforeach
                            </div>
                            @endif
                        </div>

                    </div>
                    @endforeach
                    <form action="{{ route('solution.store', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="solution" class="text-2xl font-bold mb-4">Solution</label>
                            <textarea name="solution" id="solution" rows="3" class="mt-1 p-4 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="screenshots" class="text-2xl font-bold mb-4">Screenshots</label>
                            <input type="file" name="screenshots[]" id="screenshots" multiple aria-describedby="file_input_help" class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer file:me-3 file:cursor-pointer file:overflow-hidden file:border-0 file:bg-[#9b47468c] file:px-3  file:py-[0.32rem]">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="bg-[#253743] hover:bg-[#3e5f77] text-white px-4 py-2 font-semibold rounded-full">Ajouter une solution</button>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('solution.store', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="solution" class="text-2xl font-bold mb-4">Solution</label>
                            <textarea name="solution" id="solution" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="screenshots" class="text-2xl font-bold mb-4">Screenshots</label>
                            <input type="file" name="screenshots[]" id="screenshots" multiple aria-describedby="file_input_help" class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer file:me-3 file:cursor-pointer file:overflow-hidden file:border-0 file:bg-[#9b47468c] file:px-3  file:py-[0.32rem]">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit" class="bg-[#253743] hover:bg-[#3e5f77] text-white px-4 py-2 font-semibold rounded-full">Ajouter une solution</button>
                        </div>
                    </form>
                    @endif
                </div>

            </div>
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('alertDiv').style.display = 'none';
            }, 4000); // 4000 milliseconds 
        </script>
</body>

</html>