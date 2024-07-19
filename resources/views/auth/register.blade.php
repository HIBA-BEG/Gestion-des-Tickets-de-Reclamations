<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    @if($userCount > 0)
    @include('layouts.sidebar')
    @endif
    <div class="lg:ml-64 flex h-screen items-center justify-center bg-gray-900 bg-cover bg-no-repeat" style="background-image: url('/img/zelij.jpg');">
        <div class="rounded-xl bg-white bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
            <div class="flex text-black">
                <div class="mb-8 flex flex-col items-center gap-4">
                    <p class="text-2xl font-semibold tracking-widest text-gray-900 rounded-lg focus:outline-none focus:shadow-outline">Réclam<span class="text-[#9B4846]">Action</span> </p>
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

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="flex flex-wrap gap-4 justify-center">
                            <div class="mb-4 text-lg ">
                                <div class="py-2">Nom: </div>
                                <input type="lastname" name="lastname" id="lastname" placeholder="Entrez votre nom" class="w-full rounded-3xl border-none bg-[#DCD0C4] px-6 py-2 text-start text-inherit placeholder-grey-500 shadow-lg outline-none backdrop-blur-md" @error('lastname') border-red-500 @enderror">
                                @error('lastname')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4 text-lg">
                                <div class="py-2">Prénom: </div>
                                <input type="firstname" name="firstname" id="firstname" placeholder="Entrez votre prénom" class="w-full rounded-3xl border-none bg-[#DCD0C4] px-6 py-2 text-start text-inherit placeholder-grey-500 shadow-lg outline-none backdrop-blur-md" @error('firstname') border-red-500 @enderror">
                                @error('firstname')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 justify-center">
                            <div class="mb-4 text-lg">
                                <div class="py-2">Email: </div>
                                <input type="email" name="email" id="email" placeholder="Entrez votre e-mail" class="w-full rounded-3xl border-none bg-[#DCD0C4] px-6 py-2 text-start text-inherit placeholder-grey-500 shadow-lg outline-none backdrop-blur-md" @error('email') border-red-500 @enderror">
                                @error('email')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4 text-lg">
                                <div class="py-2">Confirmez vitre email: </div>
                                <input type="email" name="email" id="email" placeholder="Confirmez votre e-mail" class="w-full rounded-3xl border-none bg-[#DCD0C4] px-6 py-2 text-start text-inherit placeholder-grey-500 shadow-lg outline-none backdrop-blur-md" @error('email') border-red-500 @enderror">
                                @error('email')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-4 justify-center">
                            <div class="mb-4 text-lg">
                                <div class="py-2">Mot de passe: </div>
                                <input type="password" name="password" id="password" placeholder="Entrez votre password" class="w-full rounded-3xl border-none bg-[#DCD0C4] px-6 py-2 text-start text-inherit placeholder-grey-500 shadow-lg outline-none backdrop-blur-md" @error('password') border-red-500 @enderror">
                                @error('password')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4 text-lg">
                                <div class="py-2">Confirmez le mot de passe: </div>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmez votre password" class="w-full rounded-3xl border-none bg-[#DCD0C4] px-6 py-2 text-start text-inherit placeholder-grey-500 shadow-lg outline-none backdrop-blur-md" @error('password_confirmation') border-red-500 @enderror">
                                @error('password_confirmation')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="mb-4 text-lg">
                                <div class="py-2">Role: </div>
                                @if($userCount == 0)
                                <input type="hidden" name="role" value="Responsable">
                                <span>Responsable</span>
                                @else
                                <select name="role" id="role" class="w-full rounded-3xl border-none bg-[#DCD0C4] px-6 py-2 text-start text-inherit placeholder-grey-500 shadow-lg outline-none backdrop-blur-md" @error('role') border-red-500 @enderror">
                                    <option selected disabled>Choisissez un role</option>
                                    <option value="Niv 1">Niv 1</option>
                                    <option value="Niv 2">Niv 2</option>
                                    <option value="Utilisateur standard">Utilisateur standard</option>
                                </select>
                                @endif
                                @error('role')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="px-4 pb-2 pt-4 flex justify-center">
                            <button type="submit" class="rounded-3xl bg-[#253743] px-10 py-2 text-white shadow-xl hover:bg-white hover:text-[#253743] ">
                                AJOUTER UTILISATEUR
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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