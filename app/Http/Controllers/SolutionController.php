<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use App\Models\Ticket;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    // public function store(Request $request, $ticketId)
    // {
    //     $request->validate([
    //         'solution' => 'required|string',
    //         'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $ticket = Ticket::findOrFail($ticketId);

    //     // $screenshotPath = null;
    //     if ($request->hasFile('screenshot')) {
    //         $screenshotPath = $request->file('screenshot')->store('solution_screenshots', 'public');
    //     }

    //     $ticket->solution()->create([
    //         'solution' => $request->solution,
    //         'screenshot' => $screenshotPath,
    //     ]);

    //     return redirect()->route('tickets.show', $ticket->id)->with('status', 'Solution added successfully.');
    // }

    public function store(Request $request, $ticketId)
    {
        
        $request->validate([
            'solution' => 'required|string',
            'screenshots.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $ticket = Ticket::findOrFail($ticketId);
        
        // $user = auth()->user();

        // if ($ticket->assigned_to !== $user->id && $user->role !== 'Responsable') {
        //     return back()->with('error', 'You are not authorized to add a solution to this ticket.');
        // }
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

    // public function update(Request $request, $solutionId)
    // {
    //     $request->validate([
    //         'solution' => 'required|string',
    //         'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $solution = Solution::findOrFail($solutionId);

    //     $screenshotPath = $solution->screenshot;
    //     if ($request->hasFile('screenshot')) {
    //         $screenshotPath = $request->file('screenshot')->store('solution_screenshots', 'public');
    //     }

    //     $solution->update([
    //         'solution' => $request->solution,
    //         'screenshot' => $screenshotPath,
    //     ]);

    //     return redirect()->route('tickets.show', $solution->ticket->id)->with('status', 'Solution updated successfully.');
    // }
}
