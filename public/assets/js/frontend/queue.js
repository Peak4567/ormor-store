document.addEventListener("alpine:init", () => {
    Alpine.data("bookingWidget", (initialProducts, defaultId) => ({
        bookingDate: "",
        bookingTime: "",
        note: "",
        products: initialProducts,
        selectedProductId: "",

        get selectedProduct() {
            if (!this.selectedProductId) return null;
            return this.products.find((p) => p.id == this.selectedProductId);
        },

        formatThaiDate(date) {
            if (!date) return "ยังไม่ได้เลือก";
            return new Date(date).toLocaleDateString("th-TH", {
                year: "numeric",
                month: "long",
                day: "numeric",
            });
        },

        formatTime(timeStr) {
            if (!timeStr) return "";
            return timeStr.substring(0, 5);
        },

        getFormattedTimes() {
            if (!this.selectedProduct) return [];
            let slots = this.selectedProduct.time_slots || this.selectedProduct.timeSlots;
            if (!slots) return [];
            
            let times = [];
            slots.forEach(slot => {
                let startHr = slot.start_time.substring(0, 2) + ':00';
                let endHr = slot.end_time.substring(0, 2) + ':00';
                if (!times.includes(startHr)) times.push(startHr);
                if (!times.includes(endHr) && startHr !== endHr) times.push(endHr);
            });
            return times.sort();
        },

        fpInstance: null,

        init() {
            this.fpInstance = flatpickr(this.$refs.dateInput, {
                dateFormat: "Y-m-d",
                onChange: (selectedDates, dateStr) => {
                    this.bookingDate = dateStr;
                },
            });

            this.updateCalendar();

            this.$watch("selectedProductId", (newId) => {
                this.bookingDate = "";
                this.bookingTime = "";
                this.updateCalendar();
            });
        },

        updateCalendar() {
            if (!this.selectedProduct) {
                let allDates = [];
                let globalMin = null;
                let globalMax = null;

                this.products.forEach((p) => {
                    if (p.availableDatesArray) {
                        allDates.push(...p.availableDatesArray);
                    } else if (p.available_start) {
                        if (!globalMin || p.available_start < globalMin)
                            globalMin = p.available_start;
                        if (p.available_end && (!globalMax || p.available_end > globalMax))
                            globalMax = p.available_end;
                    }
                });

                this.fpInstance.clear();

                if (allDates.length > 0) {
                    let uniqueDates = [...new Set(allDates)];
                    this.fpInstance.set("enable", uniqueDates);
                    this.fpInstance.set("minDate", null);
                    this.fpInstance.set("maxDate", null);
                } else if (globalMin) {
                    this.fpInstance.set("enable", [() => true]);
                    this.fpInstance.set("minDate", globalMin);
                    this.fpInstance.set("maxDate", globalMax);
                } else {
                    this.fpInstance.set("enable", []);
                }
                return;
            }

            this.fpInstance.clear();
            if (this.selectedProduct.availableDatesArray) {
                this.fpInstance.set("minDate", null);
                this.fpInstance.set("maxDate", null);
                this.fpInstance.set("enable", this.selectedProduct.availableDatesArray);
            } else if (this.selectedProduct.available_start) {
                this.fpInstance.set("enable", [() => true]);
                this.fpInstance.set("minDate", this.selectedProduct.available_start);
                this.fpInstance.set("maxDate", this.selectedProduct.available_end || null);
            }
        },

        async confirmBooking() {
            if (!this.selectedProductId || !this.bookingDate || !this.bookingTime) {
                showSwalAlert('warning', 'ข้อมูลไม่ครบถ้วน', 'กรุณากรอกข้อมูลให้ครบถ้วนก่อนยืนยันการจองครับ');
                return;
            }
            const confirmResult = await Swal.fire({
                title: 'ยืนยันการจองคิว?',
                html: `<div class="text-left mt-4 text-sm bg-slate-50 p-5 rounded-2xl border border-slate-100">
                           <p class="mb-2"><b>แพ็กเกจ:</b> <span class="font-medium">${this.selectedProduct.product_name}</span></p>
                           <p class="mb-2"><b>วันที่:</b> <span class="text-[#57C84D] font-medium">${this.formatThaiDate(this.bookingDate)}</span></p>
                           <p><b>เวลา:</b> <span class="text-[#57C84D] font-medium">${this.bookingTime}</span> น.</p>
                       </div>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#57C84D',
                cancelButtonColor: '#f3f4f6',
                confirmButtonText: 'ใช่, ยืนยันการจอง!',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-[2rem] font-[Prompt]',
                    confirmButton: 'rounded-xl px-6 py-2.5 font-bold text-white',
                    cancelButton: 'rounded-xl px-6 py-2.5 font-bold text-gray-500'
                }
            });

            if (!confirmResult.isConfirmed) return;

            showSwalLoading();

            try {
                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                const response = await fetch("/booking/store", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": token,
                    },
                    body: JSON.stringify({
                        product_code: this.selectedProduct.product_code,
                        product_name: this.selectedProduct.product_name,
                        price: this.selectedProduct.main_price,
                        booking_date: this.bookingDate,
                        booking_time: this.bookingTime,
                        note: this.note,
                    }),
                });

                const result = await response.json();

                if (response.ok) {
                    await Swal.fire({
                        icon: 'success',
                        title: 'จองคิวสำเร็จ!',
                        html: `รหัสการจอง: <b class="text-[#57C84D] text-lg">${result.booking_code}</b>`,
                        confirmButtonColor: '#57C84D',
                        confirmButtonText: 'ตกลง',
                        customClass: {
                            popup: 'rounded-[2rem] font-[Prompt]',
                            confirmButton: 'rounded-xl px-8 py-2.5 font-bold'
                        }
                    });
                    window.location.reload();
                } else {
                    throw new Error(result.message || "ไม่สามารถจองได้");
                }
            } catch (error) {
                showSwalAlert('error', 'เกิดข้อผิดพลาด', error.message || "การเชื่อมต่อเซิร์ฟเวอร์ขัดข้อง");
            }
        },
    }));
});