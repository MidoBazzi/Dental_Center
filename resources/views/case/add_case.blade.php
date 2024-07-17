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
    <div class="container">
        <h2>Add Case</h2>
        <form method="POST" action="{{ route('cases.store') }}" id="case-form">
            @csrf
            <div class="form-group">
                <label for="desc">Description:</label>
                <input type="text" id="desc" name="desc" value="{{ old('desc') }}">
                <x-input-error :messages="$errors->get('desc')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="patient">Patient:</label>
                <input type="text" id="patient" name="patient" value="{{ old('patient') }}">
                <input type="hidden" id="patient_id" name="patient_id" value="{{ old('patient_id') }}">
                <x-input-error :messages="$errors->get('patient_id')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="doctor">Doctor:</label>
                <input type="text" id="doctor" name="doctor" value="{{ old('doctor') }}">
                <input type="hidden" id="doctor_id" name="doctor_id" value="{{ old('doctor_id')}}">
                <x-input-error :messages="$errors->get('doctor_id')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" value="{{ old('amount') }}">
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
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
                            console.log("Doctors data:", data); // Log the data for debugging
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.name,
                                    id: item.id
                                };
                            }));
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching doctor data:", error);
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    $("#doctor").val(ui.item.value);
                    $("#doctor_id").val(ui.item.id);
                    return false;
                }
            });

            $("#patient").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "/autocomplete/patients",
                        data: { q: request.term },
                        success: function(data) {
                            console.log("Patients data:", data); // Log the data for debugging
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.name,
                                    id: item.id
                                };
                            }));
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching patient data:", error);
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    $("#patient").val(ui.item.value);
                    $("#patient_id").val(ui.item.id);
                    return false;
                }
            });

            // Add a listener for the form submission to debug
            $('#case-form').submit(function(event) {
                console.log('Form submitted');
                console.log('Description:', $('#description').val());
                console.log('Patient ID:', $('#patient_id').val());
                console.log('Doctor ID:', $('#doctor_id').val());
                console.log('Amount:', $('#amount').val());
            });
        });
    </script>
</body>
</html>
