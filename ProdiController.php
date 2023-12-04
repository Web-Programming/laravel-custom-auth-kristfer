<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    public  function allJoinFacede(){
        $kampus = 'Universtias Multi Data Palembang';
        $result = DB::select('select mahasiswa.*,
        prodi.nama as nama_prodi from prodi, mahasiswa where prodi.id = mahasiswa.prodi_id');
        return view('prodi.index', ['allmahasiswaprodi' => $result, 'kampus' => $kampus]);
    }

    public function create() {
        return view('prodi.create');
    }

    public function store(Request $request) {
        // dump($request).;
        // echo $request -> nama;

        $this->authorize('create', Prodi::class);

        $validateData = $request->validate([
            'nama'=> 'required|min:5|max:20',
            'foto'=> 'required|file|image|max:5000',
        ]);
        // ambil ekstensi file
        $ext = $request ->foto->getClientOriginalExtension();
        // dump($validateData);
        // echo $validateData['nama'];
        $nama_file = 'foto-'.time() . '.'.$ext;
        $path = $request->foto->storeAs('public', $nama_file);

        $prodi = new Prodi();
        $prodi->nama = $validateData['nama'];

        $prodi->save();

        $request->session()->flash('info','Data prodi '.$prodi->nama.' berhasil disimpan ke database');
        return redirect('prodi/create');

    }

    public function allJoinElq() {
        $prodi = Prodi::with('mahasiswa')->get();

        foreach ($prodi as $prodi) {
            echo "<h3>{$prodi->nama}</h3>";
            echo "<hr>Mahasiswa: ";
            foreach ($prodi->mahasiswa as $mhs) {
                echo $mhs->nama_mahasiswa . ", ";
    }
    echo "<hr>";
}
    }

    public function index() {
        $prodi = Prodi::all();
        return view('prodi.index')-> with('prodi', $prodi);
}

    public function show(Prodi $prodi) {
        return view('prodi.show', ['prodi'=> $prodi]);
}

public function edit(Prodi $prodi) {
    return view('prodi.edit', ['prodi'=> $prodi]);
}

public function update(Request $request, Prodi $prodi) {

    $validateData = $request->validate([
        'nama'=> 'required|min:5|max:20',
    ]);

    Prodi::where('id', $prodi->id)->update($validateData);
    $request->session()->flash('info','Data Prodi'.$prodi->nama.'berhasil diubah');
    return redirect()->route('prodi.index');
}

public function destroy(Prodi $prodi) {
    $this-> authorize('delete', $prodi);

    $prodi->delete();
    return redirect()->route('prodi.index')->with('info','Prodi' .$prodi->nama.' berhasil dihapus.');
}
}

