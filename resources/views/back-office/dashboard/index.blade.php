@extends('back-office.layouts.index')
@section('content')
<h3 class="text-center">Silahkan Memesan Dengan Memasukan Data Diri</h3>
        <div class="container d-flex justify-content-center align-items-center">
            <form class="w-50" id="payment-form" action="{{ route('payment.createTransaction') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="waktuPemesanan" class="mb-1">Waktu Pemesanan</label>
                    <input type="date" name="tanggal_pemesanan" class="form-control" id="waktuPemesanan" aria-describedby="emailHelp" placeholder="Enter email">
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

                <input type="hidden" name="midtrans_token" id="midtrans_token">

                <button type="button" id="pay-button" class="btn btn-primary w-100">Bayar Sekarang</button>
            </form>
        </div>
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
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
        <script>
            $(document).ready(function () {
                $('#pay-button').click(function () {
                    let formData = {
                        _token: '{{ csrf_token() }}',
                        tanggal_pemesanan: $('#waktuPemesanan').val(),
                        alamat: $('textarea[name="alamat"]').val(),
                        pilihan: $('#pilihan').val(),
                        jumlah: $('#jumlah').val(),
                        total: $('#total').val(),
                    };
                    $.ajax({
                        url: '/back-office/payment',
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            if (response.data) {
                                window.snap.pay(response.data, {
                                    onSuccess: function (result) {
                                        window.location.href = "/back-office/dashboard";
                                    },
                                    onPending: function (result) {
                                        alert('Menunggu pembayaran...');
                                    },
                                    onError: function (result) {
                                        alert('Pembayaran gagal');
                                    }
                                });
                            } else {
                                alert('Gagal mendapatkan token pembayaran');
                            }
                        },
                        error: function () {
                            alert('Terjadi kesalahan saat mengambil token pembayaran.');
                        }
                    });
                });
            });
            </script>


@endsection
