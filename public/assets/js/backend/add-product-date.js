function addDateRow() {
    const wrapper = document.getElementById('dates-wrapper');
    const rows = wrapper.getElementsByClassName('date-row');
    
    if (rows.length < 8) {
        const newRow = rows[0].cloneNode(true);
        newRow.querySelector('input').value = "";
        const removeBtn = newRow.querySelector('.remove-date-btn');
        removeBtn.classList.remove('hidden');
        wrapper.appendChild(newRow);
    }
}

function removeDateRow(btn) {
    const row = btn.closest('.date-row');
    row.remove();
}