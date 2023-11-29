<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // jika nama table berbeda
    protected $table = "mahasiswa";

    //untuk mengatur kolom yang boleh di isi saat masa insert
    //fillable adalah kolom apa saja yg bisa di insert

    // misal hanya ingin mengisi NPM dan nama saja
    protected $fillable = ['npm', 'nama'];

    // untuk mengatur kolom yang tidak boleh diisi / dilindungi
    // misal ada kolom npm yang tidak boleh diisi, maka kolom tersebut dijaga / tidak boleh diisi
    protected $guarded = [];

    public function mahasiswa(){
        return $this->hasMany('App\Models\Mahasiswa');
    }

    public function prodi(){
        return $this->belongsTo('App\Models\Prodi');
    }
}
