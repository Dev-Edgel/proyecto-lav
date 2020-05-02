<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Libro extends Model
{
    protected $table = "libro";
    protected $fillable = ['titulo', 'isbn', 'autor', 'cantidad', 'editorial', 'foto'];

    public function prestamo(){
        return $this->hasMany(LibroPrestamo::class);
    }

    public static function setCaratula($foto, $actual = false){
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("imagenes/caratulas/$actual"); // colocar dropbox en public
            }
            $imageName = Str::random(20) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("imagenes/caratulas/$imageName", $imagen->stream()); // $imagen->stream()->__toString()
            // $dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
            // $response = $dropbox->createSharedLinkWithSettings("imagenes/caratulas/$imageName", ["requested_visibility" => "public"]);
            // return str_replace('dl=0', 'raw=1', $response['url']);
            return $imageName;
        } else {
            return false;
        }
    }
}
