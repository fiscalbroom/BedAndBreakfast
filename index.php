<!DOCTYPE html>
<html class='' data-theme="winter">
<link rel="icon" href='bnb.png' class='bg-repeat' width='400' height='500'>


<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Index</title>
</head>
<header>

</header>

<body>
  <div class="flex flex-col justify-center mb-4">
    <div class="flex justify-center">
      <img src="bnb.png" width="100" height="125">
    </div>
    <nav>
      <div class="flex m-2 justify-center gap-x-4 ">


        <a href="login.php">
          <button class="btn btn-accent rounded-lg">Accedi</button>
        </a>
      </div>
    </nav>
  </div>

  <div class="flex flex-col items-center justify-center h-fill mb-32">
    <div class="flex flex-col gap-y-2 bg-primary p-8 rounded-lg items-center">
      <h1 class="text-5xl font-extrabold text-center text-primary-content mb-8">
        Camere disponibili
      </h1>
      <?php
      $conn = mysqli_connect("127.0.0.1", "root", "", "Bed_And_Breakfast");

      if (false === $conn) {
        exit("Errore: impossibile stabilire una connessione " . mysqli_connect_error());
      }

      $result = mysqli_query($conn, "SELECT * FROM Camere ORDER BY Numero");

      echo "<table class='table table-zebra w-full text-center'>";
      echo "<thead class=''><tr><th class=''>Descrizione</th><th class=''>Posti</th></tr></thead>";
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr class=''><td class=''>" . $row['Descrizione'] . "</td><td class=''>" . $row['Posti'] . "</td></tr>";
      }
      echo "</table>";

      mysqli_close($conn);

      ?>
    </div>
  </div>
</body>

</html>