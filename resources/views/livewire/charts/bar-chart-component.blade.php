<div >
    <div >
        <canvas id="myChart"></canvas>
      </div>

      <script>
        console.log('Labels:', {!! $labels !!});
        console.log('Counts:', {!! $counts !!});
      </script>


      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



      <script>
        const ctx = document.getElementById('myChart');
        const labels = {!! $labels !!}; // Convertimos los datos PHP a JSON
        const counts = {!! $counts !!}; // Convertimos los datos PHP a JSON

            // Definimos un array de colores personalizados
     const customColors = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        // Agrega más colores según sea necesario
    ];

    const customColors2 = [
    'rgba(255, 99, 132, 0.2)', // Rojo
    'rgba(75, 192, 192, 0.2)', // Verde
    'rgba(255, 206, 86, 0.2)', // Amarillo
    'rgba(54, 162, 235, 0.2)' // Azul
];


        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Registro de accidentes por genero',
              data: counts,
              backgroundColor: customColors2, // Usamos el array de colores personalizados
            borderColor: customColors.map(color => color.replace('0.2', '1')), // Colores de borde

              borderWidth: 1
            }]
          },
          options: {
        maintainAspectRatio: false, // Evitar ajuste automático
        responsive: true, // Hacer que el gráfico sea receptivo
        width: 500, // Ancho personalizado
        height: 600 // Alto personalizado
      }
        });




      </script>








