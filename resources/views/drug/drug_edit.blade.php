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
    <title>Editing {{ $drug->drug_name }}</title>
</head>

<body>

    @section('right_side')
        <h1 class="text-center text-2xl font-bold mb-2">Editing {{ $drug->drug_name }}</h1>
        <form action="/drug/{{ $drug->id }}" method="POST">
            @csrf
            @method('put')
            <label for="drug_name">Drug name:</label>
            <input type="text" name="drug_name" id="drug_name" value="{{ old('drug_name') }}">

            <label for="drug_amt">Drug amount:</label>
            <input type="text" name="drug_amt" id="drug_amt" value="{{ old('drug_amt') }}">

            <div class="flex flex-col">
                <div>
                    <input id="miligrams" name="drug_amt_unit" value="1" type="radio">
                    <label for="miligrams">Miligrams (mg)</label>
                </div>
                <div>
                    <input id="grams" name="drug_amt_unit" value="2" type="radio">
                    <label for="grams">Grams (g)</label>
                </div>
            </div>
            <br>
            <label for="drug_stock">Drug stock</label>
            <input id="drug_stock" name="drug_stock" required type="number" value="{{ old('drug_stock') }}">

            <label for="drug_price">Drug price</label>
            <input id="drug_price" name="drug_price" required type="number" value="{{ old('drug_price') }}">

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add</button>
        </form>
    @endsection
    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
