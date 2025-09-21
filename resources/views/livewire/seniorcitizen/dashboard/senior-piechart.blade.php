<div class="w-full max-w-sm mx-auto bg-white dark:bg-neutral-900 p-4 rounded-xl shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center mb-4">
        Senior Citizen Age Distribution
    </h3>
    <!-- Prevent Livewire from re-rendering the canvas -->
    <canvas id="seniorAgePieChart" class="w-full h-64" wire:ignore></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Initialize senior age chart function
    function initSeniorAgeChart() {
        fetch('/senior/age-chart') // Create this route in controller
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('seniorAgePieChart')?.getContext('2d');
                if (!ctx) return;

                // Destroy previous chart instance if exists
                if (window.seniorAgeChartInstance) {
                    window.seniorAgeChartInstance.destroy();
                }

                // Create new chart
                window.seniorAgeChartInstance = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['60+', '90+', '95+', '100+'],
                        datasets: [{
                            data: [data.age_60, data.age_90, data.age_95, data.age_100],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',  // Teal
                                'rgba(255, 206, 86, 0.7)',  // Yellow
                                'rgba(153, 102, 255, 0.7)', // Purple
                                'rgba(255, 99, 132, 0.7)'   // Red
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
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

    // Run on first load
    document.addEventListener('DOMContentLoaded', initSeniorAgeChart);

    // Re-run after Livewire DOM updates
    document.addEventListener('livewire:navigated', initSeniorAgeChart);
    document.addEventListener('livewire:update', initSeniorAgeChart);
</script>
