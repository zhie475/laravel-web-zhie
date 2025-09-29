<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller

{
    public function index()
   {
        return 'menampilkan data matakuliah';
    }

    public function show(string $code = null)
    {
        if($code){
            return ("Anda mengakses mata kuliah ".$code);
        }else{
            return ("Masukkan Code Matakuliah");
        }
    }

}
