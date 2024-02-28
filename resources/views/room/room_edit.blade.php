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
    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Editing room</title>
</head>

<body>

    @section('right_side')
        <h1 class="text-center text-2xl font-bold mb-2">Editing room</h1>
        {{-- @if ($errors->any)
            @foreach ($errors as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        @endif --}}
        <form action="/room/{{ $room->id }}" method="POST">
            @csrf
            @method('put')
            <label for="room_no">Room no:</label>
            <input type="text" name="room_no" id="room_no" value="{{ $room->room_no }}" disabled>
            <input type="text" name="room_no" id="room_no" value="{{ $room->room_no }}" class="hidden">

            <label for="no_of_patients">Num of patients:</label>
            <input type="text" name="room_no_of_patients" id="no_of_patients" value="{{ $room->room_no_of_patients }}"
                required>

            <label for="room_price">Room price: </label>
            <input type="text" name="room_price" id="room_price" value="{{ $room->room_price }}" required>


            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>

        </form>
    @endsection
    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
