document.addEventListener('DOMContentLoaded', function() {
    
    const alertData = document.getElementById('profile-alert-data');
    
    if (alertData) {
        const successMessage = alertData.getAttribute('data-success');
        const errorMessage = alertData.getAttribute('data-error');

        if (successMessage) {
            showSwalAlert('success', 'อัปเดตสำเร็จ!', successMessage);
        }
        
        if (errorMessage) {
            showSwalAlert('error', 'พบข้อผิดพลาด', errorMessage);
        }
    }
    
});