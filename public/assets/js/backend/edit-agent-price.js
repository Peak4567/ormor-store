function setupEditAgentPrice(price) {
    const btn = document.getElementById("showEditAgentPriceBtn");
    const container = document.getElementById("editAgentPriceContainer");
    const input = document.getElementById("edit_agent_price");

    if (btn && container && input) {
        // ถ้าราคาตัวแทนมากกว่า 0 (เช่น 111.00 แบบในรูป)
        if (price && parseFloat(price) > 0) {
            container.classList.remove("hidden"); // กางช่องกรอกออกมา
            btn.classList.add("hidden"); // ซ่อนปุ่ม "เพิ่มราคาตัวแทน"
            input.value = price; // ใส่ตัวเลขเข้าไป
        } else {
            // ถ้าไม่มีราคา หรือราคาเป็น 0/null
            container.classList.add("hidden"); // ซ่อนช่องกรอก
            btn.classList.remove("hidden"); // โชว์ปุ่ม "เพิ่มราคาตัวแทน"
            input.value = "";
        }
    }
}
/**
 * ฟังก์ชันสำหรับสลับการแสดงผล (Toggle) ในหน้าแก้ไข
 */
function toggleEditAgentPrice() {
    const btn = document.getElementById("showEditAgentPriceBtn");
    const container = document.getElementById("editAgentPriceContainer");
    const input = document.getElementById("edit_agent_price");

    // ตรวจสอบว่าปัจจุบันซ่อนอยู่หรือไม่
    if (container.classList.contains("hidden")) {
        // ถ้าซ่อนอยู่ -> ให้แสดงช่องกรอก และซ่อนปุ่มเขียว
        container.classList.remove("hidden");
        btn.classList.add("hidden");

        // Focus ไปที่ช่องกรอกทันทีเพื่อให้พิมพ์ต่อได้เลย
        if (input) input.focus();
    } else {
        // ถ้าแสดงอยู่ (พอกดปุ่มยกเลิก) -> ให้ซ่อนช่องกรอก และแสดงปุ่มเขียวกลับมา
        container.classList.add("hidden");
        btn.classList.remove("hidden");

        // ล้างค่าในช่องกรอก (ถ้ากดยกเลิก แปลว่าไม่ต้องการใส่ราคาตัวแทน)
        if (input) input.value = "";
    }
}

/**
 * ฟังก์ชันเช็คค่าเริ่มต้นตอนเปิด Modal (ใช้ใน openEditModal)
 */
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
