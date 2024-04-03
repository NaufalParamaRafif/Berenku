<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.main', [
            'bukus' => Buku::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create', ['penuliss' => Penulis::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $this->validate($request, [
            'title' => 'required|min:5',
            'deskripsi_singkat' => 'required|min:25',
            'category' => 'required',
            'penulis' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:4096',
            'isbn' => 'required|min:10|max:10'
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        // create buku
        $currentBuku = Buku::create([
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'category' => $request->category,
            'is_tersedia' => true,
            'image' => $image->hashName(),
            'isbn' => $request->isbn,
        ]);

        // link to penulis
        DB::table('penulis_buku')->insert([
            'penulis_id' => $request->penulis,
            'buku_id' => $currentBuku->id,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Buku Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
