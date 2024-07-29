<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Material Payment</title>
    <link rel="stylesheet" href="styles.css">
    <script src="include-navbar.js" defer></script>
    <style>
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
            font-size: 16px;
            font-family: Arial, sans-serif;
            min-height: 100px;
        }

        .form-group textarea:focus {
            border-color: #00bfff;
            box-shadow: 0 0 5px rgba(0, 191, 255, 0.5);
            outline: none;
        }
    </style>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <div class="container">
        <h2>Add Material Payment</h2>
        <form action="{{route('materials.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea id="desc" name="desc" rows="4">{{old('desc')}}</textarea>
                <x-input-error :messages="$errors->get('desc')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" value="{{old('price')}}" onkeypress="return isNumberKey(event)">
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="{{old('date')}}">
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>
            <button type="submit" class="btn">Add Payment</button>
        </form>
    </div>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            return (charCode >= 48 && charCode <= 57);
        }
    </script>
</body>
</html>
س
