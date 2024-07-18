<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cases List</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function showDetails(description, patient, doctor, amount, amount_left) {
            document.getElementById('details-description').innerText = description;
            document.getElementById('details-patient').innerText = patient;
            document.getElementById('details-doctor').innerText = doctor;
            document.getElementById('details-amount').innerText = amount;
            document.getElementById('details-amount_left').innerText = amount_left;
            document.getElementById('details-popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hideDetails() {
            document.getElementById('details-popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function showPayPopup(amount, caseId) {
            document.getElementById('pay-amount').value = amount;
            document.getElementById('pay-dentalcase_id').value = caseId;
            document.getElementById('pay-popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hidePayPopup() {
            document.getElementById('pay-popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function showEndPopup(caseId) {
            document.getElementById('end-dentalcase_id').value = caseId;
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
                    <span>{{ $case->desc }} @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif</span>
                    <div class="button-group">
                        @php
                            $amount_left = 0;
                            foreach ($case->payments as $payment) {
                                $amount_left += $payment->amount;
                            }
                        @endphp
                        <button class="details-button" onclick="showDetails('{{ $case->desc }}', '{{ $case->patient->name }}', 'Dr. {{ $case->doctor->name }}', '{{ $case->amount }}', '{{ $case->amount - $amount_left }}')">Details</button>
                        <button class="pay-button" onclick="showPayPopup('{{ $case->amount }}', '{{ $case->id }}')">Pay</button>
                        <button class="end-button" onclick="showEndPopup('{{ $case->id }}')">End</button>
                        <button class="view-payments-button" onclick="window.location.href='{{ route('cases.payments', $case->id) }}'">View Payments History</button>
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
            <p><strong>Amount left:</strong> $<span id="details-amount_left"></span></p>
            <button class="btn" onclick="hideDetails()">Close</button>
        </div>

        <div id="pay-popup" class="popup">
            <h2>Pay</h2>
            <div class="form-group">
                <form method="POST" action="{{ route('cases.pay') }}">
                    @csrf
                    <label for="pay-amount">Amount:</label>
                    <input type="number" id="pay-amount" name="amount" min="0" step="0.01">
                    <input type="hidden" id="pay-dentalcase_id" name="dentalcase_id" value="">
                    <button type="submit" class="btn">Pay</button>
                </form>
            </div>
            <button class="btn" onclick="hidePayPopup()">Cancel</button>
        </div>

        <div id="end-popup" class="popup">
            <h2>End Case</h2>
            <p>Are you sure you want to end this case?</p>
            <form method="POST" action="{{ route('cases.end') }}">
                @csrf
                <input type="hidden" id="end-dentalcase_id" name="dentalcase_id" value="">
                <button type="submit" class="btn">Confirm</button>
            </form>
            <button class="btn" onclick="hideEndPopup()">Cancel</button>
        </div>

        <div id="overlay" class="overlay" onclick="hideDetails(); hidePayPopup(); hideEndPopup();"></div>
    </main>
</body>
</html>
