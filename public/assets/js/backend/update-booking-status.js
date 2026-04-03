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