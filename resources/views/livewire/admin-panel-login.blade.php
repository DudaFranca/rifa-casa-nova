<div class="flex-grow flex flex-col items-center justify-center p-4 sm:p-8">
    <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 border border-white/10 shadow-2xl max-w-md w-full">
        <h1 class="text-2xl font-bold text-center mb-6">Acesso Restrito</h1>
        <form wire:submit="authenticate" class="space-y-4">
            <div>
                <input type="password" wire:model="password" class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Senha">
                @error('password') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-semibold py-3 rounded-xl transition-colors">
                Entrar
            </button>
        </form>
    </div>
</div>
