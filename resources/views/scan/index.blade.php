<x-app-layout>


<div id="reader" width="600px" height="600px"></div>
<form id="formAbsensi" action="" method="POST">
        @csrf
        <input type="hidden" name="member_id" id="hasilScan">
    </form>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<script>
function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
 alert("BERHASIL BACA! Isi QR Code-nya adalah: " + decodedText);
 
  document.getElementById('hasilScan').value = decodedText;
  
  html5QrcodeScanner = clear();

  kirim = document.getElementById('formAbsensi');

  kirim.submit();
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
// This method will trigger user permissions

</script>
</x-app-layout>