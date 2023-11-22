@include('layout')
<div class="container">
    <h2>Buku : {{ $buku->judul}}</h2>
    <hr>
    <div class="row">
        @foreach($buku->galleries()->get() as $data)
        <div class="col-md-4">
            <a href="{{asset($data->path)}}" data-lightbox="image-1" data-title="{{$data->keterangan}}">
                <img src="{{asset($data->path)}}" alt="" style="width: 200px; height: 200px;">
            </a>
            <p>
            <h5>{{$data->nama_galeri}}</h5>
            </p>
        </div>
        @endforeach
    </div>
</div>