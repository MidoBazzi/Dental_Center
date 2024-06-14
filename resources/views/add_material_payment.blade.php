<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Material Payment</title>
    <link rel="stylesheet" href="styles.css">
    <script src="include-navbar.js" defer></script>
</head>
<body>
    <div id="navbar-container"></div>
    <main>
        <h1>Add Material Payment</h1>
        <form>
            <label for="material">Material:</label>
            <input type="text" id="material" name="material">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price">
            <button type="submit">Add Payment</button>
        </form>
    </main>
</body>
</html>
