<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Case</title>
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
