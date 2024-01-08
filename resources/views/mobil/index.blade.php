<!DOCTYPE html>
<htm lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mobil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h2>Data Mobil</h2>
        <a href="{{ route('mobil.create') }}" class="btn btn-primary mb-2">Tambah Mobil</a>
        <a href="{{ route('customer.index') }}" class="btn btn-success mb-2">Data Customer</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id Mobil</th>
                    <th>Merek</th>
                    <th>Warna</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mobil as $mobil)
                    <tr>
                        <td>{{ $mobil->id_mobil }}</td>
                        <td>{{ $mobil->merek }}</td>
                        <td>{{ $mobil->warna }}</td>
                        <td>{{ $mobil->keterangan }}</td>
                        <td>
                            <a href="{{ route('mobil.edit', $mobil->id_mobil) }}" class="btn btn-warning">Edit</a>
                            <form id="deleteForm" action="{{ route('mobil.delete', $mobil->id_mobil) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Hapus</button>
                            </form>
                            <script>
                                function confirmDelete() {
                                    if (confirm("Apakah Anda yakin ingin menghapus mobil ini?")) {
                                        document.getElementById('deleteForm').submit();
                                    } else {
                                        alert("Penghapusan mobi dibatalkan.");
                                        // atau tambahkan tindakan lainnya jika diperlukan
                                    }
                                }
                                
                            </script>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
   
 
    <div class="container py-5">
        @yield('body')
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
