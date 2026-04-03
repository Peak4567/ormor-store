function loadEditDates(dates) {
    const wrapper = document.getElementById('edit-dates-wrapper');
    wrapper.innerHTML = '';

    if (dates && dates.length > 0) {
        dates.forEach(item => addEditDateRow(item.date));
    } else {
        addEditDateRow(); 
    }
}

function addEditDateRow(value = "") {
    const wrapper = document.getElementById('edit-dates-wrapper');
    const rows = wrapper.getElementsByClassName('edit-date-row');
    
    if (rows.length < 8) {
        const div = document.createElement('div');
        div.className = 'flex gap-3 items-center edit-date-row';
        div.innerHTML = `
            <input type="date" name="dates[]" value="${value}" required
                class="flex-1 border border-gray-200 rounded-xl px-4 py-2 focus:outline-none focus:border-green-500 text-sm font-bold text-gray-600">
            <button type="button" onclick="removeEditDateRow(this)" 
                class="remove-edit-date-btn ${rows.length === 0 && !value ? 'hidden' : ''} text-red-400 hover:text-red-600 p-2">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        `;
        wrapper.appendChild(div);
        updateEditDateButtons();
    }
}

function removeEditDateRow(btn) {
    btn.closest('.edit-date-row').remove();
    updateEditDateButtons();
}

function updateEditDateButtons() {
    const wrapper = document.getElementById('edit-dates-wrapper');
    const rows = wrapper.querySelectorAll('.edit-date-row');
    rows.forEach(row => {
        const btn = row.querySelector('.remove-edit-date-btn');
        if (rows.length === 1) btn.classList.add('hidden');
        else btn.classList.remove('hidden');
    });
}