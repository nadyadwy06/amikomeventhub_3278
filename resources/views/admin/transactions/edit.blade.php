@extends('layouts.admin')

@section('title', 'Edit Transaksi')

@section('content')

<form action="{{ route('admin.transactions.update', $transaction->id) }}"
      method="POST"
      class="space-y-5">

    @csrf
    @method('PUT')

    <div>
        <label class="block mb-2 font-semibold">
            Nama
        </label>

        <input type="text"
               name="name"
               value="{{ $transaction->name }}"
               class="w-full border rounded-xl px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Email
        </label>

        <input type="email"
               name="email"
               value="{{ $transaction->email }}"
               class="w-full border rounded-xl px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Nama Event
        </label>

        <input type="text"
               name="event_name"
               value="{{ $transaction->event_name }}"
               class="w-full border rounded-xl px-4 py-3"
               required>
    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Status
        </label>

        <select name="status"
                class="w-full border rounded-xl px-4 py-3">

            <option value="Success"
                {{ $transaction->status == 'Success' ? 'selected' : '' }}>

                Success

            </option>

            <option value="Pending"
                {{ $transaction->status == 'Pending' ? 'selected' : '' }}>

                Pending

            </option>

        </select>
    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Total Harga
        </label>

        <input type="number"
               name="total_price"
               value="{{ $transaction->total_price }}"
               class="w-full border rounded-xl px-4 py-3"
               required>
    </div>

    <button type="submit"
            class="px-6 py-3 bg-indigo-600 text-white rounded-xl">

        Update

    </button>

</form>

@endsection