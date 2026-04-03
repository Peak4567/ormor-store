function loadEditTimeSlots(slots) {
    const wrapper = document.getElementById('edit-slots-wrapper');
    wrapper.innerHTML = '';

    if (slots && slots.length > 0) {
        slots.forEach(slot => {

            const start = slot.start_time.substring(0, 5);
            const end = slot.end_time.substring(0, 5);
            addEditTimeRow(start, end);
        });
    } else {
        addEditTimeRow();
    }
}

function addEditTimeRow(start = "", end = "") {
    const wrapper = document.getElementById('edit-slots-wrapper');
    const rows = wrapper.querySelectorAll('.edit-time-slot-row');

    if (rows.length < 8) {
        const div = document.createElement('div');
        div.className = 'flex gap-3 items-center edit-time-slot-row';
        div.innerHTML = `
            <input type="time" name="start_times[]" value="${start}" required 
                class="flex-1 border border-gray-200 rounded-xl px-4 py-2 focus:outline-none focus:border-green-500 text-sm font-bold text-gray-800">
            <span class="text-gray-400 font-extrabold">-</span>
            <input type="time" name="end_times[]" value="${end}" required 
                class="flex-1 border border-gray-200 rounded-xl px-4 py-2 focus:outline-none focus:border-green-500 text-sm font-bold text-gray-800">
            <button type="button" onclick="removeEditTimeRow(this)" class="remove-edit-btn text-red-400 hover:text-red-600 p-2">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        `;
        wrapper.appendChild(div);
        updateEditTimeButtons();
    }
}

function removeEditTimeRow(btn) {
    btn.closest('.edit-time-slot-row').remove();
    updateEditTimeButtons();
}

function updateEditTimeButtons() {
    const wrapper = document.getElementById('edit-slots-wrapper');
    const rows = wrapper.querySelectorAll('.edit-time-slot-row');
    rows.forEach(row => {
        const btn = row.querySelector('.remove-edit-btn');
        if (rows.length === 1) btn.classList.add('hidden');
        else btn.classList.remove('hidden');
    });
}