@extends('master.navbar')
@section('content')

    <body>
    <div class="background" >
        <div class="button-container">
            <a href="{{route('allItems')}}"><button class="button-59" role="button">Objet Déjà existant</button></a>
            &nbsp;&nbsp;
            <a href="{{route('createAd')}}"><button  class="button-59" role="button">Nouveau Objet</button></a>
        </div>
    </div>


    </body>
    </html>

<style>
    .background{
        position: relative;
        background-color: rgba(0, 0, 0, 0.6);
        background-image: url({{asset('assets/img/2o.png')}});
        background-repeat: no-repeat;
        background-size: cover;
        height: 580px;
    }
    .button-container {
        position: absolute;
        top: 80%;
        left: 20%;
        transform: translate(-50%, -50%);


    }
    a{
        text-decoration: none;
    }
    .button-59 {
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


    @media (min-width: 768px) {
        .button-59 {
            min-width: 170px;
        }
    }
</style>
@endsection

