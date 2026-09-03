<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A&E - Casa Nova</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!-- Vite Assets (Tailwind CSS) -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <!-- Fallback if Vite is not running, using CDN -->
            <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        @endif

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="bg-[#0a1128] text-white min-h-screen flex flex-col antialiased selection:bg-blue-500 selection:text-white">
        
        <!-- Header -->
        <header class="w-full py-6 px-4 md:px-8 flex justify-between items-center border-b border-white/10">
            <div class="text-xl font-bold tracking-widest text-blue-300">
                A&E Airlines
            </div>
            <div class="text-sm font-medium tracking-widest uppercase opacity-70">
                Flight CSN-2026
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow flex flex-col items-center justify-center p-4 sm:p-8">
            
            <div class="w-full max-w-3xl relative">
                
                <!-- Ticket Main Background / Container -->
                <div class="bg-white/5 backdrop-blur-md rounded-3xl overflow-hidden border border-white/10 shadow-2xl relative">
                    
                    <!-- Ticket cutouts are now handled inside the flow -->

                    <!-- Ticket Content -->
                    <div class="p-8 sm:p-12 relative z-20">
                        
                        <!-- Top Header (Guardem essa data / DATA / VOO) -->
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center w-full mb-12 gap-8">
                            <div class="text-[#60a5fa] text-xl font-normal tracking-wide flex items-center gap-2">
                                Guardem essa data <span class="text-yellow-400">💛</span>
                            </div>
                            <div class="flex gap-8 md:gap-16 text-right w-full md:w-auto justify-between md:justify-end">
                                <div class="flex flex-col items-end">
                                    <span class="text-[10px] md:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-1">Data</span>
                                    <span class="text-2xl md:text-3xl font-semibold text-white tracking-wide">07.11.2026</span>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span class="text-[10px] md:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-1">Voo</span>
                                    <span class="text-2xl md:text-3xl font-semibold text-white tracking-wide">AE-0711</span>
                                </div>
                            </div>
                        </div>

                        <!-- Middle Section (A&E / Plane / CSN) -->
                        <div class="flex items-center justify-between w-full py-4 md:py-8 mb-12">
                            <!-- Coluna Esquerda -->
                            <div class="flex flex-col items-start w-1/3">
                                <span class="text-[10px] md:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-2">Arthur & Eduarda</span>
                                <span class="text-6xl md:text-[5.5rem] leading-none font-light text-white tracking-widest">A&E</span>
                            </div>

                            <!-- Coluna Central -->
                            <div class="flex justify-center w-1/3 text-[#60a5fa]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12 md:w-16 md:h-16">
                                    <path d="M22 13.5v-3c0-.8-.7-1.5-1.5-1.5H16l-4-6H9l3 6H7l-2-2H3l2 4-2 4h2l2-2h5l-3 6h3l4-6h4.5c.8 0 1.5-.7 1.5-1.5Z"/>
                                </svg>
                            </div>

                            <!-- Coluna Direita -->
                            <div class="flex flex-col items-end w-1/3 text-right">
                                <span class="text-[10px] md:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-2">Casa Nova</span>
                                <span class="text-6xl md:text-[5.5rem] leading-none font-light text-white tracking-tight">CSN</span>
                            </div>
                        </div>

                        <!-- Grid Section (4 columns) -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-6 mb-12">
                            <div class="flex flex-col items-start">
                                <span class="text-[10px] md:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-1">Destino</span>
                                <span class="text-xl md:text-2xl font-bold text-white tracking-tight">Casa Nova</span>
                            </div>
                            <div class="flex flex-col items-start">
                                <span class="text-[10px] md:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-1">Confirmar Até</span>
                                <span class="text-xl md:text-2xl font-bold text-white tracking-tight">18.09</span>
                            </div>
                            <div class="flex flex-col items-start">
                                <span class="text-[10px] md:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-1">Local</span>
                                <span class="text-xl md:text-2xl font-bold text-white tracking-tight">Em breve</span>
                            </div>
                            <div class="flex flex-col items-start">
                                <span class="text-[10px] md:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-1">Embarque</span>
                                <span class="text-xl md:text-2xl font-bold text-white tracking-tight">07.11.2026</span>
                            </div>
                        </div>

                        <!-- Perforated Line & Cutouts (in normal flow) -->
                        <div class="relative flex items-center mb-10 -mx-8 sm:-mx-12">
                            <!-- Left semi-circle cutout -->
                            <div class="w-6 h-12 bg-[#0a1128] rounded-r-full border-y border-r border-white/10 shadow-[inset_3px_0_10px_rgba(0,0,0,0.5)] hidden sm:block"></div>
                            
                            <!-- Dashed line -->
                            <div class="flex-grow border-t-2 border-dashed border-[#60a5fa]/30"></div>
                            
                            <!-- Right semi-circle cutout -->
                            <div class="w-6 h-12 bg-[#0a1128] rounded-l-full border-y border-l border-white/10 shadow-[inset_-3px_0_10px_rgba(0,0,0,0.5)] hidden sm:block"></div>
                        </div>


                        <!-- RSVP Form Livewire Component -->
                        <div class="mt-8 pt-8 border-t border-white/5">
                            <livewire:rsvp-form />
                        </div>

                    </div>
                </div>

                <!-- Raffle Grid Livewire Component -->
                <livewire:raffle-grid />

            </div>
            
        </main>

        <!-- Footer -->
        <footer class="w-full py-8 text-center text-xs text-blue-300/70 border-t border-white/10 mt-auto">
            <p>Sorteio previsto para: 07.11.2026 | Método: Sorteio em Live | Prêmio: Voucher Airbnb de R$ 500,00 entregue digitalmente. Arthur & Duda Agradecem!</p>
        </footer>

    </body>
</html>
