@extends("master.navbar")

   @section('content')

<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="item-form" >
        <span>Ajouter votre Objet</span>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nom de l'objet *" value="@if(isset($item)){{$item[0]->name}}  @endif"  @if(isset($item))disabled @endif/>
        </div>
        <div class="form-group">
            <textarea name="description" class="form-control" placeholder="Description de l'objet *" style="width: 100%; height: 150px;"  @if(isset($item)) disabled @endif"> @if(isset($item)){{$item[0]->description}}@endif</textarea>
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="number" name="price" class="form-control" placeholder="prix de location par jour *" aria-label="Recipient's username" aria-describedby="basic-addon2"  value=@if(isset($item)) {{$item[0]->price}}  @endif @if(isset($item))disabled @endif  />
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Dh</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <select class="form-select" name="city" @if(isset($item))disabled @endif>
                <option selected>Ville De Disponibilité  @if(isset($item)) {{$item[0]->city}}  @endif</option>
                <option value="tetouan" >Tétouan</option>
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
            <select class="form-select" name="category_id" @if(isset($item))disabled @endif >
                <small>Cette objet appartient à quelle catégorie?</small>
                <option selected value=@if(isset($item)) {{$item[0]->category_id}} @endif > Catégorie de l'objet: @if(isset($item)) {{$item[0]->category_name}}  @endif</option>
                <option value="1">Immobilier</option>
                <option value="2">Maison, Cuisine & Jardin</option>
                <option value="3">Sport</option>
                <option value="4">Vehicules</option>
                <option value="5">Loisir Et Divertissement</option>
            </select>
        </div>
        <div class="form-group">

            @if(isset($item))
                @foreach ($itemImages as $image)
                    <img src="{{ asset('storage/'.$image->imagename) }}" alt="Image de l'objet" style="width: 200px; heigh :200px;">
                @endforeach
            @endif
            <input type="file" name="item_images[]" multiple @if(isset($item))disabled @endif>
            <small style="color: #FF4B2BFF;">Importer des photos de votre objet</small>
        </div>

    </div>
    <div class="add-form">
        <span >Ajouter votre Annonce</span>
        <div class="row">
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Titre de l'annonce*" value="" />
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Valable à parir de</span>
                    </div>
                    <input type="date"  name="available_from" class="form-control" placeholder="Valable à parir de"   aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="form-group">
                <input type="number" name="min_rent_period" class="form-control" placeholder="Jours minimum de location*"  />
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input id="hideDiv"class="form-check-input" type="radio" name="availability"  value="allTime" checked>
                    <label class="form-check-label" for="exampleRadios1">disponible tout le temps </label>
                </div>
                <div class="form-check">
                    <input id="afficherDiv" class="form-check-input" type="radio" name="availability"  value="limited">
                    <label class="form-check-label" for="exampleRadios2">disponibilité limitée</label>
                </div>
            </div>
            <div id="divSupplementaire" style="display:none;">
                <div class="form-group">
                    <small style="color: red; margin-bottom: 10px">Choisir les jours dans lesquelles votre objet est disponible : </small>
                    <div class="input-group mb-3">
                        <div class="form-check" >
                            <input class="form-check-input" type="checkbox" id="allDays" name="available_days[]" value="0">
                            <label   class="form-check-label" for="flexSwitchCheckDefault" >Disponible pendant toute la semaine </label>
                        </div>
                    </div>
                    <div class="input-group mb-3" id="divSelectDays" >
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_days[]" value="1">
                            <label   class="form-check-label" for="flexSwitchCheckDefault" >Lundi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_days[]" value="2">
                            <label class="form-check-label" for="flexCheckDefault" >mardi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="available_days[]" value="3" >
                            <label class="form-check-label" for="flexCheckDefault">Mercredi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_days[]" value="4">
                            <label class="form-check-label" for="flexCheckDefault">Jeudi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_days[]" value="5">
                            <label class="form-check-label" for="flexCheckDefault">Vendredi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_days[]" value="6">
                            <label class="form-check-label" for="flexCheckDefault">Samedi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"   name="available_days[]" value="7">
                            <label class="form-check-label" for="flexCheckDefault">Dimanche</label>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <small style="color: red; margin-bottom: 20px">Choisir les mois dans lesquels votre objet est disponible : </small>
                    <div class="input-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="allMonths" name="available_month[]" value="0">
                            <label  class="form-check-label" for="flexSwitchCheckDefault" >Disponible pendant toute l'année </label>
                        </div>
                    </div>
                    <div class="input-group mb-3" id="divSelectMonths">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_month[]" value="1">
                            <label   class="form-check-label" for="flexSwitchCheckDefault" >Jan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_month[]" value="2">
                            <label class="form-check-label" for="flexCheckDefault" >fév</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="available_month[]" value="3" >
                            <label class="form-check-label" for="flexCheckDefault">Mars</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="available_month[]" value="4">
                            <label class="form-check-label" for="flexCheckDefault">Avr</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_month[]" value="5">
                            <label class="form-check-label" for="flexCheckDefault">Mai</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_month[]" value="6">
                            <label class="form-check-label" for="flexCheckDefault">jui</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_month[]" value="7">
                            <label class="form-check-label" for="flexCheckDefault">	juill</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_month[]" value="8">
                            <label class="form-check-label" for="flexCheckDefault">août</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_month[]" value="9">
                            <label class="form-check-label" for="flexCheckDefault">Sept</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_month[]" value="10">
                            <label class="form-check-label" for="flexCheckDefault">Oct</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"   name="available_month[]" value="11">
                            <label class="form-check-label" for="flexCheckDefault">Nov</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="available_month[]" value="12">
                            <label class="form-check-label" for="flexCheckDefault">Déc</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button  type="submit"  class="button-59" role="button" name="submit" value="@if(isset($item)){{$item[0]->item_id}} @endif">Ajouter l'annonce</button>
</form>















<script>
    const divSupplementaire = document.getElementById('divSupplementaire');
    const afficherDiv = document.getElementById('afficherDiv');
    const hideDiv = document.getElementById('hideDiv');
    afficherDiv.addEventListener('click', afficherDivSupplémentaire);
    hideDiv.addEventListener('click', hideDivSupplementaire);

    function afficherDivSupplémentaire() {
        divSupplementaire.style.display = 'block';
    }
    function hideDivSupplementaire() {
        divSupplementaire.style.display = 'none';
    }

    const divSelectDays=document.getElementById('divSelectDays');
    const displayDays=document.getElementById('allDays');

    displayDays.addEventListener('change', function() {
        if (this.checked) {
            divSelectDays.style.display = 'none';
        } else {
            divSelectDays.style.display = 'flex';
        }
    });

    const divSelectMonths=document.getElementById('divSelectMonths');
    const displayMonths=document.getElementById('allMonths');

    displayMonths.addEventListener('change', function() {
        console.log("lllll")
        if (this.checked) {
            console.log("isChecked")
            divSelectMonths.style.display = 'none';
        }
        else {
            console.log("isNot")
            divSelectMonths.style.display = 'flex';
        }
    });





</script>

<style>



    .row{
        width: 550px;
        padding: 20px;
        margin-bottom: 80px;
    }
    .item-form {
        float: left;
        width: 50%;
    }
    .add-form{
        float: right;
        width: 50%;
    }
    .contact-form  {
        border-radius:1rem;
    }
    .form-group{
        margin-bottom: 15px;
    }
    .form-select{
        border-radius:1rem;
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
        border-color: #FF416CFF;
        color: #FF416CFF;
        fill: #FF416CFF;
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
   @endsection
