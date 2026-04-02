function toggleAgentPrice() {
    const btn = document.getElementById("showAgentPriceBtn");
    const container = document.getElementById("agentPriceContainer");
    const input = container.querySelector('input[name="agent_price"]');

    if (container.classList.contains("hidden")) {
        container.classList.remove("hidden");
        btn.classList.add("hidden");
        input.focus();
    } else {
        container.classList.add("hidden");
        btn.classList.remove("hidden");
        input.value = "";
    }
}
