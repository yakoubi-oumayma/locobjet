@extends("layouts.master")

@section("contenu")

     

      <h2>Categories</h2>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <div><a href="{{route('categorie.create')}}" class="btn btn-primary">Ajouter une nouvelle categorie</a></div>
          <thead>
            
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
            
              
            </tr>
          </thead>
          <tbody>
          @foreach ($types as $type)
            <tr>
              <td>{{$type->category_id}}</td>
              <td>{{$type->name}}</td>
             
            </tr>
            @endforeach
           
           
           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

@endsection