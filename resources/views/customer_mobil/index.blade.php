<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Mobil Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h2>Customer Mobil </h2>
        <a href="{{ route('customer_mobil.create') }}" class="btn btn-primary mb-2">Tambah Mobil Customer</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Customer ID</th>
                    <th>Mobil ID</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Warna</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @forelse($customerMobils as $customerMobil)
                    <tr>
                        <td>{{ $customerMobil->kode }}</td>
                        <td>{{ $customerMobil->id_customer }}</td>
                        <td>{{ $customerMobil->id_mobil }}</td>
                        <td>{{ $customerMobil->customer->nama }}</td>
                        <td>{{ $customerMobil->mobil->merek }}</td>
                        <td>{{ $customerMobil->mobil->warna }}</td>
                
                         <td>
                         <a href="{{ route('customer_mobil.edit', ['kode' => $customerMobil->kode]) }}" class="btn btn-warning">Edit</a>


                             <form id="deleteForm{{ $customerMobil->kode }}" action="{{ route('customer_mobil.delete', $customerMobil->kode) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $customerMobil->kode }}')">Delete</button>
                            </form>
                        </td>
                      
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No customer data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    <!-- </div>
        <a href="{{ route('customer.index') }}" class="btn btn-secondary">Back to Customer Table</a>
    </div> -->

    <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function confirmDelete(kode) {
        if (confirm("Apakah Anda yakin ingin menghapus mobil ini?")) {
            document.getElementById('deleteForm' + kode).submit();
        } else {
            alert("Penghapusan mobil dibatalkan.");
            // atau tambahkan tindakan lainnya jika diperlukan
        }
    }
</script>

</body>
</html>
