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
  <title>ZakupowaAPKA</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<nav>

<div class="nav-wrapper #37474f blue-grey darken-3">
  <h5 class="brand-logo center">ZakupowaApka</h5>
  <ul id="nav-mobile" class="right hide-on-med-and-down">
    <!-- <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">JavaScript</a></li> -->
  </ul>
</div>
</nav>
<br><BR><BR>

<div class="container">
<div class="row">
<form method="POST" action="success.php" class="col s12">
  <div class="row">
    <div class="input-field col s12">
     <input name="kto" type="text" id="text1"> <br>
     <label for="text1">Imie osoby dodającej zadanie</label>
    </div>
  </div>
</div>
  <div class="row">
    <div class="input-field col s12">
      <textarea name="tresc" id="textarea1" class="materialize-textarea"></textarea>
      <label for="textarea1">Napisz co jest potrzeba</label>
    </div>
  </div>
  <!-- <input class=" btn-dark" value="ZAPISZ"> -->
  <button type="submit" class="btn #424242 grey darken-3">Dodaj Zadanie</button>
</form>
<!--  Kod PHP odpowiadający za zapisywanie danych w BazieDanych -->

<?php
            if(isset($_POST["kto"])){
            $kto=$_POST["kto"];
        $tresc=$_POST["tresc"];

        if(empty($kto)|| empty($tresc)){
            echo "Wypełnij wszystkie pola";
        }else{
            $nazwa_serwera="localhost";
            $nazwa_uzytkownika="root";
            $haslo="";
            $nazwa_bazy_danych="nazwa_baza_danych";
            $connect = new mysqli($nazwa_serwera, $nazwa_uzytkownika, $haslo, $nazwa_bazy_danych);
            $odp = $connect->query("INSERT INTO nazwa_tabeli(kto, tresc) VALUES ('$kto',' $tresc')");
            $wynik= $connect->query("SELECT * FROM nazwa_tabeli");
            $connect->close();
        }
        }
        ?>

<!--  Kod PHP odpowiadający za zapisywanie danych w BazieDanych -->

        <?php
         $nazwa_serwera="localhost";
         $nazwa_uzytkownika="root";
         $haslo="";
         $nazwa_bazy_danych="nazwa_baza_danych";
        //Connect with mysql
        $con = mysqli_connect($nazwa_serwera,$nazwa_uzytkownika, $haslo);
        //Select Database
        mysqli_select_db($con,'nazwa_baza_danych');
        //SelectQuery
        $sql= "SELECT * FROM nazwa_tabeli";
        //Execute the query
       $records = mysqli_query($con, $sql);
       print(" <h1> Lista zakupów </h1>");
        print('<br>');
         print('<table class="highlight table table-dark centered">');
         print('<thead>') ;
            print('<tr>');
                print('<th scope="col">Nr</th>');
                 print('<th scope="col">Kto</th>');
                 print('<th scope="col">Treść zakupów</th>');
                 print('<th scope="col">Usuń</th>');
             print('</thead>');
         print('<tbody>');
         while($row = mysqli_fetch_array($records))
         {
             print('<tr>');
                 print('<th scope="row">'.$row['id'].'</th>');
                 print("<td>".$row['kto']."</td>");
                 print("<td>".$row['tresc']."</td>");
                 print('<td><button class="btn #e1f5fe light-blue lighten-5 ">'."<a href=delete.php?id=".$row['id'].">Usuń zadanie</a></button></td>");
            print('</tr>');
          }
         print('</tbody>');
     print('</table>');
   ?>

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
>