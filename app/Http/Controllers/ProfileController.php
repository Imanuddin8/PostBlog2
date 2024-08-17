<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\User;
use App\Models\Komen;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index($id){
        $user = User::findOrFail($id);

        $post = Post::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

        $jumlahKomen = Komen::select('post_id', DB::raw('count(*) as count'))->groupBy('post_id')->pluck('count', 'post_id');
        return view('profile.profile', compact('post', 'user', 'jumlahKomen'));
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        $user = User::all();

        return view('profile.edit', compact('post', 'user'));
    }

    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        $user = User::all();

        $userId = $post->user_id;

        $path = null;
        if($request->hasFile('image')) {
            if($post->image){
                Storage::disk('public')->delete($post->image);
            }

            $file = $request->file('image');
            $path = $file->store('post', 'public');
        }

        $post->update([
            'caption' => $request->caption,
            'tanggal' => Carbon::now(),
            'user' => Auth::id(),
            'image' => $path ?? null
        ]);

        return redirect()->route('profile.index', ['id' =>$userId]);
    }

    public function delete($id) {
        $post = Post::findOrFail($id);

        $userId = $post->user_id;

        $post->delete();

        return redirect()->route('profile.index', ['id' => $userId]);
    }

    public function editProfile($id) {
        $user = User::findOrFail($id);

        return view('profile.update', compact('user'));
    }

    public function updateProfile(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed', // Password tidak wajib diisi, jika diisi harus minimal 8 karakter
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:5000',
            'deskripsi' => 'nullable|string',
        ]);

        $user = User::findOrFail($id);

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Update image jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $file = $request->file('image');
            $path = $file->store('images', 'public'); // Ubah folder sesuai kebutuhan
            $user->image = $path;
        }

        // Update informasi user
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->deskripsi = $request->input('deskripsi');

        $user->save(); // Simpan perubahan ke database

        return redirect()->route('profile.index', $id);
    }
}
