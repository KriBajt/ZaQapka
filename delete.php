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
        $sql= "DELETE FROM nazwa_tabeli WHERE id='$_GET[id]'";

        //Execute the query
       if(mysqli_query($con, $sql))
           header("refresh:1; url=success.php");
         else
           echo "Nie udało sie usunć zadania";
       ;

       ?>