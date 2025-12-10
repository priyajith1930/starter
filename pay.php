<?php
// Extract the data from the request
extract($_REQUEST);
$amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : 1000; // Default to 1000 if 'amount' is not provided
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page - RAMYA CRACKERS</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            display: inline-block;
            margin-top: 80px;
            width: 85%; /* Increased width */
            max-width: 1000px; /* Set max width for responsiveness */
        }
        h1 {
            background-color: #dc3545;
            color: white;
            padding: 15px;
            border-radius: 5px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        td {
            padding: 20px;
            text-align: left;
            font-size: 16px;
        }
        .btn-container {
            margin-top: 20px;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 12px 24px;
            border-radius: 5px;
            width: fit-content;
            margin: 0 auto;
            font-size: 16px;
        }
        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 15px; /* Added gap between options */
        }
        .payment-options label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
        }
        .payment-options input[type="radio"] {
            transform: scale(1.2);
        }
        #razorpay-button {
            display: none;
            margin-top: 15px; /* Added space below payment options */
            padding: 6px 12px;
            font-size: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 150px; /* Limited button width */
        }
        #razorpay-button:hover {
            background-color: #218838;
        }
    </style>
    <script>
        function showPaymentOptions() {
            var selectedMethod = document.querySelector('input[name="payment_method"]:checked').value;
            if (selectedMethod === "Online") {
                document.getElementById("razorpay-button").style.display = "block";
            } else {
                document.getElementById("razorpay-button").style.display = "none";
                alert("Your order has been placed successfully!");
                document.getElementById("payment-form").submit();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>RAMYA CRACKERS ONLINE PAYMENT</h1>
        <form method="post" id="payment-form">
            <table>
                <tr>
                    <td>Payment Mode</td>
                    <td class="payment-options">
                        <label><input type="radio" name="payment_method" value="COD" onclick="showPaymentOptions()" required /> Cash on Delivery</label>
                        <label><input type="radio" name="payment_method" value="Online" onclick="showPaymentOptions()" required /> Online Payment (Razorpay)</label>
                        <button type="button" id="razorpay-button">Pay with Razorpay</button>
                    </td>
                </tr>
            </table>
        </form>
        <a href="http://localhost/ramyafinal/" class="back-link">Back</a>
    </div>

    <script>
        var amount = <?php echo $amount * 100; ?>;
        var options = {
            "key": "rzp_test_pPTZnFXAhdjT3k",
            "amount": amount,
            "currency": "INR",
            "name": "RAMYA CRACKERS ONLINE SHOPPING",
            "description": "Payment for Ramya Crackers",
            "handler": function (response) {
                alert("Payment Successful! Payment ID: " + response.razorpay_payment_id);
                document.getElementById("payment_id").value = response.razorpay_payment_id;
                document.getElementById("payment-form").submit();
            },
            "prefill": {
                "name": "Test User",
                "email": "testuser@example.com",
                "contact": "9999999999"
            },
            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp = new Razorpay(options);

        document.getElementById("razorpay-button").onclick = function (e) {
            rzp.open();
            e.preventDefault();
        };
    </script>
</body>
</html>
