<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="bg-gray-100 text-gray-800">

    @include('layouts.sidebar')

    <div class="container lg:ml-64 mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Statistics</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Number of Tickets by Systeme -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Tickets by Systeme</h2>
                <ul>
                    @foreach($stats['tickets_by_system'] as $system)
                    <li>{{ $system->systeme }}: {{ $system->total }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Number of Unopened Tickets -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Unopened Tickets</h2>
                <p>{{ $stats['unopened_tickets'] }}</p>
            </div>

            <!-- Number of Users by Role -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Users by Role</h2>
                <ul>
                    @foreach($stats['users_by_role'] as $role)
                    <li>{{ $role->role }}: {{ $role->total }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Number of Tickets in Progress -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Tickets in Progress</h2>
                <p>{{ $stats['in_progress_tickets'] }}</p>
            </div>

            <!-- Number of Resolved Tickets -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Resolved Tickets</h2>
                <p>{{ $stats['resolved_tickets'] }}</p>
            </div>

            <!-- Total Number of Tickets -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Total Tickets</h2>
                <p>{{ $stats['total_tickets'] }}</p>
            </div>

            <!-- Number of Tickets by Priority -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Tickets by Priority</h2>
                <ul>
                    @foreach($stats['tickets_by_priority'] as $priority)
                    <li>{{ $priority->priorite }}: {{ $priority->total }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Number of Tickets by Category -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Tickets by Category</h2>
                <ul>
                    @foreach($stats['tickets_by_category'] as $category)
                    <li>{{ $category->categorie }}: {{ $category->total }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Number of Tickets by Impact -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Tickets by Impact</h2>
                <ul>
                    @foreach($stats['tickets_by_impact'] as $impact)
                    <li>{{ $impact->impact }}: {{ $impact->total }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Number of Tickets by Reproducibility -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Tickets by Reproducibility</h2>
                <ul>
                    @foreach($stats['tickets_by_reproducibility'] as $reproducibility)
                    <li>{{ $reproducibility->reproductibilite }}: {{ $reproducibility->total }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>