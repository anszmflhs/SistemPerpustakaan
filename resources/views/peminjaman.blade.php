<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman</title>
</head>
<body>
@foreach ($peminjaman as $pinjam)
<p>{{$pinjam->tanggal}}</p>
<p>{{$pinjam->anggota->nama}}</p>
@foreach ($pinjam->bukus as $buku)
<p>{{$buku->judul}}</p>
<p>{{$pinjam->tahun_terbit}}</p>
<p>{{$pinjam->jumlah}}</p>
<p>{{$pinjam->isbn}}</p>
@endforeach
@endforeach
</body>
</html>
