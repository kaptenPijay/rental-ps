@extends('back-office.layouts.index')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col" class="bg-dark text-white">No</th>
        <th scope="col" class="bg-dark text-white">Tanggal Pemesanan</th>
        <th scope="col" class="bg-dark text-white">Pilihan</th>
        <th scope="col" class="bg-dark text-white">Total</th>
        <th scope="col" class="bg-dark text-white">Id Pemesanan</th>
        <th scope="col" class="bg-dark text-white">Status</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $item->tanggal_pemesanan }}</td>
          <td>{{ strtoupper($item->pilihan) }}</td>
          <td>{{ number_format($item->total, 0, ',', '.') }}</td>
          <td>{{ $item->order_id }}</td>
          <td class="{{ $item->status == "settlement" ? "text-success" : "text-danger" }}">{{ $item->status == "settlement" ? "Pembayaran Berhasil" : "Pembayaran Gagal" }}</td>
        </tr>
        @empty
            <h3 class="text-center">Belum Ada Data</h3>
        @endforelse
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $data->links() }}
</div>
@endsection
