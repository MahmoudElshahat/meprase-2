<!DOCTYPE html>
<html>
<head>
    <title>Geidea Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.merchant.geidea.net/hpp/geideaCheckout.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function createAndStartPayment(e) {

            e.preventDefault();
            $.ajax({
                url: "{{ route('create.session') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.sessionId) {
                        startPayment(response.sessionId);
                    } else {
                        alert("Error: Unable to create payment session.");
                    }
                },
                error: function(xhr) {
                    alert("Error: " + xhr.responseText);
                }
            });
        }

        function startPayment(sessionId) {
            var payment = new GeideaCheckout(onSuccess, onError, onCancel);
            payment.startPayment(sessionId);
        }

        let onSuccess = function(data) {
            alert('Success:' + '\n' +
            data.responseCode + '\n' +
            data.responseMessage + '\n' +
            data.detailedResponseCode + '\n' +
            data.detailedResponseMessage + '\n' +
            data.orderId + '\n' +
            data.reference);
        };

        let onError = function(data) {
            alert('Error:' + '\n' +
            data.responseCode + '\n' +
            data.responseMessage + '\n' +
            data.detailedResponseCode + '\n' +
            data.detailedResponseMessage + '\n' +
            data.orderId + '\n' +
            data.reference);
        };

        let onCancel = function(data) {
            alert('Payment Cancelled:' + '\n' +
            data.responseCode + '\n' +
            data.responseMessage + '\n' +
            data.detailedResponseCode + '\n' +
            data.detailedResponseMessage + '\n' +
            data.orderId + '\n' +
            data.reference);
        };
    </script>
</head>
<body>
    <button onclick="createAndStartPayment()">Geidea Checkout</button>
</body>
</html>
