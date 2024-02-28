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
    <title>Drug List</title>
</head>

<body>

    @section('right_side')
        <h1 class="text-center text-2xl font-bold mb-2">Drug List</h1>
        <div class="text-right mb-4">
            <a href="/drug/create"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">+
                Add new drug</a>

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
                            Stock left
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
                        $startingIndex = ($bladeDrugs->currentPage() - 1) * $bladeDrugs->perPage() + 1;
                    @endphp
                    @foreach ($bladeDrugs as $drug)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{ $startingIndex++ }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $drug->drug_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ number_format($drug->drug_amt) }} {{ $drug->drug_amt_unit === 1 ? 'g' : 'mg' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($drug->drug_stock) }}
                            </td>
                            <td class="px-6 py-4 text-green-500">
                                $ {{ number_format($drug->drug_price, 2) }}
                            </td>
                            <td class="text-center">
                                <a href="drug/{{ $drug->id }}/edit"
                                    class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Edit</a>
                            </td>
                            <td class="text-center">
                                <form action="drug/{{ $drug->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" href="drug/delete"
                                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{ $bladeDrugs->links() }}
    @endsection
    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>