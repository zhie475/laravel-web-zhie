<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
     // Menampilkan semua user
    public function index()
    {

    $dataUser = User::all(); // ambil semua user dari database
    return view('admin.user.index', compact('dataUser'));

    }

    // Menampilkan form tambah user
    public function create()
    {
        return view('admin.user.create');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6',
    ]);

    $data = $request->all();
    $data['password'] = Hash::make($request->password);

    User::create($data);

    return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    // Update data user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
