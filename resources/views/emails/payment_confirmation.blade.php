<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
            height: auto;
        }
        .header h1 {
            color: #0e4c92;
            font-size: 24px;
            margin: 10px 0 5px;
        }
        .header p {
            color: #666;
            font-size: 14px;
            margin: 0;
        }
        .content {
            margin-top: 20px;
        }
        .content h2 {
            color: #0e4c92;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 16px;
            margin: 10px 0;
        }
        .details {
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .details p {
            margin: 5px 0;
        }
        .course-list {
            margin: 10px 0;
        }
        .course-list ul {
            list-style-type: none;
            padding: 0;
        }
        .course-list li {
            margin: 5px 0;
            padding: 5px;
            background-color: #e9e9e9;
            border-radius: 4px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <img src="https://admissions.sau.ac.in/web/images/sau_log.png" alt="SAU Logo">
            <h1>SOUTH ASIAN UNIVERSITY</h1>
            <p>A University established by SAARC Nations</p>
        </div>

        <!-- Content Section -->
        <div class="content">
            <h1>Payment Successful!</h1>
            <p>Thank you for your payment. Your transaction has been completed successfully.</p>
            <p>Below are the details of your payment:</p>

            <!-- Payment Details -->
            <div class="details">
                <p><strong>Program Name:</strong> {{ $programName }}</p>
                <div class="course-list">
                    <p><strong>Courses Enrolled:</strong></p>
                    <ul>
                        @foreach ($courses as $course)
                            <li>{{ $course }}</li>
                        @endforeach
                    </ul>
                </div>
                <p><strong>Total Payment:</strong> {{ $totalPayment }}</p>
                <p><strong>Transaction ID:</strong> {{ $transactionId }}</p>
                <p><strong>Payment Status:</strong> <span style="color: green;">{{ $paymentStatus }}</span></p>
            </div>

            <p>If you have any questions or need further assistance, please feel free to contact us.</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>Best regards,<br>Team Admissions<br>South Asian University (SAU)</p>
        </div>
    </div>
</body>
</html>