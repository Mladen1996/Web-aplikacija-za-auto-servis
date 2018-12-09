<div class="container">
    <h1 class="text-center mb-5 mt-3">Podaci</h1>
    <div class="row">
        <?php

        if(isset($_POST['detalji'])){
            $idKlijenta=ispisiKlijenta($_POST["idklijenta"]);
            $_SESSION['idklijenta']=$_POST['idklijenta'];
        }
        else{
            $idKlijenta=ispisiKlijenta($_SESSION["idklijenta"]);
        }
        $idVozila=ispisiVozilo($idKlijenta);
        $_SESSION["idvozila"]=$idVozila;
        echo "</div>";
        ispisiServise($idVozila);




        function ispisiKlijenta($idklijenta){
            $query="SELECT idklijenta,imePrezime,adresa,mesto,brojtelefona,email FROM `klijenti` WHERE idklijenta='$idklijenta'";
            $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


            if ($rez = mysqli_query($konekcija, $query)) {
                $brojZapisa = mysqli_num_rows($rez);
                while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {
                    echo "<div class='col-md-6 mb-5' >";
                    echo "<div class=\"card bg-info\" style=\"width:400px\">
  <div class=\"card-body\" style='height: 441px;'>
   
  ";
                    echo "<h3 class='card-title'>Podaci o klijentu:</h3>";
                    echo "<p class='lead card-text text-white mt-5'>Ime i prezime:".$red["imePrezime"]."</p>";
                    echo "<p class='lead card-text text-white'>Adresa:".$red["adresa"]."</p>";
                    echo "<p class='lead card-text text-white'>Mesto:".$red["mesto"]."</p>";
                    echo "<p class='lead card-text text-white'>Broj telefona:".$red["brojtelefona"]."</p>";
                    echo "<p class='lead card-text text-white mb-5'>Email:".$red["email"]."</p>";
                    $idKlijenta=$red['idklijenta'];
                    echo "<form class='d-inline' method='post' action='index.php?opcija=izmeniPodatke'><input type='text' class='d-none' name='idklijenta' value='$idKlijenta'><input type='submit'  class='btn btn - lg btn - success my - 2 text - right' name='izmeniPodatke' value='Izmeni podatke'></form>";
                    echo "</div></div></div>";
                    return $red["idklijenta"];
                }



            }


        }

        function ispisiVozilo($idKlijenta)
        {
            $query = "SELECT idvozila,idklijenta,marka,model,godinaProizvodnje,gorivo,ZapreminaMotora,SnagaMotora,RegistarskaOznaka FROM `vozilo` WHERE idklijenta='$idKlijenta'";
            $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


            if ($rez = mysqli_query($konekcija, $query)) {
                $brojZapisa = mysqli_num_rows($rez);
                if($brojZapisa==0){
                    echo "Klijent trenutno ne poseduje vozilo";
                }
                while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {
                    echo "<div class='col-md-6'>";
                    echo "<div class=\"card bg-info\" style=\"width:400px\">
  <div class=\"card-body\">
   
  ";
                    echo "<h3>Podaci o vašem vozilu:</h3>";
                    echo "<p class='lead text-white'>Marka: " . $red["marka"] . "</p>";
                    echo "<p class='lead text-white'>Model: " . $red["model"] . "</p>";
                    echo "<p class='lead text-white'>Godina proizvodnje: " . $red["godinaProizvodnje"] . "</p>";
                    echo "<p class='lead text-white'>Gorivo: " . $red["gorivo"] . "</p>";
                    echo "<p class='lead text-white'>Zapremina motora: " . $red["ZapreminaMotora"] . " cm3</p>";
                    echo "<p class='lead text-white'>Snaga motora: " . $red["SnagaMotora"] . " kw</p>";
                    echo "<p class='lead text-white'>Registarska oznaka: " . $red["RegistarskaOznaka"] . "</p>";
                    $idvozila=$red['idvozila'];
                    echo "<form class='d-inline mr-3' method='post' action='index.php?opcija=izmeniVozilo'><input type='text' class='d-none' name='idvozila' value='$idvozila'><input type='submit'  class='btn btn - lg btn - success my - 2 text - right' name='izmeniVozilo' value='Izmeni vozilo'></form>";
                    echo "<form class='d-inline' method='post' action='index.php?opcija=obrisiVozilo'><input type='text' class='d-none' name='idvozila' value='$idvozila'><input type='submit'  class='btn btn - lg btn - success my - 2 text - right' name='obrisiVozilo' value='Obriši vozilo'></form>";
                    echo "</div></div></div>";

                    return $red["idvozila"];
                }
            }}

            function ispisiServise($idVozila)
            {
                $query = "SELECT idservisa,nazivServisa,OpisServisa,datum FROM `servis` WHERE idvozila='$idVozila'";
               $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


                if ($rez = mysqli_query($konekcija, $query)) {
                    $brojZapisa = mysqli_num_rows($rez);
                    echo "<div class='row'>";
                    echo "<h3 class='mb-4'>Podaci o izvršenim servisima:</h3>";
                    echo " <form class='mb-3 ml-5' method='post' action='index.php?opcija=dodajServis'><input type='submit'  class='btn btn - lg btn - success my - 2 text - right' name='dodajServis' value='Dodaj servis'></form></div>";
                    while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {
                        echo "<div class='col-md-12 mb-3'>";
                        echo "<div class=\"card\">
  <div class=\"card-body\">
    <h4 class=\"card-title\"><p class='lead'>Vrsta servisa:" . $red["nazivServisa"] . "</p></h4>
    <p class=\"card-text\"><p>Datum:" . $red["datum"] . "</p><p>Opis servisa:" . $red["OpisServisa"] . "</p></p>";
                        $idservisa=$red['idservisa'];
    echo "<form class='d-inline mr-3' method='post' action='index.php?opcija=izmeniServis'><input type='text' class='d-none' name='idservisa' value='$idservisa'><input type='submit'  class='btn btn - lg btn - success my - 2 text - right' name='izmeniServis' value='Izmeni servis'></form>";
    echo "<form class='d-inline' method='post' action='index.php?opcija=obrisiServis'><input type='text' class='d-none' name='idservisa' value='$idservisa'><input type='submit'  class='btn btn - lg btn - success my - 2 text - right' name='obrisiServis' value='Obriši servis'></form>";
   echo "</div></div></div>";




                    }


                }
            }


    echo " </div></div>";
        ?>



