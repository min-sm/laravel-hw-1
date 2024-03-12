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
    <title>Adding new drug</title>
</head>

<body>

    @section('right_side')
        <h1 class="text-center text-2xl font-bold mb-2">Add new drug</h1>

        <form action="/drug" method="POST">
            @csrf
            <label for="drug_name">Drug name:</label>
            <input type="text" name="drug_name" id="drug_name" value="{{ old('drug_name') }}">

            <label for="drug_amt">Drug amount:</label>
            <input type="text" name="drug_amt" id="drug_amt" value="{{ old('drug_amt') }}">

            <input id="miligrams" name="drug_amt_unit" value="1" type="radio">

            <div class="flex items-center mb-4">
                <input id="default-radio-1" type="radio" value="" name="default-radio"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">mg (miligrams)</label>
            </div>
            <div class="flex items-center">
                <input checked id="default-radio-2" type="radio" value="" name="default-radio"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">g (grams)</label>
            </div>

        </form>
    @endsection
    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
