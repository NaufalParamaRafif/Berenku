<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buku extends Model
{
    use HasFactory;

    public function penulis(){
        return $this->belongsToMany(Penulis::class, 'penulis_buku');
    }

    public function user_menandai(){
        return $this->belongsToMany(Penulis::class, 'user_buku_ditandai');
    }

    // check if book_id == current_book_id AND user_id == auth->user->id in pivot table exists
    public function is_ditandai(){
        $currentUser = auth()->user();
        return DB::table('user_buku_ditandai')->where('buku_id', '=', $this->id)
            ->where('user_id', '=', $currentUser->id)
            ->exists();
    }
}
