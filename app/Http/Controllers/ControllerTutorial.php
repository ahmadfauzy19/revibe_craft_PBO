<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ControllerTutorial extends Controller
{
    public function show($id)
    {
        $tutorial = Tutorial::find($id);

        return view('page.admin.akun.index', compact('tutorial'));
    }

    use DataTables;

public function dataTable()
{
    $tutorials = Tutorial::select(['judul_tutorial', 'deskripsi', 'bahan', 'alat', 'langkah_tutorial', 'foto']);

    return Datatables::of($tutorials)
        ->addColumn('options', function($tutorial){
            // Tambahkan tombol edit dan hapus di sini
            return '<a href="'. route('tutorial.edit', $tutorial->id) .'" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm hapusData" data-id="'. $tutorial->id .'" data-url="'. route('tutorial.delete', $tutorial->id) .'">Hapus</button>';
        })
        ->addColumn('foto', function($tutorial){
            // Tampilkan gambar tutorial di sini
            return '<img src="'. asset('storage/'. $tutorial->foto) .'" alt="Tutorial Image" width="100px">';
        })
        ->rawColumns(['options', 'foto'])
        ->make(true);
}

public function getDataTable(Request $request)
{
    // Ambil data dari sumber (misalnya database)
    $data = Tutorial::select(['judul_tutorial', 'deskripsi', 'bahan', 'alat', 'langkah_tutorial', 'foto', 'id']);

    // Kembalikan data dalam format JSON
    return datatables()->of($data)->toJson();
}



    public function create()
    {
        return view('akun.addAkun');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'judul_tutorial' => 'required',
        //     'deskripsi' => 'required',
        //     'bahan' => 'required',
        //     'alat' => 'required',
        //     'langkah_tutorial' => 'required',
        //     'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        // dd($request);

        $gambarPath='default.jpg';
        // Simpan gambar ke storage dan dapatkan path-nya
        if($request->hasFile('foto')){
            $gambarPath = $request->file('foto')->store('tutorial_images');
        }

        Tutorial::create([
            'judul_tutorial' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'bahan' => $request->bahan,
            'alat' => $request->alat,
            'langkah_tutorial' => $request->langkah,
            'foto' => $gambarPath,
        ]);

        return redirect()->route('home')->with('status', 'Tutorial berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tutorial = Tutorial::findOrFail($id);
        return view('tutorial.edit', ['tutorial' => $tutorial]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'judul_tutorial' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'bahan' => 'required|string',
            'langkah_tutorial' => 'required|array',
            'langkah_tutorial.*' => 'string',
        ]);

        $tutorial = Tutorial::findOrFail($id);
        $tutorial->update([
            'judul_tutorial' => $request->judul_tutorial,
            'deskripsi' => $request->deskripsi,
            'bahan' => $request->bahan,
            'langkah_tutorial' => $request->langkah_tutorial,
        ]);

        return redirect()->route('tutorial.index')->with('status', 'Tutorial has been updated');
    }

    public function delete($id)
    {
        $tutorial = Tutorial::findOrFail($id);
        $tutorial->delete();

        return redirect()->route('tutorial.index')->with('status', 'Tutorial has been deleted');
    }
}