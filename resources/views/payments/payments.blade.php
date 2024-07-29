<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="patients.html">Patients</a></li>
                <li><a href="doctors.html">Doctors</a></li>
                <li><a href="appointments.html">Appointments</a></li>
                <li><a href="cases.html">Cases</a></li>
                <li><a href="payments.html">Payments</a></li>
                <li><a href="material_payments.html">Material Payments</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Payments</h1>
        <form>
            <label for="payment-case">Case:</label>
            <input type="text" id="payment-case" name="payment-case">
            <label for="payment-amount">Amount Paid:</label>
            <input type="number" id="payment-amount" name="payment-amount">
            <label for="payment-date">Date:</label>
            <input type="date" id="payment-date" name="payment-date">
            <button type="submit">Add Payment</button>
        </form>
        <section id="payment-list">
            <h2>Payment List</h2>
            <ul>
                <li>Case 1, $100, 2024-06-05</li>
                <!-- Add more dummy payments here -->
            </ul>
        </section>
    </main>
</body>
</html>
