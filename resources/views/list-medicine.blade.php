<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        h2#swal2-title {
            font-size: 24px;
        }

        div#swal2-html-container {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="mx-auto max-w-2xl py-12">
        <div class="flex justify-between text-blue-900">
            <h1 class="font-bold text-xl mb-4">Lista farmaci</h1>
            <a href="{{ route('medicines.create') }}" class="text-2xl"><i class="bi bi-plus-circle"></i></a>
        </div>

        <ul>
            @foreach ($medicines as $medicine)
                <li class="relative px-4 py-3 bg-gray-200 mt-4 rounded-xl">
                    <button onclick="onListItemClick(event)" class="font-bold uppercase text-blue-900">
                        <span class="mr-1">{{$medicine->name}}</span>
                        <i class="bi bi-arrow-down-circle"></i>
                    </button>
                    <form action="{{ route('medicines.destroy', $medicine->id) }}" method="post" class="inline-block absolute right-0 mr-4" onsubmit="onListItemDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xl text-red-700"><i class="bi bi-trash3"></i></button>
                    </form>
                    <div class="preview text-gray-600 pr-6">
                        <p>{{ Illuminate\Support\Str::limit($medicine->description, 120) }}</p>
                    </div>
                    <div class="hidden detail pr-6">
                        <p>{{ $medicine->description }}</p>
                        <h2 class="font-semibold text-blue-900 text-md mt-2">Ingredienti</h2>
                        <p>{{ $medicine->ingredients }}</p>
                        <h2 class="font-semibold text-blue-900 text-md mt-2">Effetti collaterali</h2>
                        <p>{{ $medicine->effects }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        function onListItemClick(event) {
            const listitem = event.currentTarget.closest('li');
            const ddIcon = event.currentTarget.querySelector('.bi');
            const preview = listitem.querySelector('.preview');
            const detail = listitem.querySelector('.detail');

            if (detail.style.display == "block") {
                ddIcon.classList.remove("bi-arrow-down-circle-fill");
                ddIcon.classList.add("bi-arrow-down-circle");
                preview.style.display = "block";
                detail.style.display = "none";
            } else {
                ddIcon.classList.remove("bi-arrow-down-circle");
                ddIcon.classList.add("bi-arrow-down-circle-fill");
                preview.style.display = "none";
                detail.style.display = "block";
            }
        }

        function onListItemDelete(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Eliminare la voce selezionata?',
                showCancelButton: true,
                showCloseButton: true,
                color: '#000000',
                confirmButtonText: 'Elimina',
                cancelButtonText: 'Annulla',
                confirmButtonColor: 'rgb(30 58 138)'
                })
                .then((result) => {
                    if (result.isConfirmed && event.target != null) {
                        event.target.submit();
                    }
            });
        }
    </script>
</body>
</html>