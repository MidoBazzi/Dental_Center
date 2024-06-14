<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <title>Dental Center Navbar</title>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="logo.png" alt="Dental Center Logo">
            <span>Dental Center</span>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Patients</a>
                    <div class="dropdown-content">
                        <a href="add_patient.html">Add Patient</a>
                        <a href="patients_list.html">Patients List</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Doctors</a>
                    <div class="dropdown-content">
                        <a href="add_doctor.html">Add Doctor</a>
                        <a href="doctors_list.html">Doctors List</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Appointments</a>
                    <div class="dropdown-content">
                        <a href="add_appointment.html">Add Appointment</a>
                        <a href="appointments_list.html">Appointments List</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Cases</a>
                    <div class="dropdown-content">
                        <a href="add_case.html">Add Case</a>
                        <a href="cases_list.html">Cases List</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Material Payments</a>
                    <div class="dropdown-content">
                        <a href="add_material_payment.html">Add Material Payment</a>
                        <a href="material_payments_list.html">Material Payments List</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>
