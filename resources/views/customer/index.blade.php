<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h2>Data Customer</h2>
        <a href="{{ route('customer.create') }}" class="btn btn-outline-primary">Tambah Customer</a>
        <a href="{{ route('customer_mobil.index') }}" class="btn btn-outline-info">Go to Customer Mobil Table</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Id Customer</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id_customer }}</td>
                        <td>{{ $customer->nama }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->alamat }}</td>
                        <td>
                            <a href="{{ route('customer.edit', $customer->id_customer) }}" class="btn btn-outline-warning">Edit</a>
                            <form id="deleteForm{{ $customer->id_customer }}" action="{{ route('customer.delete', $customer->id_customer) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('{{ $customer->id_customer }}')">Hapus</button>
                            </form>
                            <script>
    function confirmDelete(id_customer) {
        if (confirm("Apakah Anda yakin ingin menghapus customer ini?")) {
            document.getElementById('deleteForm' + id_customer).submit();
        } else {
            alert("Penghapusan customer telah dibatalkan.");
        }
    }
</script>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('mobil.index') }}" class="btn btn-outline-secondary">Back to Data Mobil</a>
    </div>

    <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
