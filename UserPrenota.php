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
  <title>Prenota utente</title>
</head>

<body>
  <div class="flex flex-col h-screen">
  <div class="flex flex-col justify-center mt-4 mb-4">
      <div class="flex justify-center">
        <img src="bnb.png" width="100" height="125">
      </div>
      <nav>
        <div class="flex m-2 justify-center gap-x-4 ">
          <a href="AdminView.php">
            <button class="btn btn-secondary">Indietro</button>
          </a>
        </div>
      </nav>
    </div>

    <div class="flex flex-col items-center justify-center h-full mb-32">
      <div class="flex flex-col gap-y-2 bg-primary p-8 rounded-lg items-center">
        <h1 class="text-5xl font-extrabold text-center text-primary-content mb-8">
          Prenota una camera
        </h1>

        <form action="UserAggiunto.php" method="post" class="gap-y-4">
          <div class="flex flex-col gap-y-1">
            <?php
        $con = mysqli_connect("127.0.0.1", "root", "", "Bed_And_Breakfast");

            // Connection check
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              exit();
            }

            $query = "SELECT Numero, Descrizione FROM camere";
            $result = mysqli_query($con, $query);

            if (!$result) {
              echo "Error: " . $query . "<br>" . mysqli_error($con);
              exit();
            } else {
              echo "<label for='room' class='font-bold text-primary-content'>Room</label>";
              echo "<select name='room' id='room' class='select bg-base-100 text-base-content select-bordered w-96' required>";
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['Numero'] . "'>" . $row['Descrizione'] . "</option>";
              }
              echo "</select>";
            }

            mysqli_close($con);
            ?>
          </div>

          <div class="flex flex-col gap-y-1">
            <label for="arrivalDate" class="font-bold text-primary-content">Data di arrivo</label>
            <input type="date" name="arrivalDate" id="arrivalDate" class="input bg-base-100 text-base-content input-bordered w-96" required>
          </div>

          <div class="flex flex-col gap-y-1">
            <label for="departureDate" class="font-bold text-primary-content
            ">Data di partenza</label>
            <input type="date" name="departureDate" id="departureDate" class="input bg-base-100 text-base-content input-bordered w-96" required>
          </div>

          <div class="flex w-full justify-end mt-4">
            <button type="submit" class="btn btn-secondary btn-active">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>