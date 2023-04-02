<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Créer une annonce</title>
</head>
<body>

    <form action=""  method="post" enctype="multipart/form-data">
        @csrf
        <div class="item-form">
            <span>Ajouter votre Objet</span>
            <div class="row">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nom de l'objet *" value="" />
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Description de l'objet *" style="width: 100%; height: 150px;"></textarea>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="number" name="price" class="form-control" placeholder="prix de location par jour *" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Dh</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-select" name="city">
                        <option selected>Ville De Disponibilité</option>
                        <option value="tetouan">Tétouan</option>
                        <option value="tanger" >Tanger</option>
                        <option value="rabat">Rabat</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="marrakech">Marrakech</option>
                        <option value="agadir">Agadir</option>
                        <option value="meknes">Méknes</option>
                        <option value="fes">Fès</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-select" name="id_category">
                        <option selected> Cette objet appartient à quelle catégorie?</option>
                        <option value="1">Immobilier</option>
                        <option value="2">Maison, Cuisine & Jardin</option>
                        <option value="3">Sport</option>
                        <option value="4">Vehicules</option>
                        <option value="5">Loisir Et Divertissement</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="add-form">
            <span style="margin-top: 100px">Ajouter votre Annonce</span>
            <div class="row">
                <div class="form-group">
                    <input type="number" name="minimum_rent_days" class="form-control" placeholder="jours minimum de location*"  />

                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">valable à parir de</span>
                        </div>
                        <input type="date"  name="available_from" class="form-control" placeholder="Valable à parir de"   aria-describedby="basic-addon1">
                    </div>
                </div>


                <div class="form-group">
                    <small style="color: red; margin-bottom: 10px">Choisir les jours dans lesquelles votre objet est disponible : </small>
                    <div class="input-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="available_days[]" checked>
                            <label   class="form-check-label" for="flexSwitchCheckDefault" >Disponible pendant toute la semaine </label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="available_days[]" >
                            <label   class="form-check-label" for="flexSwitchCheckDefault" >Lundi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="available_days[]">
                            <label class="form-check-label" for="flexCheckDefault" >mardi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="available_days[]" >
                            <label class="form-check-label" for="flexCheckDefault">Mercredi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="available_days[]">
                            <label class="form-check-label" for="flexCheckDefault">Jeudi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="available_days[]" >
                            <label class="form-check-label" for="flexCheckDefault">Vendredi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="available_days[]">
                            <label class="form-check-label" for="flexCheckDefault">Samedi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault"  name="available_days[]">
                            <label class="form-check-label" for="flexCheckDefault">Dimanche</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <small style="color: red; margin-bottom: 20px">Choisir les mois dans lesquels votre objet est disponible : </small>
                    <div class="input-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="available_month[]"
                                   checked>
                            <label   class="form-check-label" for="flexSwitchCheckDefault" >Disponible pendant toute l'année </label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="available_month[]">
                            <label   class="form-check-label" for="flexSwitchCheckDefault" >Jan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="available_month[]">
                            <label class="form-check-label" for="flexCheckDefault" >fév</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="available_month[]" >
                            <label class="form-check-label" for="flexCheckDefault">Mars</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="available_month[]">
                            <label class="form-check-label" for="flexCheckDefault">Avr</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="available_month[]" >
                            <label class="form-check-label" for="flexCheckDefault">Mai</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="available_month[]">
                            <label class="form-check-label" for="flexCheckDefault">jui</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault"  name="available_month[]">
                            <label class="form-check-label" for="flexCheckDefault">	juill</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault"  name="available_month[]">
                            <label class="form-check-label" for="flexCheckDefault">août</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault"  name="available_month[]">
                            <label class="form-check-label" for="flexCheckDefault">Sept</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault"  name="available_month[]">
                            <label class="form-check-label" for="flexCheckDefault">Oct</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault"  name="available_month[]">
                            <label class="form-check-label" for="flexCheckDefault">Nov</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault"  name="available_month[]">
                            <label class="form-check-label" for="flexCheckDefault">Déc</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="button-wrap">
                        <input id="upload" type="file" name="image-item">
                    </div>
                    <small style="color: #FF4B2BFF;">Importer la photo de votre objet</small>
                </div>
            </div>
        </div>

    </form>


<style>


    .row{
        background-color: rgba(232, 232, 232, 0.96);
        width: 600px;
        padding: 20px;
    }
   .item-form{
       float: left;
       width: 50%;
   }
    .add-form{
        float: right;
        width: 50%;
    }
    .contact-form .form-control {
        border-radius:1rem;
    }
    .form-group{
        margin-bottom: 15px;
    }
    .form-select{
        border-radius:1rem;
    }
    .contact-image img{
        border-radius: 6rem;
        width: 21%;
        margin-top: -3%;
        transform: rotate(29deg);
    }
    .contact-form form{
        padding: 14%;
    }
    .contact-form form .row{
        margin-bottom: -7%;
    }

    .contact-form span{
        text-align: center;
        color: #ff023a;
    }
    .form-check .form-check-input{
        margin-left: 3px;

    }
    .form-check .form-check-label{
        margin-left: 4px;
    }



    .add-item {
        background-color: orangered; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;

    }
</style>


</body>
</html>
