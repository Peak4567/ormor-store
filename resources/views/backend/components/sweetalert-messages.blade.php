<script>
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "สำเร็จ!",
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: false,
            customClass: {
                popup: "rounded-[2rem] font-[Prompt]",
                title: "font-black text-[#1e293b]",
            },
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: "error",
            title: "เกิดข้อผิดพลาด!",
            text: "{{ session('error') }}",
            confirmButtonColor: "#FF5B5B",
            customClass: {
                popup: "rounded-[2rem] font-[Prompt]",
            },
        });
    @endif
</script>