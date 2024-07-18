<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
    <link rel="stylesheet" href="styles.css">
    <script src="include-navbar.js" defer></script>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <div id="navbar-container"></div>
    <main class="container">
        <h2>Add Appointment</h2>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="patient">Patient:</label>
                <input type="text" id="patient" name="patient">
            </div>
            <div class="form-group">
                <label for="case">Case:</label>
                <input type="text" id="case" name="case">
            </div>
            <div class="form-group">
                <label for="doctor">Doctor:</label>
                <input type="text" id="doctor" name="doctor">
            </div>
            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="time" id="duration" name="duration">
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" id="time" name="time">
            </div>




            <button type="submit" class="btn">Add Appointment</button>
        </form>
    </main>
</body>
</html>
