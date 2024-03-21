@extends('main.main')
@section('container')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        @for ($i = 0; $i < 5; $i++)
        <div class="col">
            <div class="card">
            <img src="https://images-na.ssl-images-amazon.com/images/I/91Z6ApocmwL._AC_UL232_SR232,232_.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">How to Read a Book</h5>
                <p class="card-text">How to Read a Book, originally published in 1940, has become a rare phenomenon, a living classic. It is the best and most successful guide to reading comprehension for the general reader. And now it has been completely rewritten and updated. </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Penulis: Mortimer Jerome Adler, Charles Lincoln Van Doren</li>
                <li class="list-group-item">Kategori: Non fiksi</li>
            </ul>
            <div class="card-body">
                <button class="btn btn-danger">Tandai</button>
                <button class="btn btn-success">Pinjam</button>
            </div>        
            </div>
        </div>
        @endfor
        </div>
    </div>
@endsection