<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors List</title>
    <style>
        .button-group {
            display: flex;
            gap: 10px; /* Space between buttons */
        }
        .button-group button {
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            z-index: 9999;
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }
    </style>
    <script>
        function showDetails(name, phone, address, specialization, experience, schedule, startShift, endShift, doctorCut,amount_due) {
            document.getElementById('details-name').innerText = name;
            document.getElementById('details-phone').innerText = phone;
            document.getElementById('details-address').innerText = address;
            document.getElementById('details-specialization').innerText = specialization;
            document.getElementById('details-schedule').innerText = schedule;
            document.getElementById('details-start-shift').innerText = startShift;
            document.getElementById('details-end-shift').innerText = endShift;
            document.getElementById('details-doctor-cut').innerText = doctorCut;
            document.getElementById('details-amount-due').innerText = amount_due;
            document.getElementById('details-popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hideDetails() {
            document.getElementById('details-popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function showPayPopup(doctor_id) {
            document.getElementById('pay-popup').style.display = 'block';
            document.getElementById('pay-dcotor_id').value = doctor_id;
            document.getElementById('overlay').style.display = 'block';
        }

        function hidePayPopup() {
            document.getElementById('pay-popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <main class="container">
        <h2>Doctors List</h2>
        <section id="patient-list">
            <ul>
                @foreach ($doctors as $index => $doctor)
                <li>
                    <span>{{ $doctor->name }}</span>
                    <div class="button-group">
                        <button class="details-button" onclick="showDetails('{{ $doctor->name }}', '{{ $doctor->phone_num }}', '{{ $doctor->address }}', '{{ $doctor->age }}', '{{ $doctor->speciality }}', '{{ $doctor->schedule }}', '{{ $doctor->shift_start }}', '{{ $doctor->shift_end }}', '{{ $doctor->cut }}%' ,'{{ $doctor->amount_due }}$')">Details</button>
                        <button class="pay-button" onclick="showPayPopup('{{$doctor->id}}')">Pay</button>
                        <button class="view-payment-button" onclick="window.location.href='{{ route('doctor.payment_history', $doctor->id) }}'">View Payment History</button>
                    </div>
                </li>
                @endforeach
            </ul>
        </section>
        <div id="details-popup" class="popup">
            <h2>Doctor Details</h2>
            <p><strong>Name:</strong> <span id="details-name"></span></p>
            <p><strong>Phone:</strong> <span id="details-phone"></span></p>
            <p><strong>Address:</strong> <span id="details-address"></span></p>
            <p><strong>Specialization:</strong> <span id="details-specialization"></span></p>
            <p><strong>Schedule:</strong> <span id="details-schedule"></span></p>
            <p><strong>Start Shift:</strong> <span id="details-start-shift"></span></p>
            <p><strong>End Shift:</strong> <span id="details-end-shift"></span></p>
            <p><strong>Doctor Cut:</strong> <span id="details-doctor-cut"></span></p>
            <p><strong>ِAmount Due:</strong> <span id="details-amount-due"></span></p>
            <button class="btn" onclick="hideDetails()">Close</button>
        </div>
        <div id="pay-popup" class="popup">
            <h2>Pay</h2>
            <form method="POST" action="{{route('doctors.pay')}}">
                @csrf
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" min="0" step="0.01">
                <input type="hidden" id="pay-dcotor_id" name="doctor_id" value="">

            </div>
            <button class="btn" type="submit">Pay</button>
            </form>
        </div>

        <div id="overlay" class="overlay" onclick="hideDetails(); hidePayPopup();"></div>
    </main>
</body>
</html>
