@extends('master.navbar')
@section('content')

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ajouter une annonce</title>
    </head>
    <body>
    <div class="text">
        <center>
            <span>Vous pouvez ajouter des annonces pour les objets que vous avez déjà dans votre listes d'objets <br>ou pour des nouveaux objets! </span>
        </center>
    </div>

    <a href="{{route('allItems')}}" class="button-59" role="button">Objet Déjà existant </a>
    <a href="add_ad_new_item"><button  class="button-59" role="button">Nouveau Objet</button></a>




    <style>

        body{
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .text{
            font-family: Inter,sans-serif;
            font-size: 22px;
            font-weight: 600;
            margin-top: 200px;
            margin-bottom: 100px;
            letter-spacing: -.8px;
        }
        a{
            text-decoration: none;
        }
        .button-59 {
            margin-left: 350px;
            align-items: center;
            background-color: #fff;
            border: 2px solid #FF4B2BFF;
            box-sizing: border-box;
            color: #FF4B2BFF;
            cursor: pointer;
            display: inline-flex;
            fill: #FF4B2BFF;
            font-family: Inter,sans-serif;
            font-size: 16px;
            font-weight: 600;
            height: 48px;
            justify-content: center;
            letter-spacing: -.8px;
            line-height: 24px;
            min-width: 140px;
            outline: 0;
            padding: 0 17px;
            text-align: center;
            text-decoration: none;
            transition: all .3s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-59:focus {
            color: #171e29;
        }

        .button-59:hover {
            border-color: #FF416CFF;
            color: #FF416CFF;
            fill: #FF416CFF;
        }

        .button-59:active {
        [22:56, 01/04/2023] .: border-color: #FF416CFF;
            color: #FF416CFF;
            fill: #FF416CFF;
        }

        @media (min-width: 768px) {
            .button-59 {
                min-width: 170px;
            }
        }
    </style>
    </body>
    </html>

@endsection

