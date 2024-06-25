<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('user')->get();
        // $user = Auth::id();
        // $tickets = DB::table('tickets')
        //     ->join('users', 'users.id', '=', 'tickets.user_id')
        //     ->where('tickets.user_id', $user)
        //     ->get();
        return view('tickets.index', compact('tickets'));
    }

    public function showOne(Request $request)
    {
        $ticket  = Ticket::findOrFail($request->ticketID);
        return redirect()->route('ticket.show', compact('ticket'));
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
