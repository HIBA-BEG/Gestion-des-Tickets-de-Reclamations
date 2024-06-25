<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-[#F7F5F4]">
    @guest
    @include('layouts.navbar')
    <div class="flex flex-col items-center m-auto">
        @endguest

        @auth
        @include('layouts.sidebar')
        <div class="lg:ml-64 mx-auto py-20 px-10">
            @endauth
            <div class="lg:mx-8 py-4">
                <h2 class="font-semibold tracking-tight text-black sm:text-4xl text-3xl">
                    Soumettre une requête:
                </h2>
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

            <div class="container bg-[#DCD0C4] shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center border-b pb-4 mb-4">
                    <h2 class="text-lg font-semibold">Saisir les détails du problème</h2>
                    <!-- <div class="text-sm text-gray-600">smahane.elassri</div> -->
                </div>
                <form action="{{ route('guest_ticket.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="title"><span class="text-red-400">*</span>Objet:</label>
                        <input id="title" name="title" class="required block w-full mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                        @error('title')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    @guest
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                        @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    @endguest
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ auth()->check() ? auth()->user()->email : old('email') }}">
                        @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="categorie"><span class="text-red-400">*</span>Sélectionner une Categorie: </label>
                        <select id="categorie" name="categorie" class="required block w-full mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            <option value="demande_assistance">Demande d'assistance</option>
                            <option value="demande_evolution">Demande d'évolution</option>
                            <option value="anomalie_applicative">Anomalie Applicative</option>
                            <option value="parametrage">Paramètrage</option>
                            <option value="autre">Autre</option>
                        </select>
                        @error('categorie')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="reproductibilite">Reproductibilité</label>
                        <select id="reproductibilite" name="reproductibilite" class="block w-full mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            <option value="Toujours">Toujours</option>
                            <option value="Quelques fois">Quelques fois</option>
                            <option value="Aléatoire">Aléatoire</option>
                            <option value="Impossible à reproduire">Impossible à reproduire</option>
                        </select>
                        @error('reproductibilite')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="impact">Impact</label>
                        <select id="impact" name="impact" class="block w-full mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            <option value="Mineur">Mineur</option>
                            <option value="Majeur">Majeur</option>
                            <option value="Critique">Critique</option>
                            <option value="Bloquant">Bloquant</option>
                        </select>
                        @error('impact')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="priorite">Priorité</label>
                        <select id="priorite" name="priorite" class="block w-full mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            <option value="Basse">Basse</option>
                            <option value="Normale">Normale</option>
                            <option value="Élevée">Élevée</option>
                            <option value="Urgente">Urgente</option>
                            <option value="Immédiate">Immédiate</option>
                        </select>
                        @error('priorite')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="systeme">Sélectionner un profil</label>
                        <select id="systeme" name="systeme" class="block w-full mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            <option value="SQCA">Plateforme de Qualification et Classification des entreprises et laboratoires BTP et Agrément des bureaux d'études</option>
                            <option value="BDT">Base de données territoriales</option>
                            <option value="SIGC">Système intégré de gestion des conventions</option>
                            <option value="SGIA">Système intégré de gestion des achats</option>
                            <option value="Docflow">Docflow</option>
                            <option value="Ma Route">Ma Route</option>
                            <option value="INSAF">Système de gestion du contentieux</option>
                            <option value="OBTP">Observatoire Bâtiments et Travaux Publics</option>
                        </select>
                        @error('systeme')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="description"><span class="text-red-400">*</span>Description</label>
                        <textarea id="description" name="description" rows="4" class="required block w-full mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="screenshots">Screenshots (optional)</label>
                        <input type="file" id="screenshots" name="screenshots[]" multiple class="block w-full mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 font-bold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('alertDiv').style.display = 'none';
            }, 4000); // 4000 milliseconds 
        </script>
</body>

</html>