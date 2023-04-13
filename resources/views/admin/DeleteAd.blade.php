@extends("layouts.master")

@section("contenu")



    <h2>Annonces</h2>
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
                <th scope="col">title</th>
                <th scope="col">State</th>
                <th scope="col">Available_from</th>
                <th scope="col">Min_Rent_Period</th>
                <th scope="col">Availability</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($annonces as $annonce)
                <tr>
                    <td>{{$annonce->ad_id}}</td>
                    <td>{{$annonce->title}}</td>
                    <td>{{$annonce->state}}</td>
                    <td>{{$annonce->available_from}}</td>
                    <td>{{$annonce->min_rent_period}}</td>
                    <td>{{$annonce->availability}}</td>
                    <td>
                        <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cette annonce?')){document.getElementById('form-{{$annonce->ad_id}}').submit()}">Supprimer</a>

                        <form id="form-{{$annonce->ad_id}}" action="{{route('annonce.supprimer',
                    ['annonce'=>$annonce->ad_id])}}" method="post">
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
