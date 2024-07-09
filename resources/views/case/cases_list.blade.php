<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cases List</title>
    <link rel="stylesheet" href="styles.css">
    <script src="include-navbar.js" defer></script>
    <style>
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
        }
    </style>
    <script>
        function showDetails(description, patient, doctor, amount) {
            document.getElementById('details-description').innerText = description;
            document.getElementById('details-patient').innerText = patient;
            document.getElementById('details-doctor').innerText = doctor;
            document.getElementById('details-amount').innerText = amount;
            document.getElementById('details-popup').style.display = 'block';
        }

        function hideDetails() {
            document.getElementById('details-popup').style.display = 'none';
        }
    </script>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <div id="navbar-container"></div>
    <main>
        <h1>Cases List</h1>
        <section id="case-list">
            <ul>
                <li>Case 1, <button onclick="showDetails('Cavity Treatment', 'John Doe', 'Dr. Jane Smith', '200')">Details</button></li>
                <!-- Add more dummy cases here -->
            </ul>
        </section>
        <div id="details-popup" class="popup">
            <h2>Case Details</h2>
            <p><strong>Description:</strong> <span id="details-description"></span></p>
            <p><strong>Patient:</strong> <span id="details-patient"></span></p>
            <p><strong>Doctor:</strong> <span id="details-doctor"></span></p>
            <p><strong>Amount:</strong> <span id="details-amount"></span></p>
            <button onclick="hideDetails()">Close</button>
        </div>
    </main>
</body>
</html>
