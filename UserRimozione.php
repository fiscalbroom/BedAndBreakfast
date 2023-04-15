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
  <title>Utente</title>
</head>

<body>
  <div class="flex flex-col h-screen">
    <div class="flex flex-col justify-center mt-4 mb-4">
      <div class="flex justify-center">
        <img src="bnb.png" width="100" height="125">
      </div>
    </div>

    <div class="flex flex-col w-full justify-center items-center mb-4">
      <form action='UserView.php' method='post' class='flex flex-col'>
        <input type='number' name='id' placeholder='Id da rimuovere' class='input input-bordered input-sm mb-2'>
        <div class="flex flex-row justify-between">
            <button class='btn btn-sm rounded-full btn-ghost w-2/5 self-center'>
                <a href="UserView.php" class="">Annulla</a>
            </button>
        <button type='submit' class='btn btn-sm btn-error text-error-content w-2/5 btn-active hover:text-error-content hover:bg-red-400 focus:text-error-content rounded-full w-1/2 self-center'>Rimuovi</button>
        </div>
      </form>
    </div>


    <div class="flex flex-col items-center justify-center h-fill mb-32">
      <div class="flex flex-col gap-y-2 bg-primary p-8 rounded-lg items-center">
        <h1 class="text-5xl font-extrabold text-center text-primary-content mb-8">
          Prenotazioni effettuate
        </h1>
        <?php
        session_start();
        $id = $_SESSION['codice'];
        $con = mysqli_connect("127.0.0.1", "root", "", "Bed_And_Breakfast");

        // Connection check
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
        }

        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
        }

        $query = "SELECT id, Descrizione, DataArrivo, DataPartenza, Disdetta FROM prenotazioni
                  JOIN camere ON prenotazioni.Camera = camere.Numero
                  WHERE Cliente = '$id'
                  ORDER BY DataArrivo";
        $result = mysqli_query($con, $query);

        if (!$result = mysqli_query($con, $query)) {
          exit(mysqli_error($con));
        }

        echo "<table class='table table-zebra text-center'>
            <thead>
              <tr class='text-center'>
                <th>ID</th>
                <th>Camere</th>
                <th>Data di arrivo</th>
                <th>Data di partenza</th>
              </tr>
            </thead>
            <tbody>";

        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
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