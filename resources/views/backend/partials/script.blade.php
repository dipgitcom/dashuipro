<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-M8S4MT3EYG');
</script>

<script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/feather-icons/dist/feather.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('backend/assets/js/theme.min.js') }}"></script>

<!-- jsvectormap -->
<script src="{{ asset('backend/assets/libs/jsvectormap/dist/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/jsvectormap/dist/maps/world.js') }}"></script>
<script src="{{ asset('backend/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendors/chart.js') }}"></script>

<!-- SweetAlert2 -->
{{-- <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('success'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    @endif

    @if(session('error'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    @endif
</script>