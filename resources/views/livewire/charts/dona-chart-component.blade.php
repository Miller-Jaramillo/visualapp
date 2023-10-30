<div>
    <canvas id="myDoughnutChart"></canvas>
</div>


<script>
    console.log('Labels:', {!! $labels !!});
    console.log('Counts:', {!! $counts !!});
  </script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myDoughnutChart');

        const labels = {!! $labels !!}; // Convertimos los datos PHP a JSON
        const counts = {!! $counts !!}; // Convertimos los datos PHP a JSON

    const data = {
        labels: labels,
        datasets: [{
            label: 'My First Dataset',
            data: counts,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    };

    new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>


@livewireScripts



