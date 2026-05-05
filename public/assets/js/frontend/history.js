document.addEventListener("alpine:init", () => {
    Alpine.data("historyWidget", (initialBookings) => ({
        tab: 'all',
        search: '',
        sort: 'desc',
        bookings: initialBookings,
        currentPage: 1,
        perPage: 5,

        get filteredBookings() {
            let filtered = this.bookings.filter(item => {
                const matchTab = (this.tab === 'all' ||
                    (this.tab === 'pending' && item.status === 'รอตรวจสอบ') ||
                    (this.tab === 'success' && item.status === 'สำเร็จ'));
                
                const name = item.product_name ? item.product_name.toLowerCase() : '';
                const matchSearch = name.includes(this.search.toLowerCase());
                
                return matchTab && matchSearch;
            });

            return filtered.sort((a, b) => {
                let dateA = new Date(a.created_at);
                let dateB = new Date(b.created_at);
                return this.sort === 'desc' ? dateB - dateA : dateA - dateB;
            });
        },

        get paginatedBookings() {
            const start = (this.currentPage - 1) * this.perPage;
            const end = start + this.perPage;
            return this.filteredBookings.slice(start, end);
        },

        get totalPages() {
            let total = Math.ceil(this.filteredBookings.length / this.perPage);
            return total > 0 ? total : 1;
        },

        setPage(page) {
            this.currentPage = page;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },

        resetPage() {
            this.currentPage = 1;
        }
    }));
});