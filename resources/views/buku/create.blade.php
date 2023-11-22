@include('layout')
<div class="container">
    <h4 class="mt-5 mb-3">Tambah Buku</h4>

    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <li class="alert alert-danger">{{ $error }}</li>
    @endforeach
    @endif

    <form action="{{route('buku.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input class="form-control" type="text" name="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input class="form-control" type="text" name="penulis">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input class="form-control" type="text" name="harga">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tgl. Terbit</label>
                    <input class="form-control" type="date" name="tgl_terbit">
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
            </div>
        </div>
        <a class="mb-3" onclick="tambahData()">
            <div class="btn btn-success mb-3">Tambah Galeri</div>
        </a>
        <div>
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="/dashboard" class="btn btn-danger"> Batal</a>
        </div>

        <script type="text/javascript">
            function tambahData() {
                var div = document.getElementById('tambahGallery');
                div.innerHTML += '<input class="form-control" type="file" id="gallery" name="gallery[]" class="mb-3">';
            };
        </script>
    </form>
</div>