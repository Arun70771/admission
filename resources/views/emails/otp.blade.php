<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
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
        .otp-box {
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            text-align: center;
        }
        .otp-box p {
            margin: 5px 0;
        }
        .otp-code {
            font-size: 24px;
            font-weight: bold;
            color: #0e4c92;
            margin: 10px 0;
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
            <h1>OTP Verification</h1>
            <p>Dear {{ $userName }},</p>
            <p>Your One-Time Password (OTP) for verification is:</p>

            <!-- OTP Box -->
            <div class="otp-box">
                <p>Please use the following OTP to complete your verification:</p>
                <div class="otp-code">{{ $otp }}</div>
                <p>This OTP is valid for {{ $validity }} minutes. Do not share it with anyone.</p>
            </div>

            <p>If you did not request this OTP, please ignore this email or contact our support team immediately.</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>Best regards,<br>Team Admissions<br>South Asian University (SAU)</p>
        </div>
    </div>
</body>
</html>