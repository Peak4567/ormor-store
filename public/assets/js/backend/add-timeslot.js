document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.getElementById('slots-wrapper');
    const addBtn = document.getElementById('add-time-btn');
    const maxSlots = 8;

    function updateButtons() {
        const rows = wrapper.querySelectorAll('.time-slot-row');
        
        addBtn.style.display = rows.length >= maxSlots ? 'none' : 'block';
        
        rows.forEach((row) => {
            const removeBtn = row.querySelector('.remove-btn');
            if (rows.length === 1) {
                removeBtn.classList.add('hidden');
            } else {
                removeBtn.classList.remove('hidden');
            }
        });
    }

    function handleRemoveClick(e) {
        const row = e.currentTarget.closest('.time-slot-row');
        row.remove();
        updateButtons();
    }

    wrapper.querySelector('.remove-btn').addEventListener('click', handleRemoveClick);

    addBtn.addEventListener('click', function() {
        const rows = wrapper.querySelectorAll('.time-slot-row');
        if (rows.length < maxSlots) {
            const newRow = rows[0].cloneNode(true);
            
            newRow.querySelectorAll('input').forEach(input => input.value = '');
            
            const removeBtn = newRow.querySelector('.remove-btn');
            removeBtn.addEventListener('click', handleRemoveClick);

            wrapper.appendChild(newRow);
            updateButtons();
        }
    });

    updateButtons();
});