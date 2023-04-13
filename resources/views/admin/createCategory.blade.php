<!doctype html>
<html lang="en" data-bs-theme="auto">
<head><script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>Offcanvas navbar template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/offcanvas-navbar/">





    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Favicons -->


    <main class="container">


        <div class="my-3 p-3 bg-body rounded shadow-sm border border-gray">
            <h3 class="border-bottom pb-2 mb-4">Ajouter une nouvelle catégorie</h3>
            <form method="post" action="{{route('categorie.ajouter')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom de la catégorie</label>
                    <input type="text" class="form-control border border-gray" id="exampleInputEmail1"  name="name"  aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{route('categories')}}" class="btn btn-danger">Annuler</a>
            </form>
        </div>

        <script src="{{asset('/js/bootstrap.bundle.min.js')}}" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

        <script src="{{asset('/js/offcanvas-navbar.js')}}"></script>
        </body>
</html>
