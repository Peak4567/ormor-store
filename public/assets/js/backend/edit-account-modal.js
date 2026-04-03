function openEditAccountModal(account) {
    const modal = document.getElementById("editAccountModal");
    const content = document.getElementById("editModalContent");
    const form = document.getElementById("editAccountForm");

    form.action = `/backend/account/${account.id}`;

    document.getElementById("edit_description").value = account.description;
    document.getElementById("edit_category").value = account.category;

    const amount =
        account.category === "รายรับ" ? account.income : account.expense;
    document.getElementById("edit_amount").value = amount;

    modal.classList.remove("hidden");
    setTimeout(() => {
        content.classList.remove("scale-95", "opacity-0");
        content.classList.add("scale-100", "opacity-100");
    }, 10);
}

function closeEditAccountModal() {
    const modal = document.getElementById("editAccountModal");
    const content = document.getElementById("editModalContent");

    content.classList.remove("scale-100", "opacity-100");
    content.classList.add("scale-95", "opacity-0");
    setTimeout(() => {
        modal.classList.add("hidden");
    }, 150);
}
