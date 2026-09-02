<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RaffleTicket;

class RaffleTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 200; $i++) {
            RaffleTicket::create([
                'number' => $i,
                'status' => 'available',
            ]);
        }
    }
}
