<?php


namespace App\Shared;


use http\Client\Request;
use phpDocumentor\Reflection\Types\Array_;

class SaveFiles
{

    /*
     *
     * mimes types:
     *  doc,
     *  docx,
     *  pdf,
     *  txt,
     *  png,
     *  jpg,
     *  jpeg
     * */

    /*
     * @params
     *
     * $is_public: boolean => permission du fichier (public ou privé)
     * $dir: string => dossier dans lequel le fichier est sauvegarder (partners)
     * $attr: string => l'attribut du fichier (img, file, profilPicture ...)
     * $request: Request => instance de la Classe Request créer dans la methode du controller
     * */
    public function save($is_public=true, $dir, $attr, $request)
    {
        if($request->hasfile($attr))
        {
            $response = [];

            $file_mime = $request->file($attr)->getClientMimeType();
            $ext = explode("/", $file_mime)[1];
            $filename = "kuiahfinance_".explode(".",$request->file($attr)->getClientOriginalName())[0];
            $is_public? $saveDir="public/" : $path="private/";

            $path = $request->file($attr)->storeAs(
                $saveDir.$dir,
                $filename.".".$ext
            );

            array_push($response, $path);
            array_push($response, $filename.".".$ext);

            return $response;
        }
    }
}
