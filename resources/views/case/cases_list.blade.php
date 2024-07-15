
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
                <li>
                    Case 1
                    <button class="details-button" onclick="showDetails('Cavity Treatment', 'John Doe', 'Dr. Jane Smith', '200')">Details</button>
                </li>
                <!-- Add more dummy cases here -->
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
        <div id="overlay" class="overlay" onclick="hideDetails()"></div>
    </main>
</body>
</html>
