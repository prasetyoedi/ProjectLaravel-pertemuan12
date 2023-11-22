@include('layout')
<div class="container mt-4">
    <h4 class="mt-5 mb-3 text-center">List Buku</h4>
    <div class="row">
        @foreach($data_buku as $buku)
        @if ($buku->filepath)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset($buku->filepath) }}" alt="{{ $buku->judul }}" class="img-fluid">
                <div class="card-body">
                    <h5 class="card-title">{{ $buku->judul }}</h5>
                    <a href="{{ route('buku.detail', $buku->id) }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>