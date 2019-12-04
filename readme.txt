Należy podmienić dane:
$nazwa_serwera="";
$nazwa_uzytkownika="";
$haslo="";
$nazwa_bazy_danych="";

Oraz nazwa_tabeli, kolumna2, kolumna3

$odp = $connect->query("INSERT INTO nazwa_tabeli(kolumna2, kolumna3) VALUES ('$kto',' $tresc')");
$wynik= $connect->query("SELECT * FROM nazwa_tabeli");
