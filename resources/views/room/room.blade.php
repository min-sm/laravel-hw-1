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
    <title>Room List</title>
</head>

<body>

    @section('right_side')
    {{-- {{ dd(gettype($numOfRoom)) }} --}}
        <h1 class="text-center text-2xl font-bold mb-2">{{ __('message.roomList') }} ( {{ trans_choice('message.numOfRoom', 
        $numOfRoom) }} )</h1>
        <div class="text-right mb-4">
            <a href="/room/create"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">+
                Add new room</a>

        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Room no:
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Room status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No of patients
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" colspan="2" class="px-6 py-3 text-center">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Calculate the starting index for the current page
                        $startingIndex = ($bladeRooms->currentPage() - 1) * $bladeRooms->perPage() + 1;
                    @endphp
                    @foreach ($bladeRooms as $room)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{-- {{ $loop->iteration }} --}}
                                {{ $startingIndex++ }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $room->room_no }}
                            </th>
                            <td @class([
                                'py-4',
                                'px-6',
                                $room->room_status === 1 ? 'text-green-300' : null,
                                $room->room_status === 2 ? 'text-blue-300' : null,
                                $room->room_status !== 1 && $room->room_status !== 2
                                    ? 'text-red-300'
                                    : null,
                            ])>
                                {{ $room->room_status === 1 ? 'Available' : ($room->room_status === 2 ? 'Active' : 'Locked') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room->room_no_of_patients }}
                            </td>
                            <td class="px-6 py-4 text-green-500">
                                $ {{ number_format($room->room_price, 2) }}
                            </td>
                            <td class="text-center">
                                <a href="room/{{ $room->id }}/edit"
                                    class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Edit</a>
                            </td>
                            <td class="text-center">
                                <form action="room/{{ $room->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" href="room/delete"
                                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{ $bladeRooms->links() }}
    @endsection
    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
