<?php

if(isset($_POST['obrisiServis'])){
    $idservisa=$_POST["idservisa"];


    $upit="DELETE FROM `servis` WHERE idservisa=$idservisa";

    $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");

    if ($rez = mysqli_query($konekcija, $upit)) {
        if($rez==1){
            echo "<script>location.replace('index.php?opcija=prikazVozila')</script>";
        }
        else{
            echo "Servis nije obrisan";
        }
    }
}


