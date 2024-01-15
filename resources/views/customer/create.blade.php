<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h2>Create Customer</h2>

        <form action="{{ route('customer.store') }}" method="POST">
            @csrf

            <!-- <div class="form-group">
                <label for="id_customer">ID Customer:</label>
                <input type="text" name="id_customer" id="id_customer" class="form-control" value="{{ $id_customer }}" readonly>
            </div> -->

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="alamat" name="alamat" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-outline-primary">Create Customer</button>
            <a href="{{ route('customer.index') }}" class="btn btn-outline-secondary">Batal</a>
        </form>
    </div>

    <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>