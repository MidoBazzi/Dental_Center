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
    <main>
        <h1>Add Case</h1>
        <form>
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
            <label for="patient">Patient:</label>
            <input type="text" id="patient" name="patient">
            <label for="doctor">Doctor:</label>
            <input type="text" id="doctor" name="doctor">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount">
            <button type="submit">Add Case</button>
        </form>
    </main>

    <script>
    $(document).ready(function() {
        $("#doctor").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "/autocomplete/doctors",
                    data: { q: request.term },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 2,
        });

        $("#patient").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "/autocomplete/patients",
                    data: { q: request.term },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 2,
        });
    });
    </script>
</body>
</html>
