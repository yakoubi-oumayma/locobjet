<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\item_images;

class ImagesController extends Controller
{
    public function store()
    {
        // Récupération des informations de fichiers des images dans le dossier "public/images"
        $imageFiles = File::allFiles(public_path('images'));

        // Boucle à travers chaque image et enregistrement du nom de fichier dans la table "image"
        foreach ($imageFiles as $imageFile) {
            // Enregistrement du nom de fichier dans la table "image"
            $imageName = $imageFile->getRelativePathname();
            item_images::create(['image_name' => $imageName]);
        }

        // Redirection vers la page d'accueil ou vers une autre page
        //return redirect('/');
    
}
}