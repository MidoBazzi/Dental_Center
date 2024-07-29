<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old Appointments List</title>
    <link rel="stylesheet" href="styles.css">
    <script src="include-navbar.js" defer></script>
    <script>
        function showDetails(date, time, doctor, patient, caseDesc) {
            document.getElementById('details-date').innerText = date;
            document.getElementById('details-time').innerText = time;
            document.getElementById('details-doctor').innerText = doctor;
            document.getElementById('details-patient').innerText = patient;
            document.getElementById('details-case').innerText = caseDesc;
            document.getElementById('details-popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hideDetails() {
            document.getElementById('details-popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function toggleList(id) {
            const list = document.getElementById(id);
            if (list.style.display === "none" || list.style.display === "") {
                list.style.display = "block";
            } else {
                list.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <div id="navbar-container"></div>
    <main class="container">
        <h2>Old Appointments List</h2>
        <section id="appointment-list">
            <h3 onclick="toggleList('past-list')">Past Appointments</h3>
            <ul id="past-list" style="display: none;">
                <li>
                    Appointment 1
                    <button class="btn" onclick="showDetails('2024-06-05', '09:00 AM', 'Dr. Jane Smith', 'John Doe', 'Routine Checkup')">Details</button>
                </li>
                <!-- Add more dummy appointments for past here -->
            </ul>
        </section>
        <div id="details-popup" class="popup">
            <h2>Appointment Details</h2>
            <p><strong>Date:</strong> <span id="details-date"></span></p>
            <p><strong>Time:</strong> <span id="details-time"></span></p>
            <p><strong>Doctor:</strong> <span id="details-doctor"></span></p>
            <p><strong>Patient:</strong> <span id="details-patient"></span></p>
            <p><strong>Case:</strong> <span id="details-case"></span></p>
            <button class="btn" onclick="hideDetails()">Close</button>
        </div>
        <div id="overlay" class="overlay" onclick="hideDetails()"></div>
    </main>
</body>
</html>
