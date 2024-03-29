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
            <li class="list-group-item">{{ $buku->is_tersedia ? 'Tersedia' : 'Tidak tersedia' }}</li>
        </ul>
        <div class="card-body">
            @auth
                @if ($buku->is_ditandai())
                    <a href="/hapus_penanda/{{ $buku->slug }}" class="btn btn-danger">Hapus Penanda</a>
                @else
                    <a href="/tandai/{{ $buku->slug }}" class="btn btn-danger">Tandai</a>
                @endif
                @if ($buku->is_dipinjam())
                    <a href="/kembalikan/{{ $buku->slug }}" class="btn btn-success">Kembalikan</a>
                @elseif ($buku->is_tersedia)
                    <a class="btn btn-success" href="/pinjam/{{ $buku->slug }}">Pinjam</a>
                @else
                @endif
            @endauth
            @guest
                <a href="/tandai/{{ $buku->slug }}" class="btn btn-danger">Tandai</a>
                <button class="btn btn-success">Pinjam</button>
            @endguest
        </div>        
        </div>
    </div>
@endforeach