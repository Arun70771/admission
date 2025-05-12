<!DOCTYPE html>
<html>

<head>
    <title>Admission Offer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        .email-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #0066cc;
            color: white;
            text-align: center;
            padding: 20px 10px;
            font-size: 18px;
            font-weight: bold;
        }

        .email-body {
            padding: 20px;
        }

        .email-body p {
            margin: 15px 0;
            font-size: 16px;
        }

        .email-footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #555;
        }

        .email-footer a {
            color: #0066cc;
            text-decoration: none;
        }

        .email-footer a:hover {
            text-decoration: underline;
        }

        .highlight {
            color: #0066cc;
            font-weight: bold;
        }

        .issued-on {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            South Asian University
        </div>
        <div class="email-body">
            <p>{!! $data['mail_content'] !!}</p>
            <p class="issued-on">Issued on: <span class="highlight">{{ $data['issued_on'] }}</span></p>
        </div>
        <div class="email-footer">
            &copy; {{ date('Y') }} South Asian University |
            <a href="https://www.sau.int" target="_blank">Visit our website</a>
        </div>
    </div>
</body>

</html>
