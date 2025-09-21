<div class="w-full max-w-lg mx-auto p-4">
    <canvas id="aicsPieChart" wire:ignore></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function renderAicsPieChart() {
        const ctx = document.getElementById('aicsPieChart')?.getContext('2d');
        if (!ctx) return;

        const chartData = @json($chartData);

        // Destroy previous chart to avoid duplicates
        if (window.aicsPieChartInstance) {
            window.aicsPieChartInstance.destroy();
        }

        // Create new chart
        window.aicsPieChartInstance = new Chart(ctx, {
            type: 'pie',
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: { 
                        position: 'bottom',
                        labels: { color: '#374151', font: { size: 13 } }
                    },
                    title: { 
                        display: true, 
                        text: 'AICS Assistance by Purpose',
                        color: '#374151',
                        font: { size: 16, weight: 'bold' }
                    }
                }
            }
        });
    }


    document.addEventListener('DOMContentLoaded', renderAicsPieChart);


    document.addEventListener('livewire:update', renderAicsPieChart);
    document.addEventListener('livewire:navigated', renderAicsPieChart);
</script>
