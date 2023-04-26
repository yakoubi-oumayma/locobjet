@extends("layouts.master")

@section("contenu")




    <h2>Objets</h2>
    <style>
  .btn-danger {
  background-color: #f4661b !important;
}
</style>
    @if(session()->has("succesDelete"))
        <div class="alert alert-succes">
            <h3>{{session()->get('succesDelete')}}</h3>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Ville</th>
                <th scope="col">Description</th>
                <th scope="col">Categorie</th>
                <th scope="col">Objet</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($objets as $objet)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$objet->name}}</td>
                    <td>{{$objet->price}}</td>
                    <td>{{$objet->city}}</td>
                    <td>{{$objet->description}}</td>
                    <td>{{$objet->Category->name}}</td>
                    <td>{{$objet->items->name}}</td>

                    <td>
                        <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet objet?')){document.getElementById('form-{{$objet->item_id}}').submit()}">Supprimer</a>

                        <form id="form-{{$objet->item_id}}" action="{{route('objet.supprimer',
                    ['objet'=>$objet->item_id])}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                        </form>

                    </td>
                </tr>
            @endforeach



            </tbody>
        </table>
    </div>
    </main>
    </div>
    </div>

@endsection
