<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class MahasiswaController extends Controller

{
 /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index(Request $request)
    {
    $simplePaginate  = 3;
    $mahasiswa = Mahasiswa::with('kelas')->get();
    $mahasiswa   = Mahasiswa::when($request->keyword, function ($query) use ($request) {
        $query
        ->where('nama', 'like', "%{$request->keyword}%");
    })->orderBy('created_at', 'asc')->simplePaginate($simplePaginate);

    $mahasiswa->appends($request->only('keyword'));

    return view('mahasiswa.index', [
        'nama'    => 'Mahasiswa',
        'mahasiswa' => $mahasiswa,
    ])->with('i', ($request->input('simplePaginate', 1) - 1) * $simplePaginate);
 //fungsi eloquent menampilkan data menggunakan pagination
    //     $mahasiswa = Mahasiswa::all(); // Mengambil semua isi tabel
    //     $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(4);
    // return view('mahasiswa.index', ['mahasiswa' => $mahasiswa,'paginate'=>$paginate]);
    // $mahasiswa = DB::table('mahasiswa')->simplePaginate(4);
    // return view ('mahasiswa.index',compact('mahasiswa'));
    }

    public function create()
    {
    // return view('mahasiswa.create');
    $kelas = Kelas::all();
    return view('mahasiswa.create',['kelas'=>$kelas]);
    }
 
    public function store(Request $request)
 {
    //melakukan validasi data
    $request->validate([
        'Nim' => 'required',
        'Nama' => 'required',
        'Kelas' => 'required',
        'Jurusan' => 'required'
    ]);

    $mahasiswa = new Mahasiswa;
    $mahasiswa->nim = $request->get('Nim');
    $mahasiswa->nama = $request->get('Nama');
    $mahasiswa->jurusan = $request->get('Jurusan');
    $mahasiswa->alamat = '';
    $mahasiswa->tgl_lahir = '';
    $mahasiswa->email='';
    $mahasiswa->save();

    $kelas = new Kelas;
    $kelas->id = $request->get('Kelas');

    //fungsi eloquent untuk menambah data
    $mahasiswa->kelas()->associate($kelas);
    $mahasiswa->save();
    // Mahasiswa::create($request->all());
    
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('mahasiswa.index')
    ->with('success', 'Mahasiswa Berhasil Ditambahkan');
 }
 
    public function show($nim)
    {
 //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
    // $Mahasiswa = Mahasiswa::where('nim', $nim)->first();
    // return view('mahasiswa.detail', compact('Mahasiswa'));
        $mahasiswa = Mahasiswa::with('kelas')->where('nim',$nim)->first();
        return view('mahasiswa.detail',['Mahasiswa'=>$mahasiswa]);
    }
 
    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $mahasiswa=Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact('mahasiswa','kelas'));
    }
 
    public function update(Request $request, $nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            // 'Email' => 'required',
            // 'Tanggal Lahir' => 'required',
            // 'Alamat' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
        ]);
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->alamat ='';
        $mahasiswa->tgl_lahir='';
        $mahasiswa->email='';
        $mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');
        //fungsi eloquent untuk menambah data
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        //fungsi eloquent untuk mengupdate data inputan kita
        Mahasiswa::find($nim)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    public function destroy( $nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswa.index')
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
