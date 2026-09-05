<div x-data="{ openModal: false, copied: false, pixKey: 'mdudafranca04@gmail.com' }"
     id="raffle-section"
     @scroll-to-raffle.window="$el.scrollIntoView({ behavior: 'smooth' })"
     @open-modal.window="openModal = true"
     @close-modal.window="openModal = false"
     @tickets-reserved.window="window.open('https://wa.me/5581997328920?text=Oi Arthur e Duda! Reservei os assentos ' + $event.detail.numbers.join(', ') + ' e já fiz o PIX no valor de R$ ' + $event.detail.total + ',00!', '_blank')">
    
    <div class="bg-black/20 backdrop-blur-md border border-white/10 rounded-3xl p-4 sm:p-8 md:p-12 w-full max-w-4xl mx-auto shadow-2xl mt-8 sm:mt-12 relative">
        
        <!-- Section Header -->
        <div class="text-center mb-6 sm:mb-10">
            <h2 class="text-xl sm:text-3xl font-semibold text-white tracking-tight mb-1 sm:mb-2">Ajude na nossa Bagagem</h2>
            <p class="text-blue-300 font-medium text-sm sm:text-lg">(e concorra a um Voucher Airbnb de R$ 500)</p>
            <div class="mt-3 sm:mt-4 inline-flex items-center gap-1.5 sm:gap-2 bg-blue-500/20 px-3 py-1 sm:px-4 sm:py-1.5 rounded-full border border-blue-400/30 text-blue-200 text-xs sm:text-sm font-semibold">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Valor do bilhete: R$ 30,00
            </div>
        </div>

        <!-- Top Checkout Bar -->
        @if(count($selectedNumbers) > 0)
            <div class="bg-blue-900/40 border border-blue-400/30 rounded-2xl p-4 sm:p-6 mb-6 flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-4 animate-scale-up">
                <div class="text-center sm:text-left">
                    <div class="text-blue-200 text-xs sm:text-sm mb-0.5">Você selecionou <span class="font-bold text-white">{{ count($selectedNumbers) }}</span> assento(s)</div>
                    <div class="text-xl sm:text-2xl font-bold text-white">Total: <span class="text-green-400">R$ {{ count($selectedNumbers) * 30 }},00</span></div>
                </div>
                <button type="button" wire:click="openModal" class="w-full sm:w-auto bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-semibold text-sm sm:text-base rounded-xl px-6 py-3 shadow-[0_0_15px_rgba(59,130,246,0.3)] hover:shadow-[0_0_20px_rgba(59,130,246,0.5)] transition-all">
                    Ir para o Pagamento
                </button>
            </div>
        @endif

        <!-- Grid / Map -->
        <div class="bg-[#0f172a]/80 p-3 sm:p-6 rounded-2xl border border-white/10 shadow-inner mb-6">
            <div class="flex justify-between items-center mb-3 sm:mb-4 text-[10px] sm:text-xs font-semibold text-blue-300 uppercase tracking-widest px-1 sm:px-2">
                <span>Frente</span>
                <span>Aeronave</span>
            </div>
            
            <div class="grid grid-cols-5 min-[400px]:grid-cols-6 sm:grid-cols-8 md:grid-cols-10 gap-1.5 sm:gap-2.5 justify-items-center">
                @for ($i = 1; $i <= 200; $i++)
                    @php
                        $ticket = $tickets->get($i);
                        $isUnavailable = $ticket && in_array($ticket->status, ['reserved', 'paid']);
                        $isSelected = in_array($i, $selectedNumbers);
                    @endphp
                    
                    <button type="button"
                        @if($isUnavailable) disabled @endif
                        wire:click="toggleSelection({{ $i }})"
                        class="
                            w-full h-9 sm:h-12 md:h-14 rounded-t-md sm:rounded-t-lg rounded-b flex items-center justify-center font-bold text-xs sm:text-sm md:text-base transition-all relative
                            @if($isUnavailable)
                                bg-white/10 text-white/30 border border-transparent cursor-not-allowed
                            @elseif($isSelected)
                                bg-blue-600 text-white border-2 border-white shadow-[inset_0_4px_4px_rgba(0,0,0,0.4)] transform translate-y-0.5
                            @else
                                bg-[#0a1128] text-white border border-blue-400/80 hover:bg-blue-800 hover:border-blue-300 cursor-pointer shadow-[0_0_8px_rgba(59,130,246,0.1)] hover:-translate-y-0.5 hover:shadow-[0_0_12px_rgba(59,130,246,0.5)]
                            @endif
                        "
                    >
                        {{ $i }}
                        @if($isUnavailable)
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </div>
                        @endif
                    </button>
                @endfor
            </div>
        </div>

        <!-- Checkout Bar -->
        @if(count($selectedNumbers) > 0)
            <div class="bg-blue-900/40 border border-blue-400/30 rounded-2xl p-4 sm:p-6 flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-4 animate-scale-up">
                <div class="text-center sm:text-left">
                    <div class="text-blue-200 text-xs sm:text-sm mb-0.5">Você selecionou <span class="font-bold text-white">{{ count($selectedNumbers) }}</span> assento(s)</div>
                    <div class="text-xl sm:text-2xl font-bold text-white">Total: <span class="text-green-400">R$ {{ count($selectedNumbers) * 30 }},00</span></div>
                </div>
                <button type="button" wire:click="openModal" class="w-full sm:w-auto bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-semibold text-sm sm:text-base rounded-xl px-6 py-3 shadow-[0_0_15px_rgba(59,130,246,0.3)] hover:shadow-[0_0_20px_rgba(59,130,246,0.5)] transition-all">
                    Ir para o Pagamento
                </button>
            </div>
        @endif

    </div>

    <!-- Modal Alpine -->
    <div x-show="openModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm">
        <div @click.away="openModal = false" class="bg-[#0f172a] border border-blue-400/30 rounded-2xl w-full max-w-md shadow-2xl overflow-hidden animate-scale-up">
            
            <!-- Modal Header -->
            <div class="bg-blue-900/40 border-b border-white/10 px-6 py-4 flex justify-between items-center relative">
                <h3 class="text-xl font-semibold text-white">
                    Reservar {{ count($selectedNumbers) }} Assento(s)
                </h3>
                <button type="button" wire:click="closeModal" class="text-blue-300 hover:text-white transition-colors absolute right-4 top-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <!-- PIX Section -->
                <div class="bg-blue-900/20 border border-blue-400/20 rounded-xl p-5 mb-6 text-center">
                    <div class="text-sm text-blue-200 uppercase tracking-wider mb-1 font-medium">Valor Total</div>
                    <div class="text-3xl font-bold text-green-400 mb-4">R$ {{ count($selectedNumbers) * 30 }},00</div>
                    
                    <div class="text-xs text-blue-300 mb-2">Chave PIX (E-mail)</div>
                    <div class="flex items-center gap-2 bg-black/40 border border-white/10 rounded-lg p-1 pl-4">
                        <span class="font-mono text-white flex-1 text-left truncate" x-text="pixKey"></span>
                        <button type="button"
                            @click="navigator.clipboard.writeText(pixKey).then(() => { copied = true; setTimeout(() => copied = false, 2000) })"
                            class="bg-blue-600 hover:bg-blue-500 text-white text-xs font-semibold px-4 py-2 rounded-md transition-colors whitespace-nowrap"
                            :class="copied ? 'bg-green-600 hover:bg-green-500' : ''"
                        >
                            <span x-show="!copied">Copiar Chave</span>
                            <span x-show="copied" x-cloak>Copiado!</span>
                        </button>
                    </div>
                </div>

                <!-- Reservation Form -->
                <form wire:submit="reserve" class="space-y-4">
                    @error('number') 
                        <div class="bg-red-500/20 text-red-300 text-sm p-3 rounded-lg border border-red-500/30">
                            {{ $message }}
                        </div> 
                    @enderror

                    <div>
                        <label for="raffle_name" class="block text-xs font-medium text-blue-200 mb-1 uppercase tracking-wider">Nome Completo</label>
                        <input type="text" id="raffle_name" wire:model="name" required
                            class="w-full bg-black/30 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition-colors"
                            placeholder="Como deseja ser chamado">
                    </div>

                    <div>
                        <label for="raffle_phone" class="block text-xs font-medium text-blue-200 mb-1 uppercase tracking-wider">Telefone / WhatsApp</label>
                        <input type="text" id="raffle_phone" wire:model="phone" required
                            class="w-full bg-black/30 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition-colors"
                            placeholder="(00) 00000-0000">
                    </div>

                    <div class="pt-2">
                        <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-semibold text-lg rounded-xl px-4 py-4 transition-all shadow-[0_0_15px_rgba(59,130,246,0.3)] hover:shadow-[0_0_20px_rgba(59,130,246,0.5)] transform hover:-translate-y-0.5 flex items-center justify-center gap-2"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove>Confirmar Reserva</span>
                            <span wire:loading>Processando...</span>
                            <svg wire:loading.remove class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<style>
    [x-cloak] { display: none !important; }
    .animate-scale-up {
        animation: scaleUp 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    @keyframes scaleUp {
        from { opacity: 0; transform: scale(0.95) translateY(10px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
</style>
