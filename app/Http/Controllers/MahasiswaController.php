<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function insertElq()
    {
        //Single Assigment
        // $mhs = new Mahasiswa();
        // $mhs -> nama = "KristFer";
        // $mhs -> npm = '2226250070';
        // $mhs -> tempat_lahir = 'Batavia';
        // $mhs -> tanggal_lahir = date('Y-m-d'); //tgl hari ini
        // $mhs -> save();
        // dump($mhs);


        //Mass Assigment
        $mhs = Mahasiswa::insert(
            [
                ['nama' => 'KristFer',
                'npm' => '2226250070',
                'tempat_lahir' => 'Batavia',
                'tanggal_lahir' => date('Y-m-d')],
                ['nama' => 'KristFer KrucukKrucuk',
                'npm' => '2226250070',
                'tempat_lahir' => 'Rengasdengklok',
                'tanggal_lahir' => date('Y-m-d')],
                 ['nama' => 'KristFer GukGuk',
                'npm' => '2226250070',
                'tempat_lahir' => 'Konoha',
                'tanggal_lahir' => date('Y-m-d')],
            ]
        );

        // $result = DB::insert('insert into mahasiswa
        // (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir, alamat, created_at)
        // values (?, ?, ?, ?, ?, ?)', ['2226250070', 'KritFer', 'Palembang', '2005-02-20',
        // 'Kenten Laut', now()]);
        // dump($result);
        //
    }

    public function allJoinElq() {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::has('prodi')-> get();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa,'kampus'=> $kampus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updateElq()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
