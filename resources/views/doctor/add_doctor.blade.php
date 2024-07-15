<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            z-index: 1000;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .schedule-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .schedule-group label {
            width: 100px;
            text-align: left;
        }

        .schedule-group input {
            width: auto;
        }

        .schedule-field {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
    <script>
        function showSchedulePopup() {
            document.getElementById('schedule-popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hideSchedulePopup() {
            document.getElementById('schedule-popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function updateScheduleField() {
            const checkboxes = document.querySelectorAll('.schedule-group input[type="checkbox"]');
            const selectedDays = [];
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedDays.push(checkbox.value);
                }
            });
            document.getElementById('schedule').value = selectedDays.join(', ');
        }

        document.addEventListener("DOMContentLoaded", function () {
            // Dropdown toggle
            document.querySelectorAll('.dropdown').forEach(drop => {
                drop.addEventListener('click', function () {
                    this.querySelector('.dropdown-content').classList.toggle('show');
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
        });
    </script>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <div class="container">
        <h2>Add Doctor</h2>
        <form method="POST" action="{{route('doctors.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>
            <div class="form-group">
                <label for="phone_num">Phone Number:</label>
                <input type="text" id="phone_num" name="phone_num" onkeypress="return isNumberKey(event)">
                <x-input-error :messages="$errors->get('phone_num')" class="mt-2" />

            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
                <x-input-error :messages="$errors->get('address')" class="mt-2" />

            </div>
            <div class="form-group">
                <label for="speciality">Specialization:</label>
                <input type="text" id="speciality" name="speciality">
                <x-input-error :messages="$errors->get('speciality')" class="mt-2" />

            </div>
            <div class="form-group">
                <label for="age">Age (years):</label>
                <input type="number" id="age" name="age" onkeypress="return isNumberKey(event)">
                <x-input-error :messages="$errors->get('age')" class="mt-2" />

            </div>
            <div class="form-group">
                <label for="schedule">Schedule:</label>
                <div class="schedule-field">
                    <input type="text" id="schedule" name="schedule" readonly>
                    <button type="button" class="btn" onclick="showSchedulePopup()">Set Schedule</button>
                    <x-input-error :messages="$errors->get('schedule')" class="mt-2" />

                </div>
            </div>
            <div class="form-group">
                <label for="shift_start">Start Shift:</label>
                <input type="time" id="shift_start" name="shift_start">
                <x-input-error :messages="$errors->get('shift_start')" class="mt-2" />

            </div>
            <div class="form-group">
                <label for="shift_end">End Shift:</label>
                <input type="time" id="shift_end" name="shift_end">
                <x-input-error :messages="$errors->get('shift_end')" class="mt-2" />

            </div>
            <div class="form-group">
                <label for="cut">Doctor Cut (%):</label>
                <select id="cut" name="cut">
                    @for ($i = 5; $i <= 75; $i += 5)
                        <option value="{{ $i }}">{{ $i }}%</option>
                    @endfor
                </select>
                <x-input-error :messages="$errors->get('cut')" class="mt-2" />

            </div>
            <button type="submit" class="btn">Add Doctor</button>
        </form>
    </div>

    <div id="schedule-popup" class="popup">
        <h2>Set Schedule</h2>
        <form class="schedule-group" onsubmit="updateScheduleField(); hideSchedulePopup(); return false;">
            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                <div class="form-group">
                    <input type="checkbox" id="{{ strtolower($day) }}" name="schedule[]" value="{{ $day }}">
                    <label for="{{ strtolower($day) }}">{{ $day }}</label>
                </div>
            @endforeach
            <button type="submit" class="btn">Save Schedule</button>
        </form>
    </div>
    <div id="overlay" class="overlay" onclick="hideSchedulePopup()"></div>

    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            return (charCode >= 48 && charCode <= 57);
        }
    </script>
</body>
</html>
