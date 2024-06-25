<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    // public function getStatistics()
    // {
    //     $statistics = [
    //         'ticketsBySystem' => $this->getTicketsBySystem(),
    //         'unopenedTickets' => $this->getUnopenedTickets(),
    //         'usersByRole' => $this->getUsersByRole(),
    //         'ticketsInProgress' => $this->getTicketsInProgress(),
    //         'resolvedTickets' => $this->getResolvedTickets(),
    //         'averageResolutionTime' => $this->getAverageResolutionTime(),
    //         'ticketsByPriority' => $this->getTicketsByPriority(),
    //         'ticketsByCategory' => $this->getTicketsByCategory(),
    //         'topAssignees' => $this->getTopAssignees(),
    //         'ticketsTrend' => $this->getTicketsTrend(),
    //     ];

    //     return response()->json($statistics);
    // }

    // private function getTicketsBySystem()
    // {
    //     return Ticket::groupBy('systeme')
    //         ->select('systeme', DB::raw('count(*) as total'))
    //         ->pluck('total', 'systeme');
    // }

    // private function getUnopenedTickets()
    // {
    //     return Ticket::where('etat', 'Fermé')->count();
    // }

    // private function getUsersByRole()
    // {
    //     return User::groupBy('role')
    //         ->select('role', DB::raw('count(*) as total'))
    //         ->pluck('total', 'role');
    // }

    // private function getTicketsInProgress()
    // {
    //     return Ticket::where('etat', 'En cours')->count();
    // }

    // private function getResolvedTickets()
    // {
    //     return Ticket::where('etat', 'Résolu')->count();
    // }

    // private function getAverageResolutionTime()
    // {
    //     return Ticket::whereNotNull('created_at')
    //         ->whereNotNull('updated_at')
    //         ->where('etat', 'Résolu')
    //         ->selectRaw('AVG(TIMESTAMPDIFF(HOUR, created_at, updated_at)) as avg_time')
    //         ->value('avg_time');
    // }

    // private function getTicketsByPriority()
    // {
    //     return Ticket::groupBy('priorite')
    //         ->select('priorite', DB::raw('count(*) as total'))
    //         ->pluck('total', 'priorite');
    // }

    // private function getTicketsByCategory()
    // {
    //     return Ticket::groupBy('categorie')
    //         ->select('categorie', DB::raw('count(*) as total'))
    //         ->pluck('total', 'categorie');
    // }

    // private function getTopAssignees()
    // {
    //     return Ticket::groupBy('user_id')
    //         ->select('user_id', DB::raw('count(*) as total'))
    //         ->with('user:id,firstname,lastname')
    //         ->orderByDesc('total')
    //         ->limit(5)
    //         ->get()
    //         ->map(function ($ticket) {
    //             return [
    //                 'name' => $ticket->user->firstname . ' ' . $ticket->user->lastname,
    //                 'total' => $ticket->total,
    //             ];
    //         });
    // }

    // private function getTicketsTrend()
    // {
    //     return Ticket::selectRaw('DATE(created_at) as date, COUNT(*) as total')
    //         ->groupBy('date')
    //         ->orderBy('date')
    //         ->limit(30)
    //         ->pluck('total', 'date');
    // }


    public function index()
    {
        $stats = [
            'tickets_by_system' => Ticket::select('systeme', DB::raw('count(*) as total'))->groupBy('systeme')->get(),
            'unopened_tickets' => Ticket::where('etat', 'Ouvert')->count(),
            'users_by_role' => User::select('role', DB::raw('count(*) as total'))->groupBy('role')->get(),
            'in_progress_tickets' => Ticket::where('etat', 'En cours')->count(),
            'resolved_tickets' => Ticket::where('etat', 'Résolu')->count(),
            'total_tickets' => Ticket::count(),
            'tickets_by_priority' => Ticket::select('priorite', DB::raw('count(*) as total'))->groupBy('priorite')->get(),
            'tickets_by_category' => Ticket::select('categorie', DB::raw('count(*) as total'))->groupBy('categorie')->get(),
            'tickets_by_impact' => Ticket::select('impact', DB::raw('count(*) as total'))->groupBy('impact')->get(),
            'tickets_by_reproducibility' => Ticket::select('reproductibilite', DB::raw('count(*) as total'))->groupBy('reproductibilite')->get(),
        ];

        return view('statistics.index', compact('stats'));
    }



}
