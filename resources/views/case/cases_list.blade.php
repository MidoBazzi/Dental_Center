<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cases List</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function showDetails(description, patient, doctor, amount) {
            document.getElementById('details-description').innerText = description;
            document.getElementById('details-patient').innerText = patient;
            document.getElementById('details-doctor').innerText = doctor;
            document.getElementById('details-amount').innerText = amount;
            document.getElementById('details-popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hideDetails() {
            document.getElementById('details-popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function showPayPopup(amount) {
            document.getElementById('pay-amount').value = amount;
            document.getElementById('pay-popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hidePayPopup() {
            document.getElementById('pay-popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function showEndPopup() {
            document.getElementById('end-popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hideEndPopup() {
            document.getElementById('end-popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <main class="container">
        <h2>Cases List</h2>
        <section id="patient-list">
            <ul>
                @foreach ($cases as $case)

                <li class="case-item">
                    <span>{{$case->desc}}</span>
                    <div class="button-group">
                        <button class="details-button" onclick="showDetails('{{$case->desc}}', '{{$case->patient->name}}', 'Dr. {{$case->doctor->name}}', '{{$case->amount}}')">Details</button>
                        <button class="pay-button" onclick="showPayPopup()">Pay</button>
                        <button class="end-button" onclick="showEndPopup()">End</button>
                    </div>
                </li>
                @endforeach

            </ul>
        </section>
        <div id="details-popup" class="popup">
            <h2>Case Details</h2>
            <p><strong>Description:</strong> <span id="details-description"></span></p>
            <p><strong>Patient:</strong> <span id="details-patient"></span></p>
            <p><strong>Doctor:</strong> <span id="details-doctor"></span></p>
            <p><strong>Amount:</strong> $<span id="details-amount"></span></p>
            <button class="btn" onclick="hideDetails()">Close</button>
        </div>
        <div id="pay-popup" class="popup">
            <h2>Pay</h2>
            <div class="form-group">
                <label for="pay-amount">Amount:</label>
                <input type="number" id="pay-amount" name="amount" min="0" step="0.01">
            </div>
            <button class="btn" onclick="hidePayPopup()">Pay</button>
        </div>
        <div id="end-popup" class="popup">
            <h2>End Case</h2>
            <p>Are you sure you want to end this case?</p>
            <button class="btn" onclick="hideEndPopup()">Cancel</button>
            <button class="btn" onclick="hideEndPopup()">Confirm</button>
        </div>
        <div id="overlay" class="overlay" onclick="hideDetails(); hidePayPopup(); hideEndPopup();"></div>
    </main>
</body>
</html>
