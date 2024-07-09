<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Center Navbar</title>
   <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}
header {
    background-color: #00bfff; /* Light blue color */
    padding: 10px 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.logo img {
    height: 40px;
    vertical-align: middle;
}

.logo span {
    font-size: 1.5em;
    color: white;
    margin-left: 10px;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
}

nav ul li {
    position: relative;
}

nav ul li a {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    display: block;
}

nav ul li a:hover, .dropdown:hover .dropbtn {
    background-color: #0099cc;
    border-radius: 4px;
}
.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    min-width: 200px;
    z-index: 1;
    border-radius: 4px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
    border-radius: 4px;
}

.dropdown:hover .dropdown-content {
    display: block;
}

    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src={{asset('logo.png')}} alt="Dental Center Logo">
            <span>Dental Center</span>
        </div>
        <nav>
            <ul>
                <li><a href={{ route('index') }}>Home</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Patients</a>
                    <div class="dropdown-content">
                        <a href={{ route('patients.showadd') }}>Add Patient</a>
                        <a href={{ route('patients.showall') }}>Patients List</a>
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
