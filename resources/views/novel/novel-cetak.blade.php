<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data TNovel</title>
  <style>
    .table-data {
      border-collapse: collapse;
      width: 100%;
    }

    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 11pt;
      padding: 10px 20px;
      text-align: center;
    }

    .table-data tr th {
      background-color: #003e7bff;
      color: white;
    }

    .table-data tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table-data tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <h3>Data Novel</h3>
  <table class="table-data">
    <thead>
      <tr>
        <th>No.</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Kategori</th>
        <th>Sinopsis</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($novels as $novel)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $novel->judul }}</td>
        <td>{{ $novel->penulis }}</td>
        <td>{{ $novel->kategori}}</td>
        <td>{{ $novel->sinopsis}}</td>
      </tr>
      @empty
      <tr>
        <td colspan="7" align="center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
</body>

</html>
