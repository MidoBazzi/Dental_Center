<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients List</title>
    <link rel="stylesheet" href="styles.css">
    <script src="include-navbar.js" defer></script>
    <script>
        function showDetails(name, phone, age, address) {
            document.getElementById('details-name').innerText = name;
            document.getElementById('details-phone').innerText = phone;
            document.getElementById('details-age').innerText = age;
            document.getElementById('details-address').innerText = address;
            document.getElementById('details-popup').classList.add('show');
            document.getElementById('overlay').classList.add('show');
        }

        function hideDetails() {
            document.getElementById('details-popup').classList.remove('show');
            document.getElementById('overlay').classList.remove('show');
        }
    </script>
</head>
<body>
    <main class="container">
        <h2>Patients List</h2>
        <section id="patient-list">
            <ul>
                <li>
                    <span>John Doe</span>
                    <button onclick="showDetails('John Doe', '1234567890', '30', '123 Main St')">Details</button>
                </li>
                <li>
                    <span>John Doe</span>
                    <button onclick="showDetails('John Doe', '1234567890', '30', '123 Main St')">Details</button>
                </li>
                <!-- Add more dummy patients here -->
            </ul>
        </section>
        <div id="details-popup" class="popup">
            <h2>Patient Details</h2>
            <p><strong>Name:</strong> <span id="details-name"></span></p>
            <p><strong>Phone:</strong> <span id="details-phone"></span></p>
            <p><strong>Age:</strong> <span id="details-age"></span></p>
            <p><strong>Address:</strong> <span id="details-address"></span></p>
            <button onclick="hideDetails()">Close</button>
        </div>
        <div id="overlay" class="overlay" onclick="hideDetails()"></div>
    </main>
</body>
</html>
