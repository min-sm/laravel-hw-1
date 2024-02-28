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
    <title>Dashboard</title>
</head>

<body>
    @section('right_side')
        <div class="grid grid-cols-2 gap-4">
            {{-- first_first  --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-red-500">Rooms</p>
                    <a href="/room/create"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 float-right">Add
                        new room</a>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bladeRooms as $room)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
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
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <a href="/room"
                    class="font-medium text-sm underline text-blue-500 float-right my-3 hover:cursor-pointer hover:text-blue-700">See
                    all</a>
            </div>

            <!-- sec_first -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-red-500">Drug</p>
                    <a href="/room/create"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 float-right">Add
                        new drug</a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Drug name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stock Left
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bladeDrugs as $drug)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $drug->drug_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $drug->drug_amt }} {{ $drug->drug_amt_unit === 1 ? 'g' : 'mg' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ number_format($drug->drug_stock) }}
                                    </td>
                                    <td class="px-6 py-4 text-green-500">
                                        $ {{ number_format($drug->drug_price, 2) }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <a href="/drug"
                    class="font-medium text-sm underline text-blue-500 float-right my-3 hover:cursor-pointer hover:text-blue-700">See all</a>
            </div>
        </div>

        {{-- first_sec --}}
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endsection

    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
