<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="include-navbar.js" defer></script>
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>
    <div id="navbar-container"></div>
    <main class="container">
        <h2>Add Appointment</h2>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="patient">Patient:</label>
                <input type="text" id="patient" name="patient">
                <input type="hidden" id="patient_id" name="patient_id">
            </div>
            <div class="form-group">
                <label for="case">Case:</label>
                <select id="case" name="case" disabled>
                    <option value="">Select a case</option>
                </select>
            </div>
            <div class="form-group">
                <label for="doctor">Doctor:</label>
                <input type="text" id="doctor" name="doctor" readonly>
                <input type="hidden" id="doctor_id" name="doctor_id">
            </div>
            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="time" id="duration" name="duration">
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <select id="date" name="date" disabled>
                    <option value="">Select a date</option>
                </select>
            </div>

            <div class="form-group">
                <label for="time">Time:</label>
                <select id="time" name="time" disabled>
                    <option value="">Select a time</option>
                </select>
            </div>

            <button type="submit" class="btn">Add Appointment</button>
        </form>
    </main>
    <script>
        $(document).ready(function() {
            // Autocomplete for patient field
            $("#patient").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "/autocomplete/patients",
                        data: { q: request.term },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.name,
                                    id: item.id
                                };
                            }));
                        }
                    });
                },
                select: function(event, ui) {
                    $("#patient_id").val(ui.item.id);
                    loadCases(ui.item.id);
                    return false;
                }
            });

            function loadCases(patientId) {
                $.ajax({
                    url: "/autocomplete/cases",
                    data: { patient_id: patientId },
                    success: function(data) {
                        var caseSelect = $("#case");
                        caseSelect.empty();
                        caseSelect.append('<option value="">Select a case</option>');
                        $.each(data, function(index, item) {
                            caseSelect.append('<option value="'+item.id+'" data-doctor="'+item.doctor.name+'" data-doctor-id="'+item.doctor.id+'">'+item.desc+'</option>');
                        });
                        caseSelect.prop('disabled', false);
                    }
                });
            }

            $("#case").change(function() {
                var selectedOption = $(this).find('option:selected');
                var doctorName = selectedOption.data('doctor');
                var doctorId = selectedOption.data('doctor-id');
                $("#doctor").val(doctorName);
                $("#doctor_id").val(doctorId);
                loadAvailableDates(doctorId);
            });

            function loadAvailableDates(doctorId) {
                $.ajax({
                    url: "/autocomplete/available-dates",
                    data: { doctor_id: doctorId },
                    success: function(data) {
                        var dateSelect = $("#date");
                        dateSelect.empty();
                        dateSelect.append('<option value="">Select a date</option>');
                        $.each(data, function(index, item) {
                            dateSelect.append('<option value="'+item+'">'+item+'</option>');
                        });
                        dateSelect.prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading available dates:", error);
                    }
                });
            }

            $("#date").change(function() {
                var selectedDate = $(this).val();
                var doctorId = $("#doctor_id").val();
                loadAvailableTimes(doctorId, selectedDate);
            });

            function loadAvailableTimes(doctorId, date) {
                $.ajax({
                    url: "/autocomplete/available-times",
                    data: { doctor_id: doctorId, date: date },
                    success: function(data) {
                        var timeSelect = $("#time");
                        timeSelect.empty();
                        timeSelect.append('<option value="">Select a time</option>');
                        $.each(data, function(index, item) {
                            timeSelect.append('<option value="'+item+'">'+item+'</option>');
                        });
                        timeSelect.prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading available times:", error);
                    }
                });
            }
        });
    </script>

</body>
</html>
