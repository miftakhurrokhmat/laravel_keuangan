<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="jumbotron text-center">
    <h1>Fakultas Matematika Ilmu Pengetahuan Alam</h1>
    <p>Resize this responsive page to see the effect!</p>
    <button type="button" class="btn btn-success"><a href="http://localhost:8000/fip">FIP</a></button>
    <button type="button" class="btn btn-info"><a href="http://localhost:8000/fmipa">FMIPA</a></button>
  </div>

  <div class=" container">
    <div class="row">
      <div class="col-sm-4">
        <h3>Column 1</h3>

        <ul>
        @foreach ($datas as $data)
            <li>{{ $data->nip }}, {{ $data->nama_lengkap }}, {{ $data->jenis_kelamin }}, {{ $data->tanggal_gabung }}</li>
        @endforeach
        </ul>

      </div>
      <div class="col-sm-4">
        <h3>Column 2</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
      </div>
      <div class="col-sm-4">
        <h3>Column 3</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
      </div>
    </div>
  </div>

</body>

</html>