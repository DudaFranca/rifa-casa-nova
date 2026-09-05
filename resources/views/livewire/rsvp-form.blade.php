<div>
    <div class="bg-black/20 backdrop-blur-md border border-white/10 rounded-3xl p-5 sm:p-8 md:p-12 w-full max-w-3xl mx-auto shadow-2xl relative overflow-hidden">
        
        <!-- Decorative Header -->
        <div class="flex flex-col items-center justify-center text-center mb-6 sm:mb-8">
            <div class="flex items-center gap-2 sm:gap-3 mb-2 sm:mb-3">
                <svg class="w-6 h-6 sm:w-8 sm:h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                </svg>
                <h2 class="text-2xl sm:text-3xl font-semibold text-white tracking-tight">Faça seu Check-in</h2>
            </div>
            <p class="text-xs sm:text-base text-blue-200/80 font-light max-w-xl">
                Embarcamos na viagem mais incrível das nossas vidas: morar juntos! Nossa casa nova está ganhando forma e fazemos muita questão que vocês celebrem e inaugurem esse novo destino com a gente.
            </p>
        </div>

        @if($successMessage)
            <div class="bg-green-500/20 border border-green-400/30 rounded-xl p-5 sm:p-6 text-center text-green-300">
                <div class="flex justify-center mb-3">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-semibold mb-1">Check-in realizado com sucesso!</h3>
                <p class="text-xs sm:text-sm opacity-80">Seu cartão de embarque foi confirmado. Mal podemos esperar para celebrar com você!</p>
            </div>
        @else
            <form wire:submit="submit" class="space-y-4 sm:space-y-6 relative z-10">
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                    <!-- Nome -->
                    <div>
                        <label for="name" class="block text-xs sm:text-sm font-medium text-blue-200 mb-1.5 sm:mb-2 uppercase tracking-wider">Nome Completo</label>
                        <input type="text" id="name" wire:model="name" 
                            class="w-full bg-blue-900/30 border border-white/10 rounded-xl px-3.5 py-2.5 sm:px-4 sm:py-3 text-sm sm:text-base text-white placeholder-white/30 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition-colors"
                            placeholder="Nome do Passageiro" required>
                        @error('name') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Telefone -->
                    <div>
                        <label for="phone" class="block text-xs sm:text-sm font-medium text-blue-200 mb-1.5 sm:mb-2 uppercase tracking-wider">Telefone (WhatsApp)</label>
                        <input type="text" id="phone" wire:model="phone" 
                            class="w-full bg-blue-900/30 border border-white/10 rounded-xl px-3.5 py-2.5 sm:px-4 sm:py-3 text-sm sm:text-base text-white placeholder-white/30 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition-colors"
                            placeholder="(00) 00000-0000" required>
                        @error('phone') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-xs sm:text-sm font-medium text-blue-200 mb-1.5 sm:mb-2 uppercase tracking-wider">E-mail</label>
                        <input type="email" id="email" wire:model="email" 
                            class="w-full bg-blue-900/30 border border-white/10 rounded-xl px-3.5 py-2.5 sm:px-4 sm:py-3 text-sm sm:text-base text-white placeholder-white/30 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition-colors"
                            placeholder="seu@email.com" required>
                        @error('email') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Companions -->
                    <div>
                        <label for="companions_count" class="block text-xs sm:text-sm font-medium text-blue-200 mb-1.5 sm:mb-2 uppercase tracking-wider">Acompanhantes (+)</label>
                        <input type="number" id="companions_count" wire:model="companions_count" min="0" 
                            class="w-full bg-blue-900/30 border border-white/10 rounded-xl px-3.5 py-2.5 sm:px-4 sm:py-3 text-sm sm:text-base text-white placeholder-white/30 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition-colors"
                            required>
                        @error('companions_count') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Recado (Message) -->
                <div>
                    <label for="message" class="block text-xs sm:text-sm font-medium text-blue-200 mb-1.5 sm:mb-2 uppercase tracking-wider">Deixe um recado para nós (Opcional)</label>
                    <textarea id="message" wire:model="message" rows="3"
                        class="w-full bg-blue-900/30 border border-white/10 rounded-xl px-3.5 py-2.5 sm:px-4 sm:py-3 text-sm sm:text-base text-white placeholder-white/30 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition-colors"
                        placeholder="Escreva sua mensagem com carinho..."></textarea>
                    @error('message') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="pt-2 sm:pt-4">
                    <button type="submit" 
                        class="w-full bg-gradient-to-r from-[#D4AF37] to-[#F3E5AB] hover:from-[#C5A017] hover:to-[#E3D59B] text-[#5C4000] font-bold text-base sm:text-lg rounded-xl px-6 py-3.5 sm:px-8 sm:py-4 shadow-[0_0_20px_rgba(212,175,55,0.4)] transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove>Confirmar Presença</span>
                        <span wire:loading>Processando Check-in...</span>
                        <svg wire:loading.remove class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
                
            </form>
        @endif
    </div>
</div>
