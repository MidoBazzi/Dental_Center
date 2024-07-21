<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Center Navbar</title>
   <style>
/* General styles */
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

/* Styles for the statistics section */
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

/* Container styles for both pages */
.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 8px;
}

h2 {
    text-align: center;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.form-group input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #00bfff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0099cc;
}

/* Specific styles for the patients list */
#patient-list ul {
    list-style-type: none;
    padding: 0;
}

#patient-list li {
    background-color: #e9ecef;
    border: 1px solid #dee2e6;
    border-radius: 5px;
    margin: 10px 0;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#patient-list button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#patient-list button:hover {
    background-color: #0056b3;
}

.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    width: 90%;
    max-width: 500px;
}

.popup h2 {
    margin-top: 0;
    font-size: 1.5em;
    margin-bottom: 10px;
    text-align: center;
}

.popup p {
    margin: 5px 0;
    font-size: 1em;
    line-height: 1.5;
}

.popup button {
    display: block;
    width: 100%;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px;
    cursor: pointer;
    margin-top: 20px;
    transition: background-color 0.3s ease;
}

.popup button:hover {
    background-color: #0056b3;
}

/* Overlay */
.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

.show {
    display: block;
}

#appointment-list ul {
    list-style-type: none;
    padding: 0;
}

#appointment-list li {
    background-color: #e9ecef;
    border: 1px solid #dee2e6;
    border-radius: 5px;
    margin: 10px 0;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#appointment-list h3 {
    cursor: pointer;
    padding: 10px;
    background-color: #f4f4f4;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 5px;
    text-align: center;
}

.list-item {
    background-color: #e9ecef;
    border: 1px solid #dee2e6;
    border-radius: 5px;
    margin: 10px 0;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.details-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.details-button:hover {
    background-color: #0056b3;
}
a {
  text-decoration: none;
}

    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href={{ route('index') }}>
            <img src={{asset('logo.png')}} alt="Dental Center Logo">
            <span>Dental Center</span>
        </a>
        </div>
        <nav>
            <ul>
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
                        <a href={{ route('doctors.showadd') }}>Add Doctor</a>
                        <a href={{ route('doctors.showall') }}>Doctors List</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Appointments</a>
                    <div class="dropdown-content">
                        <a href={{ route('appointments.showadd') }}>Add Appointment</a>
                        <a href={{ route('appointments.showall') }}>Appointments List</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Cases</a>
                    <div class="dropdown-content">
                        <a href={{ route('cases.showadd') }}>Add Case</a>
                        <a href={{ route('cases.showall') }}>Cases List</a>
                        <a href={{ route('cases.showold') }}>Old Cases</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Material Payments</a>
                    <div class="dropdown-content">
                        <a href={{ route('materials.showadd') }}>Add Material Payment</a>
                        <a href={{ route('materials.showall') }}>Material Payments List</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>
