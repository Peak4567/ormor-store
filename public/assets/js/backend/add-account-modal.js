function toggleAccountModal() {
    const modal = document.getElementById("accountModal");
    const content = document.getElementById("modalContent");

    if (modal.classList.contains("hidden")) {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        setTimeout(() => {
            content.classList.remove("scale-95", "opacity-0");
            content.classList.add("scale-100", "opacity-100");
        }, 10);
    } else {
        content.classList.remove("scale-100", "opacity-100");
        content.classList.add("scale-95", "opacity-0");
        
        setTimeout(() => {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        }, 0); 
    }
}

document.getElementById("categorySelect").addEventListener("change", function () {
    const label = document.getElementById("amountLabel");
    label.innerText = this.value;
});