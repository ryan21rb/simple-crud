<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer Mobil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h2>Create Customer Mobil</h2>

        <form action="{{ route('customer_mobil.store') }}" method="POST" onsubmit="return validateForm();">
            @csrf

            <div class="form-group">
                <label for="id_customer">ID Customer:</label>
                <select name="id_customer" id="id_customer" class="form-control" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id_customer }}">{{ $customer->id_customer }} - {{ $customer->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_mobil">ID Mobil:</label>
                <select name="id_mobil" id="id_mobil" class="form-control" required>
                    @foreach($mobils as $mobil)
                        <option value="{{ $mobil->id_mobil }}">{{ $mobil->id_mobil }} - {{ $mobil->merek }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-outline-primary">Create Customer Mobil</button>
            <a href="{{ route('customer_mobil.index') }}" class="btn btn-outline-secondary">Batal</a>
        </form>
    </div>

    <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        function validateForm() {
            var idCustomer = document.getElementById('id_customer').value;
            var idMobil = document.getElementById('id_mobil').value;

            if (idCustomer !== idMobil) {
                alert("ID Customer dan ID Mobil harus sama.");
                return false;
            }

            return true;
        }
    </script>

</body>
</html>
