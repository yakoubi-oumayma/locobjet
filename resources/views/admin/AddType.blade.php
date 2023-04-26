@extends("layouts.master")

@section("contenu")

    
<h2>Categories</h2>
<style>
  .btn-danger {
  background-color: #f4661b !important;
}

</style>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <div><a href="{{ route('categorie.create') }}" target="_blank" rel="noopener" id="btn-add-category" class="btn btn-primary">Ajouter une nouvelle categorie</a></div>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($types as $type)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$type->name}}</td>
        <td>
                <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cette categorie?')){document.getElementById('form-{{$type->category_id}}').submit()}">Supprimer</a>

                <form id="form-{{$type->category_id}}" action="{{route('type.supprimer',
                    ['type'=>$type->category_id])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                </form>
               
              </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div id="form-container"></div>

<script>
  // Sélectionner le bouton et le conteneur du formulaire
  const btnAddCategory = document.querySelector('#btn-add-category');
  const formContainer = document.querySelector('#form-container');

  // Ajouter un écouteur d'événements pour le clic sur le bouton
  btnAddCategory.addEventListener('click', (event) => {
    event.preventDefault();

    // Effectuer une requête AJAX pour récupérer le contenu du formulaire
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '{{ route("categorie.create") }}');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Afficher le contenu du formulaire dans le conteneur
        formContainer.innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  });
</script>

@endsection
