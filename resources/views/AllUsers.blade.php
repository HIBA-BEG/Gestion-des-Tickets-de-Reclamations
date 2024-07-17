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
            <table class="w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-[#DCD0C4] text-gray-600 uppercase leading-normal">
                        <th class="py-2 px-6 text-center">Actions</th>
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Nom</th>
                        <th class="py-2 px-4 text-left">Prénom</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-center">Role</th>
                        <th class="py-3 px-4 text-center">Date de création</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-base font-light">
                    @foreach($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">

                        <td class="py-3 px-4 text-center">
                            <button onclick="toggleArchiveUser({{ $user->id }}, this)" class="px-4 py-2 border-red-500 border-2 hover:bg-red-300 border-3 rounded text-red-500 ">
                                {{ $user->archived ? 'Unarchive' : 'Archive' }}
                            </button>
                        </td>
                        <td class="py-3 px-4 text-left whitespace-nowrap">{{ $user->id }}</td>
                        <td class="py-3 px-4 text-left">{{ $user->lastname }}</td>
                        <td class="py-3 px-4 text-left">{{ $user->firstname }}</td>
                        <td class="py-3 px-4 text-left  font-semibold whitespace-nowrap">{{ $user->email }}</td>
                        <!-- <td class="py-3 px-4 text-center">
                            <span class="bg-red-200 text-blue-600 py-1 px-3 rounded-full text-xs whitespace-nowrap">{{ $user->role }}</span>
                        </td> -->
                        <td class="py-3 px-4 text-center">
                            <select id="role_{{ $user->id }}" class="whitespace-nowrap rounded-3xl bg-[#F7F5F4] py-2 px-10 text-center text-inherit shadow-lg" onchange="updateUserRole({{ $user->id }}, this.value)">
                                <option value="Responsable" {{ $user->role == 'Responsable' ? 'selected' : '' }}>Responsable</option>
                                <option value="Utilisateur standard" {{ $user->role == 'Utilisateur standard' ? 'selected' : '' }}>Utilisateur standard</option>
                                <option value="Niv 1" {{ $user->role == 'Niv 1' ? 'selected' : '' }}>Niv 1</option>
                                <option value="Niv 2" {{ $user->role == 'Niv 2' ? 'selected' : '' }}>Niv 2</option>
                            </select>
                        </td>

                        <td class="py-3 px-4 text-center font-semibold whitespace-nowrap">{{ $user->created_at }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('alertDiv').style.display = 'none';
        }, 4000); // 4000 milliseconds 


        function updateUserRole(userId, newRole) {
            fetch(`/users/${userId}/update-role`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        role: newRole
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('User role updated successfully');
                        // Optionally update the UI here
                    } else {
                        alert('Failed to update user role: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating the user role');
                });
        }

        function toggleArchiveUser(userId, button) {
            fetch(`/users/${userId}/toggle-archive`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        // Toggle button text
                        button.textContent = button.textContent === 'Archive' ? 'Unarchive' : 'Archive';
                        // Optionally update other UI elements
                    } else {
                        alert('Failed to update user archive status');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating the user archive status');
                });
        }
    </script>
</body>

</html>