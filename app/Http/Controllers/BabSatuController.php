<?php

namespace App\Http\Controllers;
use App\Berita;
use App\KategoriBerita;
use App\Pengumuman;
use App\KategoriArtikel;
use Illuminate\Http\Request;

class BabSatuController extends Controller
{
    //Soall
    //Tampilkan kategori berita dengan id =40 dan dibuat oleh orang dengan email ntarihoran@siregar.org public function a1(){
       public function a1(){
        $kategoriBeritas=KategoriBerita::where('id',40)->whereHas('user',function($query){
            $query->where('email','ntarihoran@siregar.org');
        })->get();

        return $kategoriBeritas;
    
       } 
       
       public function a2(){
           $kategoriBeritas=KategoriBerita::whereHas('user',function($query){
               $query->whereHas('beritas',function($query){
                   $query->where('email','like','%@wulandari.in');
               });

           })->get();
           
           return $kategoriBeritas;
       }

       public function a3(){
           $pengumumans=pengumuman::whereHas('user',function($query){
               $query->whereHas('kategoriArtikels',function($query){
                   $query->where('id',5)->orwhere('id',20);


               });
           })->with('user.kategoriArtikels')->get();

           return $pengumumans;
       }
   }   

