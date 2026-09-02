<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chá de Casa Nova - Arthur e Duda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    <div class="min-h-screen">
        <header class="bg-white shadow-sm py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl font-extrabold text-indigo-600">Casa Nova de Arthur e Duda</h1>
                <p class="mt-2 text-lg text-gray-600">Ajude-nos a construir nosso lar escolhendo um número da nossa rifa!</p>
            </div>
        </header>

        <main class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow px-6 py-8">
                    <h2 class="text-2xl font-bold mb-6">Números da Rifa</h2>
                    <div class="grid grid-cols-5 sm:grid-cols-10 md:grid-cols-12 lg:grid-cols-20 gap-2">
                        @foreach ($tickets as $ticket)
                            <div class="flex items-center justify-center p-2 rounded 
                                @if($ticket->status === 'available') bg-green-100 text-green-800 border border-green-200 hover:bg-green-200 cursor-pointer
                                @elseif($ticket->status === 'reserved') bg-yellow-100 text-yellow-800 border border-yellow-200
                                @else bg-gray-200 text-gray-500 border border-gray-300 @endif">
                                {{ $ticket->number }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>
    @livewireScripts
</body>
</html>
