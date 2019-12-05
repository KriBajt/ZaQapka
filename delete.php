<?php
         $nazwa_serwera="sql.s25.vdl.pl";
         $nazwa_uzytkownika="aipoz_apka";
         $haslo="T%))j_932%DO27b";
         $nazwa_bazy_danych="aipoz_apka";


        //Connect with mysql
        $con = mysqli_connect($nazwa_serwera,$nazwa_uzytkownika, $haslo);
        //Select Database
        mysqli_select_db($con,'aipoz_apka');
        //SelectQuery
        $sql= "DELETE FROM trello WHERE id='$_GET[id]'";

        //Execute the query
       if(mysqli_query($con, $sql))
           header("refresh:1; url=success.php");
         else
           echo "Nie udało sie usunć zadania";
       ;



       ?>