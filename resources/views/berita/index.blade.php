<h2> Data Berita </h2>
@foreach ($result as $item)
    {{$item->judul}} - {{$item->deskripsi}}  </br>
@endforeach


