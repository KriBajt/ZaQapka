<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
{
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>


<?php
if(isset($_POST["kto"])){
  $kto=$_POST["kto"];
  $tresc=$_POST["tresc"];



  if(empty($kto)|| empty($tresc) ){
    echo "Wypełnij wszystkie pola";
  }else{
    $nazwa_serwera="localhost";
    $nazwa_uzytkownika="root";
    $haslo="";
    $nazwa_bazy_danych="trello";

    $connect = new mysqli($nazwa_serwera, $nazwa_uzytkownika, $haslo, $nazwa_bazy_danych);

    $odp = $connect->query("INSERT INTO osoby(kto, tresc) VALUES ('$kto',' $tresc')");

    if($odp){
      echo "Dodano uzytkoniwka";

    }else{
      echo "nie udało sie dodać użytkownika";
    }

    $connect->close();
  }
}
?>

<nav>

    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
  </nav>
  <br><BR><BR>



<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
         <input name="kto" type="text" placeholder="Imie"><br>
        </div>
      </div>
    </form>
  </div>

<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <textarea name="tresc" id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Napisz co potrzeba</label>
        </div>
      </div>
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