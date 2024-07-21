<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dental Center Home</title>
    <style>
        #statistics {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }
        .stat {
            width: 45%;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .stat h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <div id="statistics">
        <div class="stat">
            <h2>Daily Earnings</h2>
            <canvas id="earningsChart"></canvas>
        </div>
        <div class="stat">
            <h2>Appointments by Doctor</h2>
            <canvas id="appointmentsChart"></canvas>
        </div>
    </div>
    <script>
        // Dummy data for earnings
        const earningsData = {
            labels: [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            datasets: [{
                label: 'Earnings ($)',
                data: [200, 150, 300, 250, 400, 350, 500],
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        };

        const earningsOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        const earningsCtx = document.getElementById('earningsChart').getContext('2d');
        const earningsChart = new Chart(earningsCtx, {
            type: 'bar',
            data: earningsData,
            options: earningsOptions
        });

        // Dummy data for appointments by doctor
        const appointmentsData = {
            labels: ['Dr. Smith', 'Dr. Johnson', 'Dr. Lee', 'Dr. Martinez', 'Dr. Patel'],
            datasets: [{
                label: 'Appointments',
                data: [5, 8, 6, 7, 9],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        };

        const appointmentsCtx = document.getElementById('appointmentsChart').getContext('2d');
        const appointmentsChart = new Chart(appointmentsCtx, {
            type: 'pie',
            data: appointmentsData
        });
    </script>
</body>
</html>
