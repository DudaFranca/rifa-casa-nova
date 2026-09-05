<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Guest;
use App\Models\RaffleTicket;

class AdminPanel extends Component
{
    public $password = '';
    public $isAuthenticated = false;

    public function authenticate()
    {
        if ($this->password === 'admin123') {
            $this->isAuthenticated = true;
        } else {
            $this->addError('password', 'Senha incorreta.');
        }
    }

    public function cancelGuest($guestId)
    {
        $guest = Guest::find($guestId);
        if ($guest) {
            $guest->delete();
        }
    }

    public function markAsPaid($ticketId)
    {
        $ticket = RaffleTicket::find($ticketId);
        if ($ticket) {
            $ticket->update(['status' => 'paid']);
        }
    }

    public function cancelTicket($ticketId)
    {
        $ticket = RaffleTicket::find($ticketId);
        if ($ticket && $ticket->status !== 'paid') {
            $ticket->delete();
        }
    }

    public function render()
    {
        if (!$this->isAuthenticated) {
            return view('livewire.admin-panel-login')->layout('components.layouts.app');
        }

        $guests = Guest::all();
        $totalConfirmed = $guests->sum(function ($guest) {
            return 1 + ($guest->companions_count ?? 0);
        });

        $tickets = RaffleTicket::whereIn('status', ['reserved', 'paid'])->get();
        $totalPaidTickets = $tickets->where('status', 'paid')->count();
        $totalRaised = $totalPaidTickets * 30;

        return view('livewire.admin-panel', [
            'guests' => $guests,
            'totalConfirmed' => $totalConfirmed,
            'tickets' => $tickets,
            'totalRaised' => $totalRaised,
        ])->layout('components.layouts.app');
    }
}
