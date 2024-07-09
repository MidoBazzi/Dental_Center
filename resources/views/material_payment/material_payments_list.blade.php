<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Payments List</title>
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
        function showDetails(material, quantity, price) {
            document.getElementById('details-material').innerText = material;
            document.getElementById('details-quantity').innerText = quantity;
            document.getElementById('details-price').innerText = price;
            document.getElementById('details-popup').style.display = 'block';
        }

        function hideDetails() {
            document.getElementById('details-popup').style.display = 'none';
        }
    </script>
</head>
<body>
    <div id="navbar-container"></div>
    <main>
        <h1>Material Payments List</h1>
        <section id="payment-list">
            <ul>
                <li>Material 1, <button onclick="showDetails('Toothpaste', '100', '300')">Details</button></li>
                <!-- Add more dummy payments here -->
            </ul>
        </section>
        <div id="details-popup" class="popup">
            <h2>Payment Details</h2>
            <p><strong>Material:</strong> <span id="details-material"></span></p>
            <p><strong>Quantity:</strong> <span id="details-quantity"></span></p>
            <p><strong>Price:</strong> <span id="details-price"></span></p>
            <button onclick="hideDetails()">Close</button>
        </div>
    </main>
</body>
</html>
