@extends('layouts.admin')

@section('title', 'Tambah Transaksi')

@section('content')

<form action="{{ route('admin.transactions.store') }}"
      method="POST"
      class="space-y-5">

    @csrf

    <!-- NAMA -->
    <input type="text" name="customer_name"
           placeholder="Nama"
           class="w-full border rounded-xl px-4 py-3"
           required>

    <!-- EMAIL -->
    <input type="email" name="customer_email"
           placeholder="Email"
           class="w-full border rounded-xl px-4 py-3"
           required>

    <!-- EVENT -->
    <select id="eventSelect"
            name="event_id"
            class="w-full border rounded-xl px-4 py-3"
            required>

        <option value="">Pilih Event</option>

        @foreach($events as $event)
            <option value="{{ $event->id }}"
                    data-price="{{ $event->price }}">
                {{ $event->title }}
            </option>
        @endforeach

    </select>

    <!-- HARGA TAMPIL (READONLY) -->
    <div>
        <label class="block mb-2 font-semibold">
            Harga Event
        </label>

        <input type="text"
               id="priceDisplay"
               class="w-full border rounded-xl px-4 py-3 bg-gray-100"
               readonly
               placeholder="Harga akan muncul otomatis">
    </div>

    <!-- 🔥 HIDDEN INPUT UNTUK DATABASE -->
    <input type="hidden" name="total_price" id="totalPrice">

    <!-- STATUS -->
    <select name="status"
            class="w-full border rounded-xl px-4 py-3">

        <option value="Pending">Pending</option>
        <option value="Success">Success</option>

    </select>

    <button type="submit"
            class="px-6 py-3 bg-indigo-600 text-white rounded-xl">

        Simpan

    </button>

</form>

<!-- SCRIPT AUTO PRICE -->
<script>
document.getElementById('eventSelect').addEventListener('change', function () {

    let selected = this.options[this.selectedIndex];
    let price = selected.getAttribute('data-price');

    if (price) {
        document.getElementById('priceDisplay').value =
            'Rp ' + new Intl.NumberFormat('id-ID').format(price);

        // 🔥 INI YANG KIRIM KE DATABASE
        document.getElementById('totalPrice').value = price;
    } else {
        document.getElementById('priceDisplay').value = '';
        document.getElementById('totalPrice').value = '';
    }

});
</script>

@endsection