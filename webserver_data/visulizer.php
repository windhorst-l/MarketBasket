<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amazing Shop</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <nav>
      <div class="nav-wrapper deep-purple darken-3">
        <a href="#" class="brand-logo"><i class="material-icons">store</i>Amazing Shop</a>
        <ul class="right hide-on-med-and-down">
          <li><i class="material-icons">shopping_cart</i></li>
          <li><i class="material-icons">account_box</i></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
  </header>
<main>
        <canvas id="myChart"></canvas> <!-- Hier wird das Diagramm gezeichnet -->
</main>
<footer>

</footer>
  <script defer src="https://dart.dev/tools/dart2js/dart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
            var ctx = document.getElementById('myChart').getContext('2d');

// Erstelle das Balkendiagramm
var myChart = new Chart(ctx, {
    type: 'bar', // Diagrammtyp: "bar" für Balkendiagramm
    data: {
        labels: ['Januar', 'Februar', 'März', 'April', 'Mai'], // X-Achsen-Beschriftung
        datasets: [{
            label: 'Umsatz in €',
            data: [500, 700, 1200, 1500, 900], // Werte für die Balken
            backgroundColor: ['red', 'blue', 'green', 'orange', 'purple'], // Farben der Balken
            borderColor: 'black', // Randfarbe
            borderWidth: 1 // Randbreite
        }]
    },
    options: {
        responsive: true, // Diagramm passt sich der Bildschirmgröße an
        scales: {
            y: {
                beginAtZero: true // Die Y-Achse beginnt bei 0
            }
        }
    }
});
  </script>
</body>
</html>
