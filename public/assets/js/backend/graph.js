document.addEventListener("DOMContentLoaded", function () {
    const canvas = document.getElementById('revenueChart');
    if (!canvas) return;

    const rawData = canvas.getAttribute('data-chart');
    const chartData = JSON.parse(rawData);

    const ctx = canvas.getContext('2d');

    const gradient = ctx.createLinearGradient(0, 0, 0, 250);
    gradient.addColorStop(0, 'rgba(59, 130, 246, 0.2)');
    gradient.addColorStop(1, 'rgba(59, 130, 246, 0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.',
                'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'
            ],
            datasets: [{
                label: 'รายได้ (บาท)',
                data: chartData,
                borderColor: '#3b82f6',
                backgroundColor: gradient,
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#3b82f6',
                pointBorderWidth: 2,
                pointRadius: 4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return ' ฿ ' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: '#f8fafc' },
                    ticks: {
                        callback: function (value) { return value.toLocaleString(); }
                    }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });
});