<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="styles.css">
    <script src="include-navbar.js" defer></script>
</head>
<body>
    <div class="container">
        <h2>Add Doctor</h2>
        <form>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization">
            </div>
            <div class="form-group">
                <label for="experience">Experience (years):</label>
                <input type="number" id="experience" name="experience">
            </div>
            <button type="submit" class="btn">Add Doctor</button>
        </form>
    </div>

    <script>
        // Dropdown toggle
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.dropdown').forEach(drop => {
                drop.addEventListener('click', function () {
                    this.querySelector('.dropdown-content').classList.toggle('show');
                });
            });
        });

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>
