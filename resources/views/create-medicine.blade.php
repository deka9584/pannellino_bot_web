<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pannellino</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="max-w-2xl mx-auto py-12 h-screen">
        <h1 class="font-bold text-xl mb-4 text-blue-900">Aggiungi farmaco</h1>

        @if ($errors->any())
            <div class="text-red-700">
                <h2 class="font-bold">Errore:</h2>
                <ul class="flex-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('medicines.store') }}" method="post" class="w-full">
            @csrf

            <label for="name" class="block mt-4 mb-2 text-sm text-blue-900 font-semibold">Nome</label>
            <input type="text" name="name" id="name" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Nome">
            
            <label for="description" class="block mt-4 mb-2 text-sm text-blue-900 font-semibold">Descrizione</label>
            <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Descrizione..."></textarea>
            
            <label for="ingredients" class="block mt-4 mb-2 text-sm text-blue-900 font-semibold">Ingredienti</label>
            <textarea name="ingredients" id="ingredients" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Ingredienti"></textarea>

            <label for="effects" class="block mt-4 mb-2 text-sm text-blue-900 font-semibold">Effetti collaterali</label>
            <textarea name="effects" id="effects" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Effetti collaterali..."></textarea>

            <div class="flex justify-between mt-4">
                <a href="{{ route('medicines.index') }}" class="text-blue-900 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center">Annulla</a>
                <button type="submit" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Salva</button>
            </div>
        </form>

    </div>
</body>

</html>