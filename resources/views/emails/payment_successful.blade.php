<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
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
            text-align: center;
        }
        .content h2 {
            color: #0e4c92;
            font-size: 22px;
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
            text-align: center;
        }
        .details p {
            margin: 5px 0;
            font-size: 16px;
        }
        .details .amount {
            font-size: 22px;
            font-weight: bold;
            color: #0e4c92;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            background-color: #0e4c92;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0c3a6b;
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
            <h2>Payment Successful!</h2>
            <p>We have received your payment successfully. Below are the details of your transaction:</p>
        </div>

        <!-- Payment Details Section -->
        <div class="details">
            <!-- <p><strong>Transaction ID:</strong> 1121242412</p>
            <p><strong>Amount Paid:</strong> <span class="amount">[Amount] [Currency]</span></p> -->
            <p><strong>Payment Date:</strong> {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
            <p><strong>Payment Status:</strong> Success</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>If you have any questions, feel free to contact us at <a href="mailto:techsupport-apply@sau.int">techsupport-apply@sau.int</a></p>
            <p>Thank you for choosing South Asian University.</p>
        </div>
    </div>
</body>
</html>
