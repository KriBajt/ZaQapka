<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php
if(isset($_POST["imie"])){
  $imie=$_POST["imie"];
  $nazwisko=$_POST["nazwisko"];
  $email=$_POST["email"];
  $telefon=$_POST["telefon"];
  if(empty($imie)|| empty($nazwisko) || empty($telefon) || empty($email)){
    echo "Wypełnij wszystkie pola";
  }else{
    $nazwa_serwera="localhost";
    $nazwa_uzytkownika="root";
    $haslo="";
    $nazwa_bazy_danych="ogloszenia";

    $connect = new mysqli($nazwa_serwera, $nazwa_uzytkownika, $haslo, $nazwa_bazy_danych);

    $odp = $connect->query("INSERT INTO uzytkownik(imie, nazwisko, telefon, email) VALUES ('$imie',' $nazwisko',' $telefon', '$email')");

    if($odp){
      echo "Dodano uzytkoniwka";

    }else{
      echo "nie udało sie dodać użytkownika";
    }

    $connect->close();
  }
}

?>
  <div class="container">
  <h1>Zaloguj się</h1>
    <form method="POST" action="trello.php">
      Imie:  <input name="imie" type="text" placeholder="imie"><br>
      Nazwisko: <input name="nazwisko" type="text" placeholder="nazwisko"><br>
      Nr telefonu: <input name="telefon" type="phone" placeholder="numer telefonu"><br>
       Email:  <input name="email" type="email" type="email"><br><br>
      <input class="btn btn-primary"type="submit" value="ZAPISZ">
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>
</html>