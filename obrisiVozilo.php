<?php

if(isset($_POST['obrisiVozilo'])){

    $idvozila=$_POST["idvozila"];


    $upit="DELETE FROM `vozilo` WHERE idvozila=$idvozila";

   $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");

    if ($rez = mysqli_query($konekcija, $upit)) {
        if($rez==1){
            echo "<script>location.replace('index.php?opcija=bazaKlijenata')</script>";
        }
        else{
            echo "Vozilo nije obrisano";
        }
    }
}