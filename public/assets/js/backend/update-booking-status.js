function updateBookingStatus(bookingId, newStatus) {
    let form = document.createElement('form');

    form.action = `/backend/booking/update-status/${bookingId}`;
    form.method = 'POST';

    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    form.innerHTML = `
        <input type="hidden" name="_token" value="${csrfToken}">
        <input type="hidden" name="status" value="${newStatus}">
    `;
    document.body.appendChild(form);
    form.submit();
}

document.addEventListener('DOMContentLoaded', function () {
    const selectAllCheckbox = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.booking-checkbox');
    const bulkPanel = document.getElementById('bulk-action-panel');
    const selectedCount = document.getElementById('selected-count');

    function updateBulkActionPanel() {
        const checkedCheckboxes = document.querySelectorAll('.booking-checkbox:checked');
        const count = checkedCheckboxes.length;

        selectedCount.textContent = count;

        if (count > 0) {
            bulkPanel.classList.remove('hidden');
            bulkPanel.classList.add('flex');
        } else {
            bulkPanel.classList.add('hidden');
            bulkPanel.classList.remove('flex');
        }

        if (rowCheckboxes.length > 0) {
            selectAllCheckbox.checked = count === rowCheckboxes.length;
        }
    }

    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function () {
            rowCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateBulkActionPanel();
        });
    }

    rowCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateBulkActionPanel);
    });
});

function applyBulkStatusUpdate() {
    const selectedIds = Array.from(document.querySelectorAll('.booking-checkbox:checked')).map(cb => cb.value);
    const newStatus = document.getElementById('bulk-status-select').value;

    if (selectedIds.length === 0) {
        Swal.fire('แจ้งเตือน', 'กรุณาเลือกอย่างน้อย 1 รายการ', 'warning');
        return;
    }

    if (!newStatus) {
        Swal.fire('แจ้งเตือน', 'กรุณาเลือกสถานะที่ต้องการเปลี่ยน', 'warning');
        return;
    }

    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    let updateUrl = window.bulkUpdateRoute || '/backend/booking/bulk-update'; 

    Swal.fire({
        title: 'ยืนยันการทำรายการ?',
        text: `คุณต้องการเปลี่ยนสถานะ ${selectedIds.length} รายการที่เลือก เป็น "${newStatus}" ใช่หรือไม่?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#2CB05C',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, อัปเดตเลย',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(updateUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    ids: selectedIds,
                    status: newStatus
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('สำเร็จ!', 'อัปเดตสถานะทั้งหมดเรียบร้อยแล้ว', 'success').then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire('ผิดพลาด', data.message || 'ไม่สามารถอัปเดตได้', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('ผิดพลาด', 'เกิดข้อผิดพลาดในการเชื่อมต่อเซิร์ฟเวอร์', 'error');
            });
        }
    });
}