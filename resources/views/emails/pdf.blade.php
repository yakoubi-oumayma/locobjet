<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Contrat de Location</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            padding: 30px;
            background-color: #f2f2f2;
        }

        h1,
        h2,
        h3 {
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .table {
            margin-bottom: 30px;
        }

        .table th,
        .table td {
            padding: 10px;
            vertical-align: top;
            border: none;
        }

        .table th {
            font-weight: bold;
            background-color: #f2f2f2;
            width: 30%;
        }

        .text-right {
            text-align: right;
        }

        .signature {
            margin-top: 50px;
        }

        .signature p {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .signature .row {
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .signature .col-md-6 {
            padding-right: 50px;
            border-right: 1px solid #ccc;
        }

        @media print {
            .noprint {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Contrat de Location</h1>
        <table class="table">
            <tr>
                <th>Nom du loueur:</th>
                <td>{{ $ownerData['client_name'] }}</td>

            </tr>
            <tr>
                <th>Nom du locataire:</th>
                <td>{{ $ownerData['name'] }} </td>
            </tr>
            <tr>

                <th>Objet à louer:</th>
                <td>{{ $ownerData['object_name'] }}</td>
            </tr>
            <tr>
                <th>Date de début:</th>
                <td>{{ $ownerData['start_date'] }}</td>
            </tr>
            <tr>
                <th>Date de fin:</th>
                <td>{{ $ownerData['end_date'] }}</td>
            </tr>

            <tr>
                <th>Prix:</th>
                <td>{{ $ownerData['price'] }}</td>
            </tr>
        </table>
        <h2>Conditions de Location</h2>
        <ol>
            <li>Le locataire s'engage à prendre soin de l'objet loué et à le retourner dans l'état où il l'a reçu.</li>

            <li>Le locataire s'engage à ne pas prêter, sous-louer ou céder l'objet loué sans l'accord écrit du loueur.
            </li>
            <li>Le locataire est responsable de l'objet loué durant toute la durée de la location, y compris lors du
                transport de l'objet.</li>
            <li>Le locataire s'engage à utiliser l'objet loué conformément à sa destination normale et à respecter
                toutes les normes et réglementations applicables.</li>
            <li>Le locataire doit informer immédiatement le loueur de tout dommage ou perte de l'objet loué, ainsi que
                de toute réclamation de tiers concernant l'objet loué.</li>
            <li>Le loueur se réserve le droit de vérifier l'état de l'objet loué à tout moment pendant la durée de la
                location.</li>
            <li>Le locataire doit restituer l'objet loué en bon état à la fin de la période de location, conformément
                aux instructions du loueur.</li>
            <li>En cas de non-respect des termes et conditions de ce contrat, le loueur se réserve le droit de mettre
                fin à la location sans préavis et de récupérer l'objet loué.</li>
        </ol>
        <div class="signature">
            <p>Signatures:</p>

        </div>
    </div>

    </div>
</body>

</html>
