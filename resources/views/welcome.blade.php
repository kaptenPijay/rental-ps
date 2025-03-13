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
                    <label for="waktuPemesanan" class="mb-1">Waktu Pemesanan</label>
                    <input type="date" name="tanggal_pemesanan" class="form-control" id="waktuPemesanan" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group my-2">
                    <label for="name" class="mb-1">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group my-2">
                    <label for="alamat" class="mb-1">Alamat</label>
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
                <div class="form-group my-2 mb-3">
                    <label for="total" class="mb-1">Total Harga</label>
                    <input type="text" name="total" class="form-control" placeholder="0" id="total" readonly>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const pilihan = document.getElementById("pilihan");
                const waktuPemesanan = document.getElementById("waktuPemesanan");
                const jumlah = document.getElementById("jumlah");
                const totalElement = document.getElementById("total");

                pilihan.addEventListener("change", hitungTotal);
                waktuPemesanan.addEventListener("change", hitungTotal);
                jumlah.addEventListener("input", hitungTotal);

                function hitungTotal() {
                    const harga = pilihan.value === "ps-4" ? 30000 : 40000;
                    const jumlahValue = parseInt(jumlah.value) || 0;
                    const totalSebelumTambahan = harga * jumlahValue;

                    const tanggalInput = waktuPemesanan.value;
                    const hari = tanggalInput ? new Date(tanggalInput).getDay() : new Date().getDay();
                    const tambahan = (hari === 0 || hari === 6) ? 50000 : 0;

                    const total = totalSebelumTambahan + tambahan;
                    totalElement.value = total.toLocaleString("id-ID");
                }
            });
        </script>

    </body>

</html>
