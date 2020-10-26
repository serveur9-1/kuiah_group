<?php


namespace App\Shared;


use http\Client\Request;
use phpDocumentor\Reflection\Types\Array_;

class SaveFiles
{

    /*
     *mimes:png,jpg,jpeg|
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
    public function save($is_public=true, $dir, $attr, $customName, $request)
    {
        if($request->hasfile($attr))
        {
            $prefix = "kuiahfinance_";
            $response = [];
            $cn = $prefix.$customName;
            array_push($response, is_array($request->file($attr)));

            if(is_array($request->file($attr))) {
                foreach ($request->file($attr) as $i => $file) {

                    $file_mime = $file->getClientMimeType();
                    $ext = explode("/", $file_mime)[1];
                    $filename = $prefix.explode(".",$file->getClientOriginalName())[0];
                    $is_public? $saveDir="public/" : $path="private/";

                    $path = $file->storeAs(
                        $saveDir.$dir,
                        $cn.$i.".".$ext ?? $filename.".".$ext
                    );

                    array_push($response, $cn.$i.".".$ext ?? $filename.".".$ext);
                }

            } else {

                $file_mime = $request->file($attr)->getClientMimeType();
                $ext = explode("/", $file_mime)[1];
                $filename = "kuiahfinance_".explode(".",$request->file($attr)->getClientOriginalName())[0];
                $is_public? $saveDir="public/" : $path="private/";

                $path = $request->file($attr)->storeAs(
                    $saveDir.$dir,
                    $filename.".".$ext
                );

                array_push($response, $path);
                array_push($response, $cn.".".$ext ?? $filename.".".$ext);
            }

            return $response;
        }
    }
}
