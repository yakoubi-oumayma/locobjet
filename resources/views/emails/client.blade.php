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
        <h1>Welcome, {{ $data['client_name'] }}!</h1>
        <p>We're happy to inform you that your offer has been accepted by the owner for the rental of the following
            item:</p>
        <ul>
            <li>Item name: {{ $data['object_name'] }}</li>
            <li>Owner name: {{ $data['name'] }}</li>
            <li>Owner email: {{ $data['email'] }}</li>
            <li>Rental start date: {{ $data['start_date'] }}</li>
            <li>Rental end date: {{ $data['end_date'] }}</li>
            <li>Price: {{ $data['price'] }}</li>
        </ul>
        <p>We thank you for choosing LocObjet and we remain at your disposal for any questions or additional
            information.</p>
        <p>Best regards,<br>The LocObjet Team</p>
    </div>
</body>

</html>
