<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RaffleTicket;

class RaffleGrid extends Component
{
    public array $selectedNumbers = [];
    public $name = '';
    public $phone = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
    ];

    public function toggleSelection($number)
    {
        if (in_array($number, $this->selectedNumbers)) {
            $this->selectedNumbers = array_diff($this->selectedNumbers, [$number]);
        } else {
            $this->selectedNumbers[] = $number;
        }
    }

    public function openModal()
    {
        if (count($this->selectedNumbers) > 0) {
            $this->dispatch('open-modal');
        }
    }

    public function closeModal()
    {
        $this->name = '';
        $this->phone = '';
        $this->resetErrorBag();
        $this->dispatch('close-modal');
    }

    public function reserve()
    {
        $this->validate();

        if (count($this->selectedNumbers) === 0) {
            return;
        }

        $reservedNumbers = [];
        $total = count($this->selectedNumbers) * 30;

        foreach ($this->selectedNumbers as $number) {
            $existing = RaffleTicket::where('number', $number)->first();
            
            // Only reserve if it is not already reserved or paid
            if (!$existing || !in_array($existing->status, ['reserved', 'paid'])) {
                RaffleTicket::updateOrCreate(
                    ['number' => $number],
                    [
                        'guest_name' => $this->name,
                        'phone' => $this->phone,
                        'status' => 'reserved'
                    ]
                );
                $reservedNumbers[] = $number;
            }
        }

        $this->selectedNumbers = [];
        $this->name = '';
        $this->phone = '';
        
        $this->dispatch('close-modal');
        
        if (count($reservedNumbers) > 0) {
            $this->dispatch('tickets-reserved', numbers: $reservedNumbers, total: $total);
        } else {
            $this->addError('number', 'Os números selecionados já foram reservados.');
        }
    }

    public function render()
    {
        $tickets = RaffleTicket::all()->keyBy('number');

        return view('livewire.raffle-grid', [
            'tickets' => $tickets,
        ]);
    }
}
