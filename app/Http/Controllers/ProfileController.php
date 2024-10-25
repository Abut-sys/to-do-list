<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Tampilkan form edit profil
    public function edit()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        return view('profile.edit', compact('user'));
    }

    // Proses update profil
    public function update(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:8|confirmed', // Password opsional, hanya jika ingin diubah
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Update data profil
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan ke database
        $user->save();

        // Redirect ke halaman edit profil dengan pesan sukses
        return redirect()->route('profile.edit')->with('msg', 'Profile updated successfully!');
    }
}
