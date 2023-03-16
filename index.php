<!DOCTYPE html>
<html class='' data-theme="cupcake">

<head>
<meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Index</title>
</head>
<header>

</header>

<body>
  <div class="flex flex-col justify-center">
    <div class="flex justify-center">
      <img src="bnb.png" width="100" height="125">
    </div>
    <nav>
      <h1></h1>
      <ul class="flex justify-center gap-4 text-3xl">
        <li><a href="">Home</a></li>
        <li><a href="/index.php">Prenota</a href="/prenota.php"></li>
        <li><a href="/login.php">Accedi</a></li>
      </ul>
    </nav>
  </div>

  <?php
  $conn = mysqli_connect("127.0.0.1", "root", "", "Bed_And_Breakfast");

  if (false === $conn) {
    exit("Errore: impossibile stabilire una connessione " . mysqli_connect_error());
  }

  $result = mysqli_query($conn, "SELECT * FROM Camere ORDER BY Numero");

  echo "<br>";
  echo "<br>";
  echo "<div class='flex justify-center items-center h-54 mt-8 mb-16'>";
  echo "<table class='table table-zebra w-1/2'>";
  echo "<thead class='border-2 text-center'><tr><th class='border border-slate-600 bg-slate-600 text-white'>Descrizione</th><th class='border border-slate-700 bg-slate-600 text-white'>Posti</th></tr></thead>";
  while ($row = mysqli_fetch_array($result)) {
    echo "<tr class='text-center'><td class='px-2 border border-slate-700 bg-slate-400 text-black'>" . $row['Descrizione'] . "</td><td class='px-2 border border-slate-700 bg-slate-400 text-black'>" . $row['Posti'] . "</td></tr>";
  }
  echo "</table>";
  echo "</div>";

  mysqli_close($conn);

  ?>
</body>
</html>