<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors List</title>
    <script>
        function showDetails(name, phone, address, specialization, experience, schedule, startShift, endShift, doctorCut) {
            document.getElementById('details-name').innerText = name;
            document.getElementById('details-phone').innerText = phone;
            document.getElementById('details-address').innerText = address;
            document.getElementById('details-specialization').innerText = specialization;
            document.getElementById('details-experience').innerText = experience + ' years';
            document.getElementById('details-schedule').innerText = schedule;
            document.getElementById('details-start-shift').innerText = startShift;
            document.getElementById('details-end-shift').innerText = endShift;
            document.getElementById('details-doctor-cut').innerText = doctorCut;
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
        <h2>Doctors List</h2>
        <section id="patient-list">
            <ul>
                <li>
                    Dr. Jane Smith
                    <button class="details-button" onclick="showDetails('Dr. Jane Smith', '9876543210', '456 Elm St', 'Orthodontist', '15', 'Monday, Wednesday, Friday', '08:00 AM', '04:00 PM', '20%')">Details</button>
                </li>
                <!-- Add more dummy doctors here -->
            </ul>
        </section>
        <div id="details-popup" class="popup">
            <h2>Doctor Details</h2>
            <p><strong>Name:</strong> <span id="details-name"></span></p>
            <p><strong>Phone:</strong> <span id="details-phone"></span></p>
            <p><strong>Address:</strong> <span id="details-address"></span></p>
            <p><strong>Specialization:</strong> <span id="details-specialization"></span></p>
            <p><strong>Experience:</strong> <span id="details-experience"></span></p>
            <p><strong>Schedule:</strong> <span id="details-schedule"></span></p>
            <p><strong>Start Shift:</strong> <span id="details-start-shift"></span></p>
            <p><strong>End Shift:</strong> <span id="details-end-shift"></span></p>
            <p><strong>Doctor Cut:</strong> <span id="details-doctor-cut"></span></p>
            <button class="btn" onclick="hideDetails()">Close</button>
        </div>
        <div id="overlay" class="overlay" onclick="hideDetails()"></div>
    </main>
</body>
</html>
