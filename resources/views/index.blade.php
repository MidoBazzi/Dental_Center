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

        @include('layouts.navbar')

    <div id="statistics">
        <div class="stat">
            <h2>Number of Patients This Month</h2>
            <canvas id="patientsChart"></canvas>
        </div>
        <div class="stat">
            <h2>Most Frequent Medical Cases</h2>
            <canvas id="casesChart"></canvas>
        </div>
    </div>
    <script>
        const ctx1 = document.getElementById('patientsChart').getContext('2d');
        const patientsChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: '# of Patients',
                    data: [8, 18, 5, 12],
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('casesChart').getContext('2d');
        const casesChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Cavity', 'Gum Disease', 'Toothache', 'Other'],
                datasets: [{
                    label: 'Most Frequent Medical Cases',
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
</body>
</html>
