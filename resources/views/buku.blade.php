@include('layout')
<p>
    <a href="{{ route('buku.create') }}">
        <button class="btn btn-primary">
            Tambah Buku
        </button>
    </a>
</p>
@if(Session::has('pesan'))
<div class="alert alert-success">{{ Session::get('pesan') }}</div>
@endif
<form action="{{ route('buku.search') }}" method="get">
    @csrf
    <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%;
        display: inline; margin-top: 10px; margin-bottom: 10px; float: right;">
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>thumbnail</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
            @if(Auth::check() && Auth::user() -> level == 'admin')
            <th colspan="2">Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($data_buku as $buku)
        <tr>
            <td>{{ ++$no }}</td>
            <td>
                @if ( $buku->filepath )
                <div class="h-10 w-10">
                    <img class="h-full w-full object-cover object-center" src="{{ asset($buku->filepath) }}" alt="" />
                </div>
                @endif
            </td>
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->penulis }}</td>
            <td>{{ "Rp ".number_format($buku->harga, 2, ',', '.') }}</td>
            <td>{{ $buku->tgl_terbit }}</td>
            @if(Auth::check() && Auth::user() -> level == 'admin')
            <td>
                <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                    @csrf
                    <button onclick="return confirm('yakin mau dihapus?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash"
                            viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                            <path
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                        </svg>
                    </button>
                </form>
            </td>
            <td>
                <a href="{{ route('buku.edit', $buku->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="orange"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">{{ $data_buku->links() }}</div>
<p>Total Buku : {{ $totalbuku }}</p>
<p>Total Harga : {{ "Rp ".number_format($total, 2, ',', '.') }}</p>