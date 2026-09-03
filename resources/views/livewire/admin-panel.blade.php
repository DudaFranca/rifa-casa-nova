<div class="p-8 max-w-6xl mx-auto w-full">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-10 gap-4">
        <h1 class="text-3xl font-bold text-blue-300">Torre de Controle</h1>
        <div class="bg-blue-900/60 border border-blue-400/30 rounded-xl px-6 py-3 text-center">
            <div class="text-sm text-blue-200 uppercase tracking-wider">Total de Pessoas Confirmadas</div>
            <div class="text-3xl font-bold">{{ $totalConfirmed }}</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Check-in -->
        <div class="bg-white/5 backdrop-blur-md rounded-3xl p-6 border border-white/10">
            <h2 class="text-xl font-semibold mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Check-in (Lista de Presença)
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/10 text-sm text-blue-300">
                            <th class="py-3 px-4">Nome</th>
                            <th class="py-3 px-4">WhatsApp</th>
                            <th class="py-3 px-4">Acompanhantes</th>
                            <th class="py-3 px-4">Recado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($guests as $guest)
                        <tr class="border-b border-white/5 hover:bg-white/5">
                            <td class="py-3 px-4">{{ $guest->name }}</td>
                            <td class="py-3 px-4">{{ $guest->phone }}</td>
                            <td class="py-3 px-4">{{ $guest->companions_count ?? 0 }}</td>
                            <td class="py-3 px-4 max-w-xs truncate" title="{{ $guest->message }}">{{ $guest->message ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-white/50">Nenhum convidado confirmado ainda.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bagagem (Rifa) -->
        <div class="bg-white/5 backdrop-blur-md rounded-3xl p-6 border border-white/10">
            <h2 class="text-xl font-semibold mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                Bagagem (Gestão da Rifa)
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/10 text-sm text-blue-300">
                            <th class="py-3 px-4">Assento</th>
                            <th class="py-3 px-4">Comprador</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4 text-right">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tickets as $ticket)
                        <tr class="border-b border-white/5 hover:bg-white/5">
                            <td class="py-3 px-4 font-mono">{{ str_pad($ticket->number, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="py-3 px-4">
                                <div>{{ $ticket->guest_name }}</div>
                                <div class="text-xs text-white/50">{{ $ticket->phone }}</div>
                            </td>
                            <td class="py-3 px-4">
                                @if($ticket->status === 'paid')
                                    <span class="bg-green-500/20 text-green-400 text-xs px-2 py-1 rounded-full border border-green-500/30">Pago</span>
                                @else
                                    <span class="bg-yellow-500/20 text-yellow-400 text-xs px-2 py-1 rounded-full border border-yellow-500/30">Reservado</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    @if($ticket->status === 'reserved')
                                        <button wire:click="markAsPaid({{ $ticket->id }})" class="bg-blue-600 hover:bg-blue-500 text-white text-xs px-3 py-1.5 rounded-lg transition-colors">
                                            Confirmar PIX
                                        </button>
                                    @endif
                                    <button wire:click="cancelTicket({{ $ticket->id }})" 
                                            wire:confirm="Tem certeza que deseja cancelar a compra/reserva do assento {{ str_pad($ticket->number, 2, '0', STR_PAD_LEFT) }}?"
                                            class="bg-red-500/20 hover:bg-red-600 text-red-300 hover:text-white border border-red-500/30 text-xs px-3 py-1.5 rounded-lg transition-colors">
                                        Cancelar
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-white/50">Nenhuma reserva encontrada.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
