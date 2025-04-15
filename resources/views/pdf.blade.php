<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 8px;
            text-align: left;
        }

        .w-half {
            width: 50%;
        }

        .margin-top {
            margin-top: 20px;
        }

        .products th {
            background-color: #f1f1f1;
        }

        .total {
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }

        footer {
            background-color: #00bcd4;
            color: white;
            text-align: center;
            font-size: 14px;
            position: fixed;
            bottom: 0;
            width: 100%;
            border-radius: 0 0 10px 10px;
        }
    </style>
</head>
<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="/public/img/panmed_logo.jpg" alt="Panmed Logo" width="100" />
            </td>
            <td class="w-half">
                <h2>Panmed Medical and Laboratory Services</h2>
            </td>
        </tr>
    </table>
    <hr>
    <h1>{{ $medical_data->request_type }}</h1>


        <!-- Report Section (Optional, won't be printed if you only need the image) -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white"></div>
                        <div class="card-body">
                            <h5 class="card-title">Patient Information</h5>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Patient Name:</strong>
                                    {{ $medical_data->patient->lastname }},
                                    {{ $medical_data->patient->firstname }}
                                    {{ $medical_data->patient->middlename }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Gender:</strong>
                                    {{ ucfirst($medical_data->patient->sex) }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Year & Section:</strong>
                                    {{ $medical_data->patient->year }} -
                                    {{ $medical_data->patient->section }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Emergency Contact:</strong>
                                    {{ $medical_data->patient->emergency_contact }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Test Date:</strong>
                                    {{ $medical_data->test_date }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Condition:</strong>
                                    {{ $medical_data->condition }}
                                </li>
                            </ul>

                            <h5 class="card-title">Findings</h5>
                            <p>{{ $medical_data->findings }}</p>

                            <h5>Recommendation</h5>
                            <p>{{ $medical_data->doctor_comments }}</p>

                            <h5>AI Analysis and Recommendations</h5>
                            <p>{{ $medical_data->AI_comments }}</p>
                        </div>
                        <div class="card-footer text-center bg-light"></div>
                    </div>
                <footer>
                    <p>&copy; {{ date('Y') }} Panmed Medical and Laboratory Services. All Rights Reserved.</p>
                </footer>
                </div>
                
            </div>

        </div>

         <!-- Medical Image Section -->
        <img
            src="/public/{{ $medical_data->file_path }}"
            class="print-image"
            alt="Medical Image"
        />

</body>
</html>
