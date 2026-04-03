function confirmDelete(id, name, url) {
    Swal.fire({
        title: 'ยืนยันการลบ?',
        text: `คุณกำลังจะลบ "${name}" ข้อมูลนี้จะไม่สามารถกู้คืนได้`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5B5B',
        cancelButtonColor: '#f3f4f6',
        confirmButtonText: 'ใช่, ลบเลย!',
        cancelButtonText: 'ยกเลิก',
        reverseButtons: true,
        customClass: {
            popup: 'rounded-[2rem]',
            confirmButton: 'rounded-xl px-6 py-2.5 font-bold',
            cancelButton: 'rounded-xl px-6 py-2.5 font-bold text-gray-500'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            
            if (!token) {
                Swal.fire('Error', 'ไม่พบ CSRF Token กรุณาเช็คในแท็บ head', 'error');
                return;
            }

            let form = document.createElement('form');
            form.action = url;
            form.method = 'POST';
            
            form.innerHTML = `
                <input type="hidden" name="_token" value="${token}">
                <input type="hidden" name="_method" value="DELETE">
            `;
            
            document.body.appendChild(form);
            form.submit();
        }
    })
    
}

