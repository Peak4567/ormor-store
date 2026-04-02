function setupEditAgentPrice(price) {
    const btn = document.getElementById("showEditAgentPriceBtn");
    const container = document.getElementById("editAgentPriceContainer");
    const input = document.getElementById("edit_agent_price");

    if (btn && container && input) {
        if (price && parseFloat(price) > 0) {
            container.classList.remove("hidden");
            btn.classList.add("hidden");
            input.value = price;
        } else {
            // ถ้าไม่มีราคา หรือราคาเป็น 0/null
            container.classList.add("hidden");
            btn.classList.remove("hidden");
            input.value = "";
        }
    }
}
function toggleEditAgentPrice() {
    const btn = document.getElementById("showEditAgentPriceBtn");
    const container = document.getElementById("editAgentPriceContainer");
    const input = document.getElementById("edit_agent_price");

    if (container.classList.contains("hidden")) {
        container.classList.remove("hidden");
        btn.classList.add("hidden");
        if (input) input.focus();
    } else {
        container.classList.add("hidden");
        btn.classList.remove("hidden");

        if (input) input.value = "";
    }
}

function setupEditAgentPrice(price) {
    const btn = document.getElementById("showEditAgentPriceBtn");
    const container = document.getElementById("editAgentPriceContainer");
    const input = document.getElementById("edit_agent_price");

    if (btn && container && input) {
        // เช็คว่าราคามีค่าและมากกว่า 0 หรือไม่
        if (price && parseFloat(price) > 0) {
            container.classList.remove("hidden");
            btn.classList.add("hidden");
            input.value = price;
        } else {
            container.classList.add("hidden");
            btn.classList.remove("hidden");
            input.value = "";
        }
    }
}
