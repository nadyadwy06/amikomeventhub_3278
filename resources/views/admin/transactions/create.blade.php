    @extends('layouts.admin')

    @section('title', 'Tambah Transaksi')

    @section('content')

    <form action="{{ route('admin.transactions.store') }}"
        method="POST"
        class="space-y-5 bg-white p-6 rounded-2xl border border-slate-200">

        @csrf

        <div>
            <label class="block mb-1 font-semibold">Nama</label>
            <input type="text" name="customer_name"
                placeholder="Nama Lengkap"
                class="w-full border rounded-xl px-4 py-3"
                required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Email</label>
            <input type="email" name="customer_email"
                placeholder="Email"
                class="w-full border rounded-xl px-4 py-3"
                required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Nomor Telepon</label>
            <input type="text" name="customer_phone"
                placeholder="Contoh: 08123456789"
                class="w-full border rounded-xl px-4 py-3"
                required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Event</label>
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
        </div>

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

        <input type="hidden" name="total_price" id="totalPrice">

        <div>
            <label class="block mb-2 font-semibold">Status</label>
            <select name="status"
                    class="w-full border rounded-xl px-4 py-3">

                <option value="Pending">Pending</option>
                <option value="Success">Success</option>

            </select>
        </div>

        <button type="submit"
                class="px-6 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
            Simpan Transaksi
        </button>

    </form>

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