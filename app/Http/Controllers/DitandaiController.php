<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DitandaiController extends Controller
{
    public function show(User $user){
        $currentUser = auth()->user();
        $user = User::find($user->id);
        // validate current user == /ditandai/{{ user }}
        if(!($currentUser == $user)){
            return redirect('/');
            die;
        }
        return view('ditandai.ditandai', [
            'bukus' => $user->buku_ditandai,
        ]);
    }

    public function tandai(Buku $buku){
        $currentUser = auth()->user();

        if($buku->is_ditandai())
        {
            redirect('/ditandai/'.$currentUser->username);
        }
        else
        {
            // execute tandai
            User::find($currentUser->id)->buku_ditandai()->attach($buku);
        }
        return view('ditandai.ditandai', [
            'bukus' => $currentUser->buku_ditandai,
        ]);
    }

    public function hapus_penanda(Buku $buku){
        $currentUser = auth()->user();

        if($buku->is_ditandai())
        {
            // execute destroy
            User::find($currentUser->id)->buku_ditandai()->detach($buku);
        }
        else
        {
            redirect('/ditandai/'.$currentUser->username);
        }
        return view('ditandai.ditandai', [
            'bukus' => $currentUser->buku_ditandai,
        ]);
    }
}
