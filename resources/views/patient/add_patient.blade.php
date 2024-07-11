<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <div class="container">
        <h2>Add Patient</h2>
        <form action="{{route('patients.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" :value="old('name')">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="phone_num">Phone Number:</label>
                <input type="text" id="phone_num" name="phone_num"  onkeypress="return isNumberKey(event)" :value="old('phone_num')">
                <x-input-error :messages="$errors->get('phone_num')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age"  onkeypress="return isNumberKey(event)" :value="old('age')">
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" :value="old('address')">
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <button type="submit" class="btn">Add Patient</button>
        </form>
    </div>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            return (charCode >= 48 && charCode <= 57);
        }
    </script>
    <script>
        // Dropdown toggle
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.dropdown').forEach(drop => {
                drop.addEventListener('click', function () {
                    this.querySelector('.dropdown-content').classList.toggle('show');
                });
            });
        });

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>
