@extends('layouts.admin')

@section('title', 'Tambah Transaksi')

@section('content')

<form action="{{ route('admin.transactions.store') }}"
      method="POST"
      class="space-y-5">

    @csrf

    <div>
        <label class="block mb-2 font-semibold">
            Nama
        </label>

        <input type="text"
               name="name"
               class="w-full border rounded-xl px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Email
        </label>

        <input type="email"
               name="email"
               class="w-full border rounded-xl px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Nama Event
        </label>

        <input type="text"
               name="event_name"
               class="w-full border rounded-xl px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Status
        </label>

        <select name="status"
                class="w-full border rounded-xl px-4 py-3">

            <option value="Success">Success</option>
            <option value="Pending">Pending</option>

        </select>
    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Total Harga
        </label>

        <input type="number"
               name="total_price"
               class="w-full border rounded-xl px-4 py-3"
               required>
    </div>

    <button type="submit"
            class="px-6 py-3 bg-indigo-600 text-white rounded-xl">

        Simpan

    </button>

</form>

@endsection