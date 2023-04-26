
@extends("layouts.master")

@section("contenu")




    <h2>Utilisateurs</h2>
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
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($utilisateurs as $utilisateur)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$utilisateur->username}}</td>
                    <td>{{$utilisateur->email}}</td>
                    <td>{{$utilisateur->f_name}}</td>
                    <td>{{$utilisateur->l_name}}</td>
                    <td>
                        <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet utilisateur?')){document.getElementById('form-{{$utilisateur->user_id}}').submit()}">Supprimer</a>

                        <form id="form-{{$utilisateur->user_id}}" action="{{route('utilisateur.supprimer',
                    ['utilisateur'=>$utilisateur->user_id])}}" method="post">
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

