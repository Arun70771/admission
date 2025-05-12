<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>
</head>
<body>
    <table style="max-width: 1200px;" cellpadding="0" cellspacing="0" border="0" align="center"
        style="background-color:#ffffff;">
        <tbody>
            <tr>
                <td height="50" align="center" style="background:#0e4c92;padding:5px 0">
                    <img src="https://admissions.sau.ac.in/web/images/sau_log.png" style="height: 100px" alt="" />
                </td>
            </tr>
            <tr>
                <td align="left"
                    style="font-size:16px;line-height:20px;color:#666666;padding:20px;border:1px #0e4c92 solid">
                    <p><strong>Dear {{ $userName }},</strong></p>
                    <p>You have successfully completed the initial step of the SAU Admissions 2025-26 registration
                        process. Please proceed further to complete your registration.</p>
                    <p>To log in, visit <a rel="noopener" href="https://admissions.sau.ac.in" target="_blank">SAU
                            Admissions Portal</a> and use the credentials below:</p>
                    <p><strong>Login Details</strong></p>
                    <ul>
                        <li><strong>Email ID:</strong> {{ $email }}</li>
                        <li><strong>Password:</strong> {{ $password }}</li>
                    </ul>
                    <p><strong>Complete the remaining steps before the deadline (04 April 2025):</strong></p>
                    <ol>
                        <li><strong>Application Form</strong></li>
                        <li><strong>Choose Programme and Course</strong></li>
                        <li><strong>Mode of Admission</strong></li>
                        <li><strong>Educational Details</strong></li>
                        <li><strong>Upload Documents</strong></li>
                        <li><strong>Preview &amp; Final Submit</strong></li>
                        <li><strong>Pay Registration Fee</strong></li>
                    </ol>
                    <p>For any queries, feel free to contact us.</p>
                    <p><strong>Regards,</strong></p>
                    <p>Team Admissions<br>South Asian University (SAU)</p>
                </td>
            </tr>
            <tr>
                <td height="50" align="center" style="background:#0e4c92;padding:20px">
                    <h2 style="font-size:14px;line-height:20px;color:#fff;padding:0;margin:0 0 10px 0">For any
                        assistance</h2>
                    <p style="font-size:12px;line-height:20px;color:#fff;padding:0;margin:0">
                        Kindly reach us at - <a style="color:#85c3f3" href="mailto:admission@sau.int"
                            target="_blank">admission@sau.int</a> or <a style="color:#85c3f3"
                            href="mailto:technical@sau.int" target="_blank">technical@sau.int</a>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>