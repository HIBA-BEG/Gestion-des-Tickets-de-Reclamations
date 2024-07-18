<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    // public function index()
    // {
    //     if (Auth::user()->role === 'Responsable') {
    //         $tickets = Ticket::with('assignedUser')->where('archived', false)->get();
    //     } else {
    //         $tickets = Ticket::where('assigned_to', Auth::id())->with('assignedUser')->where('archived', false)->get();
    //     }
    //     $eligibleUsers = User::whereIn('role', ['Responsable', 'Niv 1', 'Niv 2', 'Utilisateur standard'])->get();
    //     return view('tickets.index', compact('tickets', 'eligibleUsers'));
    // }


    // public function index()
    // {
    //     $user = auth()->user();

    //     $query = Ticket::query();

    //     if ($user->role !== 'Responsable') {
    //         $query->whereIn('systeme', $user->assigned_systems);
    //     }

    //     $tickets = $query->get();

    //     return view('tickets.index', compact('tickets'));
    // }
    public function index()
    {
        $user = Auth::user();
        $tickets = Ticket::query();

        if ($user->role !== 'Responsable') {
            $assignedSystems = $user->assigned_systems;

            if (!is_array($assignedSystems)) {
                $assignedSystems = json_decode($assignedSystems, true);
            }

            if (!is_array($assignedSystems)) {
                $assignedSystems = [];
            }

            $tickets->whereIn('systeme', $assignedSystems);
        }

        $tickets = $tickets->get();
        $eligibleUsers = User::where('role', '!=', 'Utilisateur standard')->get();

        return view('tickets.index', compact('tickets', 'eligibleUsers'));
    }
    
    public function assignTicket(Request $request, Ticket $ticket)
    {
        if (auth()->user()->role !== 'Responsable') {
            return back()->with('error', 'Only Responsable can assign tickets to others.');
        }

        $ticket->assigned_to = $request->user_id;
        $ticket->save();

        return back()->with('success', 'Ticket assigned successfully.');
    }

    public function assign(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);
    
        $user = Auth::user();
        if ($user->role !== 'Responsable' && $validatedData['user_id'] != $user->id) {
            return response()->json(['error' => 'You can only assign tickets to yourself'], 403);
        }
    
        $ticket->assigned_to = $validatedData['user_id'];
        $ticket->save();
    
        return response()->json(['message' => 'Ticket assigned successfully']);
    }
    
    public function updateSystem(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'systeme' => 'required|in:' . implode(',', config('constants.all_systems'))
        ]);
    
        $ticket->systeme = $validatedData['systeme'];
        $ticket->save();
    
        return response()->json(['message' => 'Ticket system updated successfully']);
    }

    public function showOne($ticketID)
    {
        $ticket = Ticket::with('solutions.user', 'solutions.screenshots')->findOrFail($ticketID);

        return view('tickets.show', compact('ticket'));
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:Ouvert,En cours,Résolu,Fermé',
        ]);

        $ticket->etat = $validatedData['status'];
        $ticket->save();

        return response()->json(['success' => true]);
    }

    public function archive(Ticket $ticket)
    {
        $ticket->archived = true;
        $ticket->save();

        return redirect()->back()->with('success', 'Ticket archived successfully');
    }

    public function archivedIndex()
    {
        $archivedTickets = Ticket::where('archived', true)->get();
        return view('tickets.archived', compact('archivedTickets'));
    }

    public function unarchive(Ticket $ticket)
    {
        $ticket->archived = false;
        $ticket->save();

        return redirect()->back()->with('success', 'Ticket unarchived successfully');
    }

    public function edit(Request $request)
    {
        try {
            // $request->validate([
            //     'name' => ['required', 'string', 'max:255'],
            //     'capacite' => 'required',
            //     'description' => ['required', 'string', 'max:255'],
            // ]);

            // $salle = Salle::findOrFail($id);

            // // Handle profile picture upload
            // if ($request->hasFile('profile_picture')) {
            //     $image = $request->file('profile_picture');
            //     $imageName = time() . '.' . $image->getClientOriginalExtension();
            //     $image->move(public_path('img'), $imageName);
            //     $salle->profile_picture = $imageName;
            // }

            // // Update salle data
            // $salle->name = $request->name;
            // $salle->capacite = $request->capacite;
            // $salle->description = $request->description;
            // $salle->save();

            return redirect()->route('ticket.index')->with('status', 'Ticket Modifiée');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->back()->with('success', 'Ticket supprimé avec succès.');
    }
}
