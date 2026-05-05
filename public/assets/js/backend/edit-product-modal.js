function openEditModal(product) {
    const modal = document.getElementById("editProductModal");
    const form = document.getElementById("editProductForm");

    form.action = `/backend/product/${product.id}`;

    document.getElementById("edit_product_name").value = product.product_name;
    document.getElementById("edit_main_price").value = product.main_price;
    document.getElementById("edit_stock").value = product.stock;
    
    document.getElementById("edit_note").value = product.note || "";

    document.getElementById("edit_discount_users").value = product.discount_users || "";
    document.getElementById("edit_discount_amount").value = product.discount_amount || "";

    document.getElementById("edit_status").checked =
        product.status === "เปิดจอง";

    if (typeof setupEditAgentPrice === "function") {
        setupEditAgentPrice(product.agent_price);
    }

    if (typeof loadEditDates === "function") loadEditDates(product.sale_dates);
    if (typeof loadEditTimeSlots === "function")
        loadEditTimeSlots(product.time_slots);

    modal.classList.remove("hidden");
}

function closeEditModal() {
    const modal = document.getElementById("editProductModal");
    if (modal) {
        modal.classList.add("hidden");
    }
}

window.addEventListener("click", function (e) {
    const modal = document.getElementById("editProductModal");
    if (e.target === modal) {
        closeEditModal();
    }
});