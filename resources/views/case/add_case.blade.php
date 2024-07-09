<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Case</title>
    <link rel="stylesheet" href="styles.css">
    <script src="include-navbar.js" defer></script>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <div id="navbar-container"></div>
    <main>
        <h1>Add Case</h1>
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
