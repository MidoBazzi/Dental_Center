<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Payments List</title>
    <link rel="stylesheet" href="styles.css">
    <script src="include-navbar.js" defer></script>
    <script>
        function showDetails(description, price, date) {
            document.getElementById('details-description').innerText = description;
            document.getElementById('details-price').innerText = price;
            document.getElementById('details-date').innerText = date;
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
        <h2>Material Payments List</h2>
        <section id="patient-list">
            <ul>
                @foreach ($materials as $material )


                <li>
                    Payment {{$material->id}}
                    <button class="details-button" onclick="showDetails('{{$material->desc}}', '{{$material->price}}', '{{$material->date}}')">Details</button>
                </li>
                @endforeach

            </ul>
        </section>
        <div id="details-popup" class="popup">
            <h2>Payment Details</h2>
            <p><strong>Description:</strong> <span id="details-description"></span></p>
            <p><strong>Price:</strong> <span id="details-price"></span></p>
            <p><strong>Date:</strong> <span id="details-date"></span></p>
            <button class="btn" onclick="hideDetails()">Close</button>
        </div>
        <div id="overlay" class="overlay" onclick="hideDetails()"></div>
    </main>
</body>
</html>
