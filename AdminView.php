<!DOCTYPE html>
<html lang="en" data-theme="winter">
<link rel="icon" href='bnb.png' class='bg-repeat' width='400' height='500'>


<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Admin</title>
</head>

<body>
  <?php
  if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $con = mysqli_connect("127.0.0.1", "root", "", "Bed_And_Breakfast");

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    $deleteSoggiorni = "DELETE FROM soggiorni WHERE Prenotazione = $id";
    $deletePrenotazioni = "DELETE FROM prenotazioni WHERE id = $id";
    $resultSoggiorni = mysqli_query($con, $deleteSoggiorni);
    $resultPrenotazioni = mysqli_query($con, $deletePrenotazioni);

    mysqli_close($con);
  }
  ?>
  <div class="flex flex-col h-screen">
    <div class="flex flex-col justify-center mt-4 mb-4">
      <div class="flex justify-center">
        <img src="bnb.png" width="100" height="125">
      </div>
      <nav>
        <div class="flex m-2 justify-center gap-x-4 ">
          <a href="index.php">
            <button class="btn btn-secondary">Logout</button>
          </a>

          <a href="AdminPrenota.php">
            <button class="btn btn-accent">Prenota</button>
          </a>

          <a href="AdminRimozione.php">
            <button class="btn btn-error">Elimina</button>
          </a>
        </div>
      </nav>
    </div>

    <div class="flex flex-col items-center justify-center h-fill mb-32">
      <div class="flex flex-col gap-y-2 bg-primary p-8 rounded-lg items-center">
        <h1 class="text-5xl font-extrabold text-center text-primary-content mb-8">
          Prenotazioni effettuate
        </h1>
        <?php
        $con = mysqli_connect("127.0.0.1", "root", "", "Bed_And_Breakfast");

        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
        }

        $query = "SELECT nome, cognome, Descrizione, DataArrivo, DataPartenza, Disdetta FROM prenotazioni
                    JOIN clienti ON prenotazioni.Cliente = clienti.codice
                    JOIN camere ON prenotazioni.Camera = camere.Numero";
        $result = mysqli_query($con, $query);

        if (!$result = mysqli_query($con, $query)) {
          exit(mysqli_error($con));
        }

        echo "<table class='table table-zebra text-center'>
            <thead>
              <tr class='text-center'>
                <th>Cognome</th>
                <th>Nome</th>
                <th>Stanza</th>
                <th>Data Arrivo</th>
                <th>Data Partenza</th>
              </tr>
            </thead>
            <tbody>";

        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['cognome'] . "</td>";
          echo "<td>" . $row['nome'] . "</td>";
          echo "<td>" . $row['Descrizione'] . "</td>";
          echo "<td>" . $row['DataArrivo'] . "</td>";
          echo "<td>" . $row['DataPartenza'] . "</td>";
          echo "</tr>";
        }

        echo "</tbody>
          </table>";

        mysqli_close($con);
        ?>
      </div>
    </div>
  </div>
</body>

</html>