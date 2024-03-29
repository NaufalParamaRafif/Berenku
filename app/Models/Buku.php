<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_tersedia',
    ];

    public function penulis(){
        return $this->belongsToMany(Penulis::class, 'penulis_buku');
    }

    public function user_menandai(){
        return $this->belongsToMany(Penulis::class, 'user_buku_ditandai');
    }
    public function user_meminjam(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // check if book_id == current_book_id AND user_id == auth->user->id in pivot table exists
    public function is_ditandai(){
        $currentUser = auth()->user();
        return DB::table('user_buku_ditandai')->where('buku_id', '=', $this->id)
            ->where('user_id', '=', $currentUser->id)
            ->exists();
    }

    public function is_dipinjam(){
        $currentUser = auth()->user();
        return DB::table('bukus')->where('id', '=', $this->id)
            ->where('user_id', '=', $currentUser->id)
            ->exists();
    }
}
