


<div class="w-full max-w-sm mx-auto dark:bg-neutral-900 p-4 rounded-xl shadow-lg flex flex-col items-center" style="height: 260px;">

    <canvas id="soloParentPieChart" class="w-full h-full"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:init', () => {
        const ctx = document.getElementById('soloParentPieChart').getContext('2d');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    label: 'Gender Distribution',
                    data: [@json($maleCount), @json($femaleCount)],
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
                maintainAspectRatio: true,  // Keeps proper proportions
                aspectRatio: 1,             // Ensures square pie
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#374151',
                            font: { size: 14 }
                        }
                    }
                }
            }
        });
    });
</script>
