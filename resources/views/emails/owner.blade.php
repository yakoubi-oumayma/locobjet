<!DOCTYPE html>
<html>

<head>
    <title>Welcome to LocObjet!</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            color: #666;
        }

        ul {
            margin: 20px 0;
            padding: 0 0 0 20px;
            list-style: disc;
        }

        li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Congratulations!</h1>
        <p>You have accepted a rental request for the following item:</p>
        <ul>
            <li>Item name: {{ $ownerData['object_name'] }}</li>
            <li>Rental start date: {{ $ownerData['start_date'] }}</li>
            <li>Rental end date: {{ $ownerData['end_date'] }}</li>
            <li>Rental price: {{ $ownerData['price'] }}</li>
            <li>Client name: {{ $ownerData['name'] }}</li>
            <li>Client email: {{ $ownerData['email'] }}</li>

        </ul>
        <p>We have notified the client of your acceptance and they will be in touch with you soon to arrange payment and
            pickup/delivery details. Thank you for using LocObjet!</p>
        <p>Best regards,<br>The LocObjet Team</p>
    </div>
</body>

</html>
