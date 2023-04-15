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
  <title>Aggiunto</title>
</head>

<body>
  <div class="flex flex-col h-screen">
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

            <a href="UserView.php">
              <button class="btn btn-accent">Home</button>
            </a>
          </div>
        </nav>
      </div>

      <div class="flex flex-col items-center justify-center h-full mb-32">
        <div class="flex flex-col gap-y-2 bg-primary p-8 rounded-lg items-center">
          <?php
          session_start();

          $userId = $_SESSION['codice'];

          $con = mysqli_connect("127.0.0.1", "root", "", "Bed_And_Breakfast");

          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
          }

          if (isset($_POST['room']) && isset($_POST['arrivalDate']) && isset($_POST['departureDate'])) {
            $roomId = $_POST['room'];
            $arrivalDate = $_POST['arrivalDate'];
            $departureDate = $_POST['departureDate'];

            $query = "INSERT INTO prenotazioni (Cliente, Camera, DataArrivo, DataPartenza) VALUES ('$userId', '$roomId', '$arrivalDate', '$departureDate')";

            if (!$result = mysqli_query($con, $query)) {
              echo "<script>alert('Reservation failed')</script>";
              header("Location: UserView.php");
            } else {
              header("Location: UserView.php");
            }
          } else {
            echo "<script>alert('Reservation failed')</script>";
            header("Location: UserView.php");
          }
          ?>
        </div>
      </div>
    </div>
</body>

</html>