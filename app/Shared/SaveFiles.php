<?php


namespace App\Shared;


use http\Client\Request;
use phpDocumentor\Reflection\Types\Array_;
use Illuminate\Support\Facades\Storage;

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
        $prefix = "kuiahfinance_";
        if($request->hasfile($attr))
        {
            $response = [];
            $cn = $prefix.$customName;
            $response["is_array"] = is_array($request->file($attr));
            if(is_array($request->file($attr))) {
                $meta = [];
                $test = [];
                foreach ($request->file($attr) as $i => $file) {

                    $file_mime = $file->getClientMimeType();
                    $file_size = $file->getSize();
                    $orinalName = $file->getClientOriginalName();

                    $ext = $file->extension();
                    $filename = $prefix.explode(".",$file->getClientOriginalName())[0];
                    $is_public? $saveDir="public/" : $path="private/";

                    $custom = $cn."_".$i.".".$ext ;
                    $simple = $filename.".".$ext;
                    $path = $file->storeAs(
                        $saveDir.$dir,
                        $custom ?? $simple
                    );

                    $merge = [
                        "name" => $custom ?? $simple, 
                        "originalName" => $file->getClientOriginalName(), 
                        "picture" => $file->getClientOriginalName(), 
                        "picture_url" => asset($saveDir.$dir."/".$file->getClientOriginalName()), 
                        "size" => $file_size,
                        "extension" => $file->extension(),
                    ];

                    array_push($meta, $merge);

                }

                $response["meta_data"] = $meta;


            } else {

                $file_mime = $request->file($attr)->getClientMimeType();
                $file_size = $request->file($attr)->getSize();
                $ext = explode("/", $file_mime)[1];
                $filename = $prefix.($customName ?? explode(".",$request->file($attr)->getClientOriginalName())[0]);
                $is_public? $saveDir="public/" : $path="private/";
                $orinalName = $request->file($attr)->getClientOriginalName();

                $custom = $cn.".".$ext ;
                $simple = $filename.".".$ext;

                $path = $request->file($attr)->storeAs(
                    $saveDir.$dir,
                    $custom ?? $simple
                );

                $merge = [
                    "name" => $custom ?? $simple, 
                    "originalName" => $request->file($attr)->getClientOriginalName(), 
                    "picture" => $request->file($attr)->getClientOriginalName(), 
                    "picture_url" => asset($saveDir.$dir."/".$request->file($attr)->getClientOriginalName()), 
                    "size" => $file_size,
                    "extension" => $request->file($attr)->extension(),
                ];

                $response["meta_data"] = $merge;
            }
            return $response;
        }
    }

    public function remove($dir, $filename)
    {
        Storage::delete("$dir/$filename");
    }
}
