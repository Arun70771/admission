<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
</head>

<body>
    <h2>Proceed with Payment</h2>
    <button id="payButton">Pay</button>

    <script>
        document.getElementById("payButton").onclick = function() {
            // Make an AJAX request to get the encrypted payment URL
            fetch("{{ route('generate.payment.url') }}")
                .then(response => response.json())
                .then(data => {
                    window.location.href = data.url;
                })
                .catch(error => console.error("Error generating payment URL:", error));
        };
    </script>
</body>

</html>
