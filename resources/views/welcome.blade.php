<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <h3 class="text-center mt-5">Silahkan Memesan Dengan Memasukan Data Diri</h3>
        <div class="container vh-100 d-flex justify-content-center align-items-center w-100">
            <form class="w-50">
                <div class="form-group">
                    <label for="exampleInputEmail1">Waktu Pemesanan</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group my-2">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group my-2">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="d-block form-control" placeholder="Alamat"></textarea>
                </div>
                <div class="form-group my-2">
                    <label for="exampleSelect" class="mb-1">Pilih Opsi</label>
                    <select class="form-control" name="pilihan" id="pilihan">
                        <option value="" selected>Pilihan</option>
                        <option value="ps-4">PS 4</option>
                        <option value="ps-5">PS 5</option>
                    </select>
                </div>
                <div class="form-group my-2">
                    <label for="jumlah" class="mb-1">Jumlah Sesi</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Sesi" id="jumlah">
                </div>
                <div class="form-group my-2">
                    <label for="total" class="mb-1">Total Harga</label>
                    <input type="text" name="total" class="form-control" placeholder="0" id="total">
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>

        <script>
            document.getElementById('pilihan').addEventListener('change', hitungTotal);
            document.getElementById('jumlah').addEventListener('input', hitungTotal);

            function hitungTotal() {
                const harga = document.getElementById('pilihan').value == 'ps-4' ? 30000 : 40000;
                const jumlah = document.getElementById('jumlah').value;
                const total = harga * jumlah;
                document.getElementById('total').value = total;
            }
        </script>
    </body>

</html>
