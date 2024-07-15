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
    <div class="container">
        <h2>Add Case</h2>
        <form>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="patient">Patient:</label>
                <input type="text" id="patient" name="patient">
            </div>
            <div class="form-group">
                <label for="doctor">Doctor:</label>
                <input type="text" id="doctor" name="doctor">
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount">
            </div>
            <button type="submit" class="btn">Add Case</button>
        </form>
    </div>
</body>
</html>
