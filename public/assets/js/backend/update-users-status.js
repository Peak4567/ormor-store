function changeUserLevel(userId, newLevel) {
    let form = document.createElement('form');
    
    form.action = `/backend/users/change-level/${userId}`;
    form.method = 'POST';

    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    form.innerHTML = `
        <input type="hidden" name="_token" value="${csrfToken}">
        <input type="hidden" name="level" value="${newLevel}">
    `;
    
    document.body.appendChild(form);
    form.submit();
}