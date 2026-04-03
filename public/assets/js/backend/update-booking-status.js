function updateBookingStatus(id, newStatus) {
    fetch(`${UPDATE_STATUS_URL}/${id}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ status: newStatus })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.reload(); 
        } else {
            console.error('Update failed');
            alert('ไม่สามารถเปลี่ยนสถานะได้');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}