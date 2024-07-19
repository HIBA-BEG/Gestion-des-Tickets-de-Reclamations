<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use App\Models\Ticket;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function store(Request $request, $ticketId)
    {
        
        $request->validate([
            'solution' => 'required|string',
            'screenshots.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $ticket = Ticket::findOrFail($ticketId);

        $user = auth()->user();

    
        if ($user->role !== 'Responsable' && $ticket->assigned_to !== $user->id) {
            return response()->json(['error' => 'You do not have permission to add a solution to this ticket.'], 403);
        }
    
        $submitted_by = auth()->check() ? auth()->id() : null;

        $solution = $ticket->solutions()->create([
            'solution' => $request->solution,
            'submitted_by' => $submitted_by,
        ]);

        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $screenshot) {
                $path = $screenshot->store('solution_screenshots', 'public');
                $solution->screenshots()->create(['file_path' => $path]);
            }
        }

        return redirect()->back()->with('success', 'Submitted successfully!');
    }
}