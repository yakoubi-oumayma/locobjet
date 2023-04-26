@extends("master.navbar")
@section("content")

    <div class="container mt-5">
        <div class="row">
            <div class="col-8">
                <form method="post" action="">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Titre de l'annonce</span>
                        <input type="text" name="title" class="form-control" value="{{$ad_infos->title}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Durée minimale pour location</span>
                        <input type="number" name="min_rent_period" class="form-control" value="{{$ad_infos->min_rent_period}}">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Dispnible à partir de </span>
                        <input type="date" name="available_from" class="form-control" value="{{$ad_infos->available_from}}">
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="state" value="active" class="custom-control-input" id="customSwitch1" @if($ad_infos->state == "active") checked @endif>
                        <label class="custom-control-label" for="customSwitch1">Activer annonce</label>
                    </div>
                    <button class="btn btn-success">Modifier</button>
                </form>

            </div>
            <div class="col-4">
                <div class="card mb-4" style="width: 18rem;">
                    <img src="{{asset("storage/".$ad_images[0]->imagename)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$ad_infos->name}}</h5>
                        <p class="card-text">{{$ad_infos->description}}</p>
                        <a href="/all_items" class="btn btn-primary">Modifier l'objet</a>
                    </div>
                </div>
            </div>
        </div>



    </div>

@endsection
