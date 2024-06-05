<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TabelmahasiswaController extends Controller
{
    public function view()
    {
        $mahasiswa = User::where('usertype', 'mahasiswa')->get();
        return view('superadmin.page.mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function create()
    {
        return view('superadmin.page.create_mahasiswa');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:users,nim',
            'program_studi' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'angkatan' => 'required|string|min:1|max:100',
            'nomor_hp' => 'required|string|max:15',
            'fotoprofile' => 'required|image|max:2048',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($request->hasFile('fotoprofile')) {
            $fotoprofile = $request->file('fotoprofile')->store('fotoprofiles', 'public');
        } else {
            $fotoprofile = null;
        }

        User::create([
            'name' => $validated['name'],
            'nim' => $validated['nim'],
            'program_studi' => $validated['program_studi'],
            'kelas' => $validated['kelas'],
            'angkatan' => $validated['angkatan'],
            'nomor_hp' => $validated['nomor_hp'],
            'fotoprofile' => $fotoprofile,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'usertype' => 'mahasiswa',

        ]);

        return redirect()->route('tabel_mhs.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }
}
