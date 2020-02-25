<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Berita;    
use Illuminate\Http\Request;

class BabDuaController extends Controller
{
    //Soal4
    //Tampilkan berita yang dibuat oleh user yang membuat pengumuman, artikel, galeri dan kategori_artikel
    public function a4(){
        $beritas=Berita::whereHas('user',function($q){
            $q->whereHas('pengumumans')->has('artikels')->has('galeris')->has('kategoriArtikels');

        })->get();

    return $beritas;
}    

public function a5(){
    $artikels=Artikel::whereHas('user',function($query){
        $query->whereHas('galeris',function($query){
            $query->whereHas('kategoriGaleri',function($query){
                $query->where('nama','like','%et.');
            });
        });
    })->get();

    return $artikels;
}
}