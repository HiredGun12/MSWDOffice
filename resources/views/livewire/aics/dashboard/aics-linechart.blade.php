<div class="w-full max-w-5xl mx-auto p-4">
    <canvas id="aicsLineChart" wire:ignore></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function initAicsLineChart() {
        const ctx = document.getElementById('aicsLineChart')?.getContext('2d');
        if (!ctx) return;

        const chartData = @json($chartData);

        // Destroy previous chart instance if exists
        if (window.aicsChartInstance) {
            window.aicsChartInstance.destroy();
        }

        // Create new chart
        window.aicsChartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: chartData.datasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    title: { display: true, text: 'AICS Assistance per Barangay' }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: 'Total Amount' }
                    },
                    x: {
                        title: { display: true, text: 'Month' }
                    }
                }
            }
        });
    }

    // Initialize on first load
    document.addEventListener('DOMContentLoaded', initAicsLineChart);

    // Re-run after Livewire DOM updates
    document.addEventListener('livewire:update', initAicsLineChart);
    document.addEventListener('livewire:navigated', initAicsLineChart);
</script>
