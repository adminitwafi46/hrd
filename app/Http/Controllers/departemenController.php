<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//model departemen
use App\Models\departemen;
use Inertia\Inertia;
use Inertia\Response;

class departemenController extends Controller
{
    //departemen
    public function departemen(): Response
    {
        //mengambil data departemen
        $departemen = departemen::all();
        //return data
        return Inertia::render('Departemen/index', [
            'departemen' => $departemen
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Departemen/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'manager' => 'required|string|max:255',
        ]);

        $nama_departemen = $validated['nama'];
        $deskripsi = $validated['deskripsi'];
        $manager = $validated['manager'];

        departemen::create([
            'nama_departemen' => $nama_departemen,
            'deskripsi' => $deskripsi,
            'manager' => $manager
        ]);


        return redirect()->route('departemen')->with('success', 'Departemen created successfully.');
    }

    public function edit($id)
    {
        $departemen = departemen::find($id);
        //jika tidak ada
        if (!$departemen) {
            return redirect()->route('departemen')->with('error', 'Departemen not found.');
        }
        return Inertia::render('Departemen/edit', [
            'departemen' => $departemen
        ]);

    }

    //update (post)
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'manager' => 'required|string|max:255',
        ]);

        $id = $validated['id'];
        $nama_departemen = $validated['nama'];
        $deskripsi = $validated['deskripsi'];
        $manager = $validated['manager'];

        $departemen = departemen::find($id);
        //jika tidak ada
        if (!$departemen) {
            return redirect()->route('departemen')->with('error', 'Departemen not found.');
        }

        $departemen->nama_departemen = $nama_departemen;
        $departemen->deskripsi = $deskripsi;
        $departemen->manager = $manager;
        $departemen->save();

        return redirect()->route('departemen')->with('success', 'Departemen updated successfully.');
    }
}
