
<x-user>

   <x-hero-section></x-hero-section>

<x-about></x-about>

 <x-trainer-class></x-trainer-class>
@if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

<x-paket-member :paket="$paket"></x-paket-member>

<x-how-it-works></x-how-it-works>

<x-trainer></x-trainer>
<x-hero-bottom></x-hero-bottom>

<x-faq></x-faq>


<x-footer></x-footer>
   
<script>
   @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded',()=>{
            swal({
  title: "Paket menunggu pembayaran",
  text: "{{ session('success') }}",
  icon: "success",
  button: "Okee",
});
        })
    </script>
@endif
</script>
</x-user>