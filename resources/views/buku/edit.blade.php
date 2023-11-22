@include('layout')
<div class="container">
    <h4 class="mt-2 mb-5 text-center">Edit Buku</h4>
    <form action="{{route('buku.update', $buku->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input class="form-control" type="text" name="nama" value="{{$buku->judul}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input class="form-control" type="text" name="penulis" value="{{$buku->penulis}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input class="form-control" type="text" name="harga" value="{{$buku->harga}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tgl. Terbit</label>
                    <input class="form-control" type="date" name="tgl_terbit" value="{{$buku->tgl_terbit}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Thumbnail</label>
                    <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                </div>
                <div class="mb-3">
                    <label class="form-label">Gallery</label>
                    <input class="form-control" type="file" id="gallery" name="gallery[]">
                    <div id="tambahGallery">
                    </div>
                </div>

                <a onclick="tambahData()">
                    <div class="btn btn-success mb-3">Tambah Galeri</div>
                </a>

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="/dashboard">
                        <div class="btn btn-info">Batal</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap mb-5" id="gallery_item">
            @foreach($buku->galleries()->get() as $gallery)
            <div class="gallery_item ms-3">
                <img class="rounded-full object-cover object-center" src="{{ asset($gallery->path) }}" alt=""
                    width="300" height="300" /><br>
                <a href="{{ route('deleteGalleryImage', ['id' => $gallery->id]) }}" class="mb-3" onclick="hapusData()">
                    <div class="btn btn-danger mt-2 text-center">Hapus Data</div>
                </a>
            </div>
            @endforeach
        </div>

        <script type="text/javascript">
            function tambahData() {
                var div = document.getElementById('tambahGallery');
                div.innerHTML += '<input class="form-control" type="file" id="gallery" name="gallery[]" class="mb-3">';
            };
        </script>
    </form>
</div>