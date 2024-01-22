@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data Pembayaran
    </div>

    <div class="card-body">
        <form action="{{ route("admin.pembayarans.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @include('admin.transaksi.form') --}}

            <label for="nominal">Nominal:</label>
<input type="number" id="nominal" name="nominal" placeholder="Masukkan nominal">
<select id="currency" name="currency">
  <option value="rupiah">Rupiah</option>
  <option value="dollar">Dollar</option>
</select>

<p id="result">Hasil akan muncul di sini</p>
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')

<script>
    // Menambahkan event listener untuk memantau setiap kali pengguna mengetikkan sesuatu
    $('#nominal').on('input', function () {
      updateResult();
    });

    // Event listener untuk memantau perubahan pada dropdown select
    $('#currency').on('change', function () {
      updateResult();
    });

    // Fungsi untuk memperbarui hasil tergantung pada jenis mata uang yang dipilih
    function updateResult() {
      const nominalValue = parseFloat($('#nominal').val());
      const currencyType = $('#currency').val();

      if (isNaN(nominalValue)) {
        $('#result').html('<span style="color: red;">Masukkan nominal yang valid.</span>');
        return;
      }

      if (currencyType === 'rupiah') {
        $('#result').html(`Nominal Rupiah: Rp ${nominalValue.toLocaleString()}`);
      } else if (currencyType === 'dollar') {
        $('#result').html(`Nominal Dollar: $ ${nominalValue.toFixed(2)}`);
      }
    }
  </script>

@endsection
