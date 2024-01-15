<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mobil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Mobil</div>

                    <div class="card-body">
                    <form action="{{ route('mobil.update', $mobil->id_mobil) }}" method="POST">
                            @csrf


                            <div class="form-group">
                                <label for="merek">Merek:</label>
                                <input type="text" name="merek" id="merek" class="form-control" value="{{ $mobil->merek }}">
                            </div>

                            <div class="form-group">
                                <label for="warna">Warna:</label>
                                <input type="text" name="warna" id="warna" class="form-control" value="{{ $mobil->warna }}">
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea name="keterangan" id="keterangan" class="form-control">{{ $mobil->keterangan }}</textarea>
                            </div>

                            <div class="text-center">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                <a href="{{ route('mobil.index') }}" class="btn btn-outline-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>