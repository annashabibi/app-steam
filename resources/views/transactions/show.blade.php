<x-app-layout>
    <x-page-title>Detail Transaksi</x-page-title>

    <div class="container mt-5">
        {{-- <h3 class="mb-4">Detail Transaksi</h3> --}}

        <div class="card shadow-sm" style="max-width: 400px; margin:auto; border-radius: 12px;">
            <div class="card-body text-center">
                {{-- Header --}}
                <img src="{{ asset('images/logo2.png') }}" class="img-fluid opacity-85 mb-2" alt="images"  style="max-width: 150px;">
                <div class="alert alert-success p-2">
                    <strong>Pembayaran Lunas</strong>
                </div>

                {{-- Detail Transaksi --}}
                <table class="table table-sm text-start">
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $transaction->date->translatedFormat('l, d F Y')  }}</td>
                    </tr>
                    <tr>
                        <th>Karyawan</th>
                        <td>{{ $transaction->karyawan->nama_karyawan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Motor</th>
                        <td>{{ $transaction->motor->nama_motor ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>Rp{{ number_format($transaction->total, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Metode</th>
                        <td>{{ ucfirst($transaction->payment_method) }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ ucfirst($transaction->payment_status) }}</td>
                    </tr>
                </table>

                {{-- Tombol Cetak --}}
                <button class="btn btn-primary btn-sm mt-3" onclick="printTicket()">
                    Cetak Tiket
                </button>
            </div>
        </div>

        <a href="{{ route('transactions.index') }}" class="btn btn-secondary mt-4">Kembali</a>
    </div>

    {{-- Print Script --}}
    <script>
        function printTicket() {
            let printContents = document.querySelector('.card').innerHTML;
            let originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</x-app-layout>
