document.addEventListener("alpine:init", () => {
    Alpine.data("historyWidget", (initialBookings) => ({
        tab: 'all',
        search: '',
        sort: 'desc',
        bookings: initialBookings,
        currentPage: 1,
        perPage: 5,

        // 💡 ฟังก์ชันกรองข้อมูล (Tab และ Search)
        get filteredBookings() {
            let filtered = this.bookings.filter(item => {
                const matchTab = (this.tab === 'all' ||
                    (this.tab === 'pending' && item.status === 'รอตรวจสอบ') ||
                    (this.tab === 'success' && item.status === 'สำเร็จ'));
                
                // ตรวจสอบชื่อสินค้า (ป้องกันกรณีข้อมูลเป็น null)
                const name = item.product_name ? item.product_name.toLowerCase() : '';
                const matchSearch = name.includes(this.search.toLowerCase());
                
                return matchTab && matchSearch;
            });

            // จัดการเรียงลำดับตามวันที่
            return filtered.sort((a, b) => {
                let dateA = new Date(a.created_at);
                let dateB = new Date(b.created_at);
                return this.sort === 'desc' ? dateB - dateA : dateA - dateB;
            });
        },

        // 💡 คำนวณข้อมูลที่จะแสดงในแต่ละหน้า
        get paginatedBookings() {
            const start = (this.currentPage - 1) * this.perPage;
            const end = start + this.perPage;
            return this.filteredBookings.slice(start, end);
        },

        // 💡 คำนวณจำนวนหน้าทั้งหมด
        get totalPages() {
            let total = Math.ceil(this.filteredBookings.length / this.perPage);
            return total > 0 ? total : 1;
        },

        // 💡 ฟังก์ชันเปลี่ยนหน้า
        setPage(page) {
            this.currentPage = page;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },

        // 💡 Reset หน้าปัจจุบันเมื่อมีการค้นหาหรือเปลี่ยน Tab
        resetPage() {
            this.currentPage = 1;
        }
    }));
});