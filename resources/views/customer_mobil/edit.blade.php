<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Mobil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h2>Edit Customer Mobil</h2>

        <form action="{{ route('customer_mobil.update', $customerMobil->kode) }}" method="POST">
    @csrf
    @method('PUT')

            <div class="form-group">
                <label for="kode">Kode:</label>
                <input type="number" name="kode" class="form-control" value="{{ $customerMobil->kode }}" required readonly>
            </div>

            <div class="form-group">
                <label for="id_customer">ID Customer:</label>
                <input type="text" name="id_customer" class="form-control" value="{{ $customerMobil->id_customer }}" required readonly>
            </div>

            <div class="form-group">
                <label for="id_mobil">ID Mobil:</label>
                <input type="text" name="id_mobil" class="form-control" value="{{ $customerMobil->id_mobil }}" required readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" value="{{ $customerMobil->nama }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Customer Mobil</button>
        </form>
    </div>

    <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
