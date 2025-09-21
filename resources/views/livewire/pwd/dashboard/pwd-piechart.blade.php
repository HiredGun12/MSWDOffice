<div class="w-full max-w-sm mx-auto bg-white dark:bg-neutral-900 p-4 rounded-xl shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center mb-4">
        PWD Gender
    </h3>
    <!-- Prevent Livewire from re-rendering the canvas -->
    <canvas id="pwdGenderPieChart" class="w-full h-64" wire:ignore></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Initialize gender chart function
    function initGenderChart() {
        fetch('/pwd/gender-chart')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('pwdGenderPieChart')?.getContext('2d');
                if (!ctx) return;

                // Destroy previous chart instance if exists
                if (window.genderChartInstance) {
                    window.genderChartInstance.destroy();
                }

                // Create new chart
                window.genderChartInstance = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Male', 'Female'],
                        datasets: [{
                            data: [data.male, data.female],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.7)', // Blue
                                'rgba(255, 99, 132, 0.7)'  // Pink
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
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
    document.addEventListener('DOMContentLoaded', initGenderChart);

    // Re-run after Livewire DOM updates
    document.addEventListener('livewire:navigated', initGenderChart);
    document.addEventListener('livewire:update', initGenderChart);
</script>
