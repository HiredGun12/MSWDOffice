<div class="w-full max-w-xl mx-auto bg-white dark:bg-neutral-900 p-4 rounded-xl shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center mb-4">
        Senior Citizen Gender Distribution
    </h3>
    <canvas id="seniorGenderLineChart" class="w-full h-64" wire:ignore></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
function initSeniorGenderLineChart() {
    fetch('/senior/gender-linechart')
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('seniorGenderLineChart')?.getContext('2d');
            if (!ctx) return;

            if (window.seniorLineChartInstance) {
                window.seniorLineChartInstance.destroy();
            }

            window.seniorLineChartInstance = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.labels,
                    datasets: [
                        {
                            label: 'Male',
                            data: data.male,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Female',
                            data: data.female,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            tension: 0.3,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#374151',
                                font: { size: 13 }
                            }
                        }
                    }
                }
            });
        });
}

document.addEventListener('DOMContentLoaded', initSeniorGenderLineChart);
document.addEventListener('livewire:update', initSeniorGenderLineChart);
</script>
