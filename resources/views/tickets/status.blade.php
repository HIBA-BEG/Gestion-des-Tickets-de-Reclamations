<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Status</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <h2 class="text-2xl font-bold mb-6">Ticket Status</h2>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold mb-4">{{ $ticket->title }}</h3>
            <p><strong>Description:</strong> {{ $ticket->description }}</p>
            <p><strong>Status:</strong> {{ $ticket->etat }}</p>
            <p><strong>Impact:</strong> {{ $ticket->impact }}</p>
            <p><strong>Priority:</strong> {{ $ticket->priorite }}</p>
            <p><strong>System:</strong> {{ $ticket->systeme }}</p>
            <p><strong>Reproducibility:</strong> {{ $ticket->reproductibilite }}</p>
            <p><strong>Submitted by:</strong> {{ $ticket->guest_name }} ({{ $ticket->guest_email }})</p>
        </div>
    </div>
</body>
</html>
