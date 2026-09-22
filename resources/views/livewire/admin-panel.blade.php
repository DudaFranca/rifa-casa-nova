<div class="p-4 sm:p-8 max-w-6xl mx-auto w-full">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
        <h1 class="text-3xl font-bold text-blue-300">Torre de Controle</h1>
        <div class="flex flex-wrap sm:flex-nowrap gap-4 w-full md:w-auto">
            <div class="bg-blue-900/60 border border-blue-400/30 rounded-xl px-5 py-3 text-center flex-1 sm:flex-none">
                <div class="text-xs text-blue-200 uppercase tracking-wider mb-1 font-medium">Pessoas Confirmadas</div>
                <div class="text-3xl font-bold text-white">{{ $totalConfirmed }}</div>
            </div>
            <div class="bg-purple-900/40 border border-purple-400/30 rounded-xl px-5 py-3 text-center flex-1 sm:flex-none">
                <div class="text-xs text-purple-200 uppercase tracking-wider mb-1 font-medium">Rifas Vendidas</div>
                <div class="text-3xl font-bold text-purple-300 flex items-center justify-center gap-1.5">
                    <span>{{ $totalPaidTickets }}</span>
                    @if($totalReservedTickets > 0)
                        <span class="text-xs font-normal text-purple-200/70" title="{{ $totalReservedTickets }} reservadas pendentes de PIX">(+{{ $totalReservedTickets }} res.)</span>
                    @endif
                </div>
            </div>
            <div class="bg-green-900/40 border border-green-400/30 rounded-xl px-5 py-3 text-center flex-1 sm:flex-none">
                <div class="text-xs text-green-200 uppercase tracking-wider mb-1 font-medium">Valor Arrecadado</div>
                <div class="text-3xl font-bold text-green-400">R$ {{ number_format($totalRaised, 2, ',', '.') }}</div>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-8">
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
                            <th class="py-3 px-4 text-right">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($guests as $guest)
                        <tr class="border-b border-white/5 hover:bg-white/5">
                            <td class="py-3 px-4 font-medium">{{ $guest->name }}</td>
                            <td class="py-3 px-4 whitespace-nowrap">{{ $guest->phone }}</td>
                            <td class="py-3 px-4">{{ $guest->companions_count ?? 0 }}</td>
                            <td class="py-3 px-4 whitespace-normal break-words">{{ $guest->message ?? '-' }}</td>
                            <td class="py-3 px-4 text-right whitespace-nowrap">
                                <button wire:click="cancelGuest({{ $guest->id }})" 
                                        wire:confirm="Tem certeza que deseja cancelar a presença de {{ $guest->name }}?"
                                        class="bg-red-500/20 hover:bg-red-600 text-red-300 hover:text-white border border-red-500/30 text-xs px-3 py-1.5 rounded-lg transition-colors">
                                    Cancelar Presença
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-white/50">Nenhum convidado confirmado ainda.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bagagem (Rifa) -->
        <div class="bg-white/5 backdrop-blur-md rounded-3xl p-6 border border-white/10">
            <div class="flex items-center justify-between mb-6 flex-wrap gap-2">
                <h2 class="text-xl font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    Bagagem (Gestão da Rifa)
                </h2>
                <div class="flex items-center gap-2">
                    <span class="bg-purple-500/20 text-purple-300 text-xs px-3 py-1 rounded-full border border-purple-500/30 font-medium">
                        {{ $totalPaidTickets }} Vendidos (Pagos)
                    </span>
                    @if($totalReservedTickets > 0)
                        <span class="bg-yellow-500/20 text-yellow-300 text-xs px-3 py-1 rounded-full border border-yellow-500/30 font-medium">
                            {{ $totalReservedTickets }} Reservados
                        </span>
                    @endif
                </div>
            </div>
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
                                        <button wire:click="cancelTicket({{ $ticket->id }})" 
                                                wire:confirm="Tem certeza que deseja cancelar a reserva do assento {{ str_pad($ticket->number, 2, '0', STR_PAD_LEFT) }}?"
                                                class="bg-red-500/20 hover:bg-red-600 text-red-300 hover:text-white border border-red-500/30 text-xs px-3 py-1.5 rounded-lg transition-colors">
                                            Cancelar
                                        </button>
                                    @else
                                        <span class="text-xs text-white/40 italic">Não cancelável (Pago)</span>
                                    @endif
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
