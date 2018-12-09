<div class="container">
<h1 class="text-center mb-5 mt-3">Istorija servisiranja</h1>
    <div class="row">
<?php

$idKlijenta=ispisiKlijenta($_SESSION["korisnickoIme"]);
$idVozila=ispisiVozilo($idKlijenta);
ispisiServise($idVozila);


echo "</div>";

function ispisiKlijenta($korisnickoIme){
    $query="SELECT idklijenta,imePrezime,adresa,mesto,brojtelefona,email FROM `klijenti` WHERE korisnickoIme='$korisnickoIme'";
    $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


    if ($rez = mysqli_query($konekcija, $query)) {
        $brojZapisa = mysqli_num_rows($rez);
        while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {
            echo "<div class='col-md-6'>";
                echo "<h3>Vaši podaci:</h3>";
               echo "<p class='lead'>Ime i prezime:".$red["imePrezime"]."</p>";
               echo "<p class='lead'>Adresa:".$red["adresa"]."</p>";
               echo "<p class='lead'>Mesto:".$red["mesto"]."</p>";
               echo "<p class='lead'>Broj telefona:".$red["brojtelefona"]."</p>";
               echo "<p class='lead'>Email:".$red["email"]."</p>";
                echo "</div>";
            return $red["idklijenta"];
        }
    }
}

function ispisiVozilo($idKlijenta){
    $query="SELECT idklijenta,marka,model,godinaProizvodnje,gorivo,ZapreminaMotora,SnagaMotora,RegistarskaOznaka 
	FROM `vozilo` WHERE idklijenta='$idKlijenta'";
    $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");

    if ($rez = mysqli_query($konekcija, $query)) {
        $brojZapisa = mysqli_num_rows($rez);
        while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {
            echo "<div class='col-md-6'>";
            echo "<h3>Podaci o vašem vozilu:</h3>";
            echo "<p class='lead'>Marka: ".$red["marka"]."</p>";
            echo "<p class='lead'>Model: ".$red["model"]."</p>";
            echo "<p class='lead'>Godina proizvodnje: ".$red["godinaProizvodnje"]."</p>";
            echo "<p class='lead'>Gorivo: ".$red["gorivo"]."</p>";
            echo "<p class='lead'>Zapremina motora: ".$red["ZapreminaMotora"]." cm3</p>";
            echo "<p class='lead'>Snaga motora: ".$red["SnagaMotora"]." kw</p>";
            echo "<p class='lead'>Registarska oznaka: ".$red["RegistarskaOznaka"]."</p>";
            echo "</div>";
            return $red["idklijenta"];
        }

    }
}
function ispisiServise($idVozila){
    $query = "SELECT nazivServisa,OpisServisa,datum FROM `servis` WHERE idvozila='$idVozila'";
    $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


    if ($rez = mysqli_query($konekcija, $query)) {
        $brojZapisa = mysqli_num_rows($rez);

        echo "<h3 class='mb-4'>Podaci o izvršenim servisima:</h3>";

        while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {
            echo "<div class='col-md-12 mb-3'>";
            echo "<div class=\"card\">
  <div class=\"card-body\">
    <h4 class=\"card-title\"><p class='lead'>Vrsta servisa:" . $red["nazivServisa"] . "</p></h4>
    <p class=\"card-text\"><p>Datum:" . $red["datum"] . "</p><p>Opis servisa:" . $red["OpisServisa"] . "</p></p>";
            $nazivServisa=$red['nazivServisa'];

            echo "</div></div></div>";

        }
       echo " </div>";

    }
}

?>

