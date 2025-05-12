<!DOCTYPE html>
<html>
<head>
    <title>Admissions ::Sau.ac.in</title>
</head>
<body>

<p>Dear {{ $mailData['name'] }},</p>
<p>Greetings from South Asian University!</p>
<p>Please find your login details below:</p>
<p>Username: {{ $mailData['email'] }}</p>
<p>Password: {{ $mailData['password'] }}</p>
<p>Please keep this information secure and confidential to maintain your privacy. These credentials can be used to complete as well as check the status of your application with South Aaian University.</p>
<p>To log in, visit&nbsp;<a href="http://admissions.sau.ac.in/">http://admissions.sau.ac.in</a>. You&#39;ll gain access to your existing application form(s) and also be able to create new application(s).<br />
Should you encounter any issues during the application process or have any questions, please don&#39;t hesitate to reach out to our admissions team at&nbsp;<a href="mailto:admissions@sau.int" rel="noreferrer" target="_blank">admissions@sau.int</a></p>
<p>We look forward to reviewing your application.</p>
<p>Best regards,</p>
<p>Team Admissions</p>
<p>Thank you</p>

</body>
</html>
