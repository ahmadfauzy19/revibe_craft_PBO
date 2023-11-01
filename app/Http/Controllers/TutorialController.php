<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorials = Tutorial::all();
        return view('tutorial.index', ['tutorials' => $tutorials]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'judul_tutorial' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'bahan' => 'required|string',
                'langkah_tutorial' => 'required|array',
                'langkah_tutorial.*' => 'string',
            ]);

            Tutorial::create([
                'user_id' => auth()->id(), // Assuming you have user authentication
                'judul_tutorial' => $request->judul_tutorial,
                'deskripsi' => $request->deskripsi,
                'bahan' => $request->bahan,
                'langkah_tutorial' => $request->langkah_tutorial,
            ]);

            return redirect()->route('tutorial.index')->with('status', 'Tutorial has been created');
        }

        return view('tutorial.create');
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