<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(Session::has('success'))
    Swal.fire({
        icon: 'success',
        title: '{{ Session::get('success') }}',
        showConfirmButton: false,
        timer: 10000,
        timerProgressBar: true,
    })
    @endif

    @if(Session::has('error'))
    Swal.fire({
        icon: 'error',
        title: '{{ Session::get('error') }}',
        showConfirmButton: false,
        timer: 10000,
        timerProgressBar: true,
    })
    @endif

    window.addEventListener('alert', event => {
        Swal.fire({
            icon: event.detail[0].type,
            title: event.detail[0].title,
            text: event.detail[0].message,
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true,
        })
    })


    window.addEventListener('refreshPage', event => {
        setTimeout(function () {
            location.reload();
        }, event.detail[0].timeout);
    })

</script>
