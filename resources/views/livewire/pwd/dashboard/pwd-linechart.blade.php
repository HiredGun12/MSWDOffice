<div class="w-full max-w-3xl mx-auto bg-white dark:bg-neutral-900 p-4 rounded-xl shadow-md mt-6">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center mb-4">
        PWD Disability Types Trend
    </h3>
    <!-- Prevent Livewire from re-rendering this canvas -->
    <canvas id="pwdDisabilityLineChart" class="w-full h-64" wire:ignore></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Initialize chart function
    function initPWDChart() {
        fetch('/pwd/disability-chart')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('pwdDisabilityLineChart')?.getContext('2d');
                if (!ctx) return;

                // Destroy old chart instance if exists to prevent duplicates
                if (window.pwdChartInstance) {
                    window.pwdChartInstance.destroy();
                }

                // Create new chart
                window.pwdChartInstance = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'PWD Count by Disability Type',
                            data: data.counts,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2,
                            tension: 0.3,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                labels: {
                                    color: '#374151',
                                    font: { size: 13 }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `${context.raw} PWDs`;
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
            });
    }

    // Run on first load
    document.addEventListener('DOMContentLoaded', initPWDChart);

    // Re-run after Livewire DOM updates
    document.addEventListener('livewire:navigated', initPWDChart);
    document.addEventListener('livewire:update', initPWDChart);
</script>
