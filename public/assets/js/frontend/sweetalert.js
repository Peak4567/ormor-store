const swalConfig = {
    confirmButtonColor: "#57C84D",
    cancelButtonColor: "#f3f4f6",
    customClass: {
        popup: "rounded-[2rem] font-[Prompt]",
        confirmButton: "rounded-xl px-6 py-2.5 font-bold",
        cancelButton: "rounded-xl px-6 py-2.5 font-bold text-gray-500",
    },
};
const showSwalLoading = (title = "กำลังบันทึกข้อมูล...") => {
    Swal.fire({
        title: title,
        allowOutsideClick: false,
        showConfirmButton: false,
        customClass: { popup: "rounded-[2rem] font-[Prompt]" },
        didOpen: () => {
            Swal.showLoading();
        },
    });
};

const showSwalAlert = (icon, title, text) => {
    return Swal.fire({
        ...swalConfig,
        icon: icon,
        title: title,
        text: text,
        confirmButtonColor: icon === "error" ? "#FF5B5B" : "#57C84D",
    });
};
function confirmCancelBooking(id, productName, url) {
    Swal.fire({
        title: "ยืนยันการยกเลิก?",
        text: `คุณต้องการยกเลิกการจอง "${productName}" ใช่หรือไม่?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF5B5B",
        cancelButtonColor: "#f3f4f6",
        confirmButtonText: "ใช่, ยกเลิกเลย!",
        cancelButtonText: "กลับไปก่อน",
        reverseButtons: true,
        customClass: {
            popup: "rounded-[2rem]",
            confirmButton: "rounded-xl px-6 py-2.5 font-bold",
            cancelButton: "rounded-xl px-6 py-2.5 font-bold text-gray-500",
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const token = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content");

            if (!token) {
                Swal.fire("Error", "ไม่พบ CSRF Token", "error");
                return;
            }

            let form = document.createElement("form");
            form.action = url;
            form.method = "POST";

            form.innerHTML = `
                <input type="hidden" name="_token" value="${token}">
            `;

            document.body.appendChild(form);
            form.submit();
        }
    });
}
