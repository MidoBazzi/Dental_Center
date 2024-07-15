<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Case</title>
    <link rel="stylesheet" href="styles.css">
    <script src="include-navbar.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <div id="navbar-container"></div>
    <div class="container">
        <h2>Add Case</h2>
        <form>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description">
            <label for="patient">Patient:</label>
            <input type="text" id="patient" name="patient">
            <label for="doctor">Doctor:</label>
            <input type="text" id="doctor" name="doctor">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount">
            <button type="submit">Add Case</button>
        </form>
    </main>
</body>
</html>
