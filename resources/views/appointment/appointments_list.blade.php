<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments List</title>
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
    <div id="navbar-container"></div>
    <main class="container">
        <h2>Appointments List</h2>
        <section id="appointment-list">
            <h3 onclick="toggleList('yesterday-list')">Yesterday's Appointments</h3>
            <ul id="yesterday-list" style="display: none;">
                <li>
                    Appointment 1
                    <button class="btn" onclick="showDetails('2024-06-05', '09:00 AM', 'Dr. Jane Smith', 'John Doe', 'Routine Checkup')">Details</button>
                </li>
                <!-- Add more dummy appointments for yesterday here -->
            </ul>
            <h3 onclick="toggleList('today-list')">Today's Appointments</h3>
            <ul id="today-list" style="display: none;">
                <li>
                    Appointment 2
                    <button class="btn" onclick="showDetails('2024-06-06', '10:00 AM', 'Dr. Jane Smith', 'John Doe', 'Cavity')">Details</button>
                </li>
                <!-- Add more dummy appointments for today here -->
            </ul>
            <h3 onclick="toggleList('tomorrow-list')">Tomorrow's Appointments</h3>
            <ul id="tomorrow-list" style="display: none;">
                <li>
                    Appointment 3
                    <button class="btn" onclick="showDetails('2024-06-07', '11:00 AM', 'Dr. Jane Smith', 'John Doe', 'Consultation')">Details</button>
                </li>
                <!-- Add more dummy appointments for tomorrow here -->
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
