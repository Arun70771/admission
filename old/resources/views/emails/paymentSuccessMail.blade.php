<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
</head>

<body style="background-color: #ccc;">
    <table
        style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;border-radius:3px;border-top:solid 10px #0d4c91">
        <thead>
            <tr>
                <th style="text-align:left"><img style="max-width:150px"
                        src="https://sau.int/wp-content/themes/sau/images/sau_logo.gif"
                        alt="bachana tours" class="CToWUd" data-bit="iit" jslog="138226; u014N:xr6bB; 53:WzAsMl0."></th>
                <th style="text-align:right;font-weight:400">Date: {{ $mailData['info']['created_at'] }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height:35px">
                    <p><br></p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border:solid 1px #ddd;padding:10px 20px">
                    <p>
                        <font size="4">Dear {{ $mailData['data']['name'] }},</font>
                    </p>
                    <p style="text-align:left"><span style="font-size:large">We are pleased to confirm that your
                            payment</span><span style="font-size:large">&nbsp;</span>
                        <font size="4">of INR {{ $mailData['info']['amount'] }}/- towards your enrollment in the <b>{{
                                $mailData['info']['programme'] }}</b> program at the South Asian University,&nbsp;&nbsp;
                        </font><span style="font-size:large">has been </span>
                        <font size="4">successfully received.</font>
                    </p>
                    <p style="margin:0px 0px 6px">
                        <font size="4">The future course of action shall be shared with you in&nbsp;due course of time.
                        </font>
                    </p>
                    <p>
                        <font size="4">We look forward to welcoming you to the program!</font>
                    </p>
                    <p style="margin:0px 0px 6px">
                        <font size="4"><b>Best wishes,</b><span
                                style="font-weight:bold;display:inline-block;min-width:146px"></span></font>
                    </p>
                    <p>
                        <font size="4">Team Admissions<br><i>South Asian University</i></font>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="height:15px"></td>
            </tr>
            <tr>
                <td style="width:50%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px"><span
                            style="display:block;font-weight:bold;font-size:13px"><br></span></p>
                </td>
                <td style="width:50%;padding:20px;vertical-align:top"></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td><u></u>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>