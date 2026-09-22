<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A&D - Casa Nova</title>

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
                A&D Airlines
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
                    <div class="p-5 sm:p-8 md:p-12 relative z-20">
                        
                        <!-- Top Header (Guardem essa data / DATA / VOO) -->
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center w-full mb-8 sm:mb-12 gap-6">
                            <div class="text-[#60a5fa] text-lg sm:text-xl font-normal tracking-wide flex items-center gap-2">
                                Guardem essa data <span class="text-yellow-400">💛</span>
                            </div>
                            <div class="flex gap-6 sm:gap-12 md:gap-16 text-right w-full sm:w-auto justify-between sm:justify-end">
                                <div class="flex flex-col items-end">
                                    <span class="text-[9px] sm:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-1">Data</span>
                                    <span class="text-xl sm:text-2xl md:text-3xl font-semibold text-white tracking-wide">07.11.2026</span>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span class="text-[9px] sm:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-1">Voo</span>
                                    <span class="text-xl sm:text-2xl md:text-3xl font-semibold text-white tracking-wide">AE-0711</span>
                                </div>
                            </div>
                        </div>

                        <!-- Middle Section (A&D / Plane / CSN) -->
                        <div class="flex items-center justify-between w-full py-4 sm:py-6 md:py-8 mb-8 sm:mb-12 gap-1 sm:gap-4">
                            <!-- Coluna Esquerda -->
                            <div class="flex flex-col items-start w-1/3 min-w-0">
                                <span class="text-[9px] sm:text-[11px] font-semibold tracking-[0.1em] sm:tracking-[0.15em] text-[#60a5fa] uppercase mb-1 sm:mb-2 truncate w-full">Arthur & Duda</span>
                                <span class="text-3xl min-[380px]:text-4xl sm:text-5xl md:text-[5.5rem] leading-none font-light text-white tracking-normal sm:tracking-widest">A&D</span>
                            </div>

                            <!-- Coluna Central -->
                            <div class="flex justify-center items-center shrink-0 w-1/3 text-[#60a5fa] px-1 sm:px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 sm:w-12 sm:h-12 md:w-16 md:h-16">
                                    <path d="M22 13.5v-3c0-.8-.7-1.5-1.5-1.5H16l-4-6H9l3 6H7l-2-2H3l2 4-2 4h2l2-2h5l-3 6h3l4-6h4.5c.8 0 1.5-.7 1.5-1.5Z"/>
                                </svg>
                            </div>

                            <!-- Coluna Direita -->
                            <div class="flex flex-col items-end w-1/3 min-w-0 text-right">
                                <span class="text-[9px] sm:text-[11px] font-semibold tracking-[0.1em] sm:tracking-[0.15em] text-[#60a5fa] uppercase mb-1 sm:mb-2 truncate w-full">Casa Nova</span>
                                <span class="text-3xl min-[380px]:text-4xl sm:text-5xl md:text-[5.5rem] leading-none font-light text-white tracking-tight">CSN</span>
                            </div>
                        </div>

                        <!-- Grid Section (4 columns layout: Destino 1x, Local 2x, Embarque 1x) -->
                        <div class="grid grid-cols-4 gap-3 sm:gap-6 mb-6 sm:mb-8">
                            <div class="col-span-1 flex flex-col items-start">
                                <span class="text-[9px] sm:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-1">Destino</span>
                                <span class="text-base sm:text-xl md:text-2xl font-bold text-white tracking-tight whitespace-nowrap">Casa Nova</span>
                            </div>
                            <div class="col-span-2 flex flex-col items-start">
                                <span class="text-[9px] sm:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-1">Local</span>
                                <span class="text-base sm:text-xl md:text-2xl font-bold text-white tracking-tight whitespace-nowrap">Pizzaria Atlântico Graças</span>
                            </div>
                            <div class="col-span-1 flex flex-col items-start">
                                <span class="text-[9px] sm:text-[11px] font-semibold tracking-[0.15em] text-[#60a5fa] uppercase mb-1">Embarque</span>
                                <span class="text-base sm:text-xl md:text-2xl font-bold text-white tracking-tight whitespace-nowrap">07.11.2026</span>
                                <span class="text-xs sm:text-base font-semibold text-blue-300 mt-0.5 sm:mt-1">19h</span>
                            </div>
                        </div>

                        <!-- Área de Observação / Endereço -->
                        <div class="p-3.5 sm:p-4 bg-blue-950/40 border border-blue-400/20 rounded-xl sm:rounded-2xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-xs sm:text-sm text-blue-100/90 mb-8 sm:mb-12">
                            <div class="flex items-start gap-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#60a5fa] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <span class="font-semibold text-blue-300 block text-[10px] sm:text-xs uppercase tracking-wider mb-0.5">Endereço</span>
                                    <span>Av. Rui Barbosa, 500 - Graças, Recife - PE, 52011-040</span>
                                </div>
                            </div>
                            <a href="https://maps.google.com/?q=Av.+Rui+Barbosa,+500+-+Gra%C3%A7as,+Recife+-+PE,+52011-040" 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#60a5fa]/10 hover:bg-[#60a5fa]/20 text-[#60a5fa] border border-[#60a5fa]/30 rounded-lg text-xs font-medium transition-colors shrink-0 self-end sm:self-auto">
                                <span>Ver no Google Maps</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        </div>

                        <!-- Perforated Line & Cutouts (in normal flow) -->
                        <div class="relative flex items-center mb-8 sm:mb-10 -mx-5 sm:-mx-8 md:-mx-12">
                            <!-- Left semi-circle cutout -->
                            <div class="w-4 h-8 sm:w-6 sm:h-12 bg-[#0a1128] rounded-r-full border-y border-r border-white/10 shadow-[inset_2px_0_6px_rgba(0,0,0,0.5)]"></div>
                            
                            <!-- Dashed line -->
                            <div class="flex-grow border-t-2 border-dashed border-[#60a5fa]/30"></div>
                            
                            <!-- Right semi-circle cutout -->
                            <div class="w-4 h-8 sm:w-6 sm:h-12 bg-[#0a1128] rounded-l-full border-y border-l border-white/10 shadow-[inset_-2px_0_6px_rgba(0,0,0,0.5)]"></div>
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
