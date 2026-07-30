@extends('layouts.admin')
@section('title', 'QR Check-in Scanner')
@section('page_title', 'Scanner Penjaga Pintu (Check-in)')

@section('content')
<!-- Library HTML5 QR Code Scanner -->
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="max-w-xl mx-auto bg-white p-6 rounded-3xl border border-slate-100 shadow-sm text-center">
    <h2 class="text-xl font-black mb-2">Arahkan Kamera ke Kode QR</h2>
    <p class="text-slate-500 text-sm mb-6">Pindai kode QR yang tertera pada E-Ticket peserta.</p>

    <!-- Kamera Frame -->
    <div id="reader" class="overflow-hidden rounded-2xl border-2 border-slate-200"></div>

    <!-- Status Hasil Scan -->
    <div id="scan-result" class="mt-6 hidden p-4 rounded-2xl text-left"></div>
</div>

<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Hentikan sementara scanner agar tidak menembak berulang
        html5QrcodeScanner.clear();

        const resultBox = document.getElementById('scan-result');
        resultBox.classList.remove('hidden');
        resultBox.className = "mt-6 p-4 rounded-2xl text-sm font-bold bg-indigo-50 text-indigo-700 animate-pulse";
        resultBox.innerHTML = "Memverifikasi Kode QR...";

        fetch("{{ route('admin.checkin.validate') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ order_id: decodedText })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                resultBox.className = "mt-6 p-5 rounded-2xl bg-green-100 text-green-800 text-left border border-green-300";
                resultBox.innerHTML = `
                    <h4 class="font-black text-lg text-green-900">${data.message}</h4>
                    <p class="mt-1"><strong>Nama:</strong> ${data.data.customer_name}</p>
                    <p><strong>Email:</strong> ${data.data.customer_email}</p>
                    <p><strong>Event:</strong> ${data.data.event_title}</p>
                    <p class="text-xs text-green-600 mt-2">Waktu Scan: ${data.data.checkin_time}</p>
                `;
            } else if (data.status === 'warning') {
                resultBox.className = "mt-6 p-5 rounded-2xl bg-amber-100 text-amber-800 text-left border border-amber-300";
                resultBox.innerHTML = `<h4 class="font-black text-lg">${data.message}</h4>`;
            } else {
                resultBox.className = "mt-6 p-5 rounded-2xl bg-red-100 text-red-800 text-left border border-red-300";
                resultBox.innerHTML = `<h4 class="font-black text-lg">${data.message}</h4>`;
            }

            // Jalankan scanner kembali setelah 3 detik
            setTimeout(() => {
                startScanner();
            }, 3000);
        })
        .catch(error => {
            resultBox.className = "mt-6 p-5 rounded-2xl bg-red-100 text-red-800 text-left";
            resultBox.innerHTML = "Gagal terhubung ke server.";
            setTimeout(() => { startScanner(); }, 3000);
        });
    }

    function startScanner() {
        window.html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: { width: 250, height: 250 } });
        html5QrcodeScanner.render(onScanSuccess);
    }

    startScanner();
</script>
@endsection