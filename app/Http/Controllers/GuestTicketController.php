<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Mail\TicketSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class GuestTicketController extends Controller
{
    public function create()
    {
        return view('tickets.submit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'systeme' => 'required|in:SQCA,BDT,SIGC,SGIA,Docflow,Ma Route,INSAF,OBTP',
            'impact' => 'required|in:Mineur,Majeur,Critique,Bloquant',
            'priorite' => 'required|in:Basse,Normale,Élevée,Urgente,Immédiate',
            'categorie' => 'required|in:demande_assistance,demande_evolution,anomalie_applicative,parametrage,autre',
            'reproductibilite' => 'required|in:Toujours,Quelques fois,Aléatoire,Impossible à reproduire',
            'screenshots.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // dd('hillo');
        $tracking_code = Str::random(10);

        
        $ticket = Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'etat' => 'Fermé',
            'impact' => $request->impact ?? 'Mineur',
            'priorite' => $request->priorite ?? 'Basse',
            'systeme' => $request->systeme,
            'categorie' => $request->categorie ?? 'demande_assistance',
            'reproductibilite' => $request->reproductibilite ?? 'Toujours',
            'user_id' => auth()->check() ? auth()->id() : null,
            'tracking_code' => $tracking_code,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $screenshot) {
                $path = $screenshot->store('ticket_screenshots', 'public');
                $ticket->screenshots()->create(['file_path' => $path]);
            }
        }

        // dd($ticket);
        Mail::to($request->email)->send(new TicketSubmitted($ticket));

        return redirect()->route('guest_ticket.create')->with('success', 'Ticket submitted successfully. Your tracking code is ' . $tracking_code);
    }


    public function trackForm()
    {
        return view('tickets.track');
    }

    public function track(Request $request)
    {
        $request->validate([
            'tracking_code' => 'required|string',
        ]);

        $ticket = Ticket::where('tracking_code', $request->tracking_code)->with('solutions.screenshots')->firstOrFail();

        return view('tickets.show', compact('ticket'));
    }

    public function status($tracking_code)
    {
        $ticket = Ticket::where('tracking_code', $tracking_code)->firstOrFail();

        return view('tickets.status', compact('ticket'));
    }
}
