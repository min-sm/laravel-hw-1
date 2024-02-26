@extends('master_template.dashboard_template')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Adding new room</title>
</head>

<body>

    @section('right_side')
        <h1 class="text-center text-2xl font-bold mb-2">Add new room</h1>
        @php
            // Calculate the starting index for the current page
            $startingIndex = ($bladeRooms->currentPage() - 1) * $bladeRooms->perPage() + 1;
        @endphp

        @foreach ($bladeRooms as $room)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{ $startingIndex++ }}
                </td>
            </tr>
        @endforeach
    @endsection
    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
