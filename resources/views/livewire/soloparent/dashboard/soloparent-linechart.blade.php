<div class="w-full max-w-3xl mx-auto bg-white dark:bg-neutral-900 p-4 rounded-xl shadow-md mt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center mb-4">
        Solo Parent Count by Barangay
    </h3>
    <canvas id="soloParentLineChart" class="w-full h-64" wire:ignore></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let soloParentChartInstance = null;

    function renderSoloParentChart(data) {
        const ctx = document.getElementById('soloParentLineChart')?.getContext('2d');
        if (!ctx) return;

        // Destroy old chart before creating a new one
        if (soloParentChartInstance) {
            soloParentChartInstance.destroy();
        }

        soloParentChartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Solo Parent Count',
                    data: data.counts,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    tension: 0.3,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#374151',
                            font: { size: 14 }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.raw} Solo Parents`;
                            }
                        }
                    }
                },
                scales: {
                    x: { ticks: { color: '#374151' } },
                    y: { ticks: { color: '#374151' }, beginAtZero: true }
                }
            }
        });
    }

    // Initialize chart on first load
    document.addEventListener('DOMContentLoaded', () => {
        renderSoloParentChart(@json($chartData));
    });

    // Re-initialize after every Livewire update (no refresh needed)
    document.addEventListener('livewire:update', () => {
        renderSoloParentChart(@json($chartData));
    });
</script>
