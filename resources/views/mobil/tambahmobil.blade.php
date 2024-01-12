<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <!-- Jika menggunakan Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:70px;">
                <div class="card-header">Tambah Mobil</div>

                <div class="card-body">
                    <form action="{{ route('mobil.store') }}" method="POST">
                        @csrf
  
                        <div class="form-group">
                            <label for="id_mobil">Id Mobil:</label>
                            <input type="text" name="id_mobil" id="id_mobil" class="form-control" value="{{ $nextIdMobil }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="merek">Merek:</label>
                            <input type="text" name="merek" id="merek" class="form-control" value="{{ old('merek') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="warna">Warna:</label>
                            <input type="text" name="warna" id="warna" class="form-control" value="{{ old('warna') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary m-2">Tambah Mobil</button>
                            <a href="{{ route('mobil.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jika menggunakan Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>