@extends('main.main')
@section('container')
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($bukus as $buku)
        <div class="col">
            <div class="card">
            <img src="https://images-na.ssl-images-amazon.com/images/I/91Z6ApocmwL._AC_UL232_SR232,232_.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $buku->title }}</h5>
                <p class="card-text">{{ $buku->deskripsi_singkat }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Penulis: {{ $buku->penulis()->get()[0]->name; }}</li>
                <li class="list-group-item">Kategori: {{ $buku->category }}</li>
            </ul>
            <div class="card-body">
                @auth
                    @if ($buku->is_ditandai())
                        <a href="/hapus_penanda/{{ $buku->slug }}" class="btn btn-danger">Hapus Penanda</a>
                    @else
                        <a href="/tandai/{{ $buku->slug }}" class="btn btn-danger">Tandai</a>
                    @endif
                @endauth
                @guest
                    <a href="/tandai/{{ $buku->slug }}" class="btn btn-danger">Tandai</a>
                @endguest
                <button class="btn btn-success">Pinjam</button>
            </div>        
            </div>
        </div>
        @endforeach
        </div>
    </div>
@endsection