<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Guest;

class RsvpForm extends Component
{
    public $name;
    public $phone;
    public $email;
    public $companions_count = 0;
    public $message;

    public $successMessage = false;

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'companions_count' => 'required|integer|min:0',
            'message' => 'nullable|string|max:1000',
        ]);

        Guest::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'companions_count' => $this->companions_count,
            'is_confirmed' => true,
            'message' => $this->message,
        ]);

        $this->successMessage = true;
        $this->reset(['name', 'phone', 'email', 'companions_count', 'message']);
        
        // Dispara um evento para rolar a tela até a rifa
        $this->dispatch('scroll-to-raffle');
    }

    public function render()
    {
        return view('livewire.rsvp-form');
    }
}
