<x-app-layout>


<div class="max-w-xl mx-auto mt-10">
    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
        <div class="bg-gym-600 p-4 text-center">
            <h2 class="text-white font-bold text-lg flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier"> <path d="M4,4h6v6H4V4M20,4v6H14V4h6M14,15h2V13H14V11h2v2h2V11h2v2H18v2h2v3H18v2H16V18H13v2H11V16h3V15m2,0v3h2V15H16M4,20V14h6v6H4M6,6V8H8V6H6M16,6V8h2V6H16M6,16v2H8V16H6M4,11H6v2H4V11m5,0h4v4H11V13H9V11m2-5h2v4H11V6M2,2V6H0V2A2,2,0,0,1,2,0H6V2H2M22,0a2,2,0,0,1,2,2V6H22V2H18V0h4M2,18v4H6v2H2a2,2,0,0,1-2-2V18H2m20,4V18h2v4a2,2,0,0,1-2,2H18V22Z"></path> </g></svg> Scan QR Member
            </h2>
        </div>

        <div class="p-6 bg-gray-50">
            <p class="text-center text-gray-500 mb-4 text-sm">
                Arahkan kamera ke QR Code kartu member
            </p>
            
            <div id="reader" class="rounded-lg overflow-hidden border-2 border-dashed border-gray-300"></div>
        </div>
    </div>
</div>


<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<script>
    // 1. Variabel Gembok (Perbaikan typo: isProcessing)
    let isProcessing = false;

    function onScanSuccess(decodedText, decodedResult) {
        // Cek Gembok
        if (isProcessing) return;

        // Kunci Gembok
        isProcessing = true;

        // Visual: Border Kuning (Sedang Mikir)
        document.getElementById('reader').style.border = "5px solid #F59E0B";

        // Kirim ke Controller
        fetch("{{ route('admin.absensi.store') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json", 
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                qrcode: decodedText
            })
        })
        .then(response => { 
        
            if (!response.ok) {
                throw new Error("HTTP Status " + response.status);
            }
            return response.json(); 
        }) 
        .then(data => {
            if(data.success){
                // SUKSES: Hijau
                document.getElementById('reader').style.border = '5px solid #10B981';
                alert(" Halo " + data.nama_member);
            } else {
                // GAGAL: Merah
             
                document.getElementById('reader').style.border = '5px solid #EF4444';
                alert(" Gagal: " + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('reader').style.border = '5px solid #EF4444';
            alert(" Terjadi Kesalahan Sistem");
        })
        .finally(() => {
            // Buka Gembok setelah 2.5 detik
            setTimeout(() => {
                isProcessing = false;
                // Kembalikan border ke semula (hapus border warna-warni)
                document.getElementById('reader').style.border = "none";
            }, 2500);
        });
    }

    function onScanFailure(error) {
       
    }

    // Inisialisasi Scanner
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", 
    { 
        fps: 20, 
        qrbox: { width: 250, height: 250 },
        // Tambahkan baris ini untuk mendukung scan dari file gambar
        rememberLastUsedCamera: true,
        supportedScanTypes: [
            Html5QrcodeScanType.SCAN_TYPE_CAMERA,
            Html5QrcodeScanType.SCAN_TYPE_FILE
        ]
    },
        /* verbose= */ false
    );

    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
</x-app-layout>