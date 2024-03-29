<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function show(){
        $currentUser = auth()->user();
        return view('daftar_peminjaman.daftar_peminjaman', [
            'bukus' => $currentUser->buku_dipinjam,
        ]);
    }

    public function pinjam(Buku $buku){
        $currentUser = auth()->user();
        if($buku->is_tersedia && ($buku->user_meminjam == NULL)){
            $buku->update(['user_id' => $currentUser->id, 'is_tersedia' => false]);
        }
        return redirect('/daftar_peminjaman');
    }

    public function kembalikan(Buku $buku){
        $buku->update(['user_id' => null, 'is_tersedia' => true]);
        return redirect('/daftar_peminjaman');
    }
}
