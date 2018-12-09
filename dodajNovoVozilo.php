<?php



if(isset($_SESSION["greskaMarka"])){
    if($_SESSION["greskaMarka"]=="Morate uneti marku vozila"){
        $_SESSION["greskaMarka"]="Unesite marku vozila klijenta";
    }
}
if(isset($_SESSION["greskaModel"])){
    if($_SESSION["greskaModel"]=="Morate uneti model vozila"){
        $_SESSION["greskaModel"]="Unesite model vozila klijenta";
    }
}
if(isset($_SESSION["greskaGodina"])){
    if($_SESSION["greskaGodina"]=="Morate uneti godinu proizvodnje vozila"){
        $_SESSION["greskaGodina"]="Unesite godinu proizvodnje vozila klijenta";
    }
}
if(isset($_SESSION["greskaGorivo"])){
    if($_SESSION["greskaGorivo"]=="Morate uneti vrstu goriva koje koristi vozilo"){
        $_SESSION["greskaGorivo"]="Unesite vrstu goriva koje vozilo klijenta koristi";
    }
}
if(isset($_SESSION["greskaZapremina"])){
    if($_SESSION["greskaZapremina"]=="Morate uneti zapreminu motora vozila"){
        $_SESSION["greskaZapremina"]="Unesite zapreminu motora vozila klijenta";
    }
}
if(isset($_SESSION["greskaSnaga"])){
    if($_SESSION["greskaSnaga"]=="Morate uneti snagu motora vozila"){
        $_SESSION["greskaSnaga"]="Unesite snagu motora vozila klijenta";
    }
}

if(isset($_SESSION["greskaRegistracija"])){
    if($_SESSION["greskaRegistracija"]=="Morate uneti registracijsku oznaku vozila"){
        $_SESSION["greskaRegistracija"]="Unesite registracionu oznaku vozila klijenta";
    }
}


    if(isset($_POST["dodajVozilo"])){
        $greske=0;
        if($_POST["marka"]=="") {

            $_SESSION["greskaMarka"] ="Morate uneti marku vozila";
            $greske += 1;
        }
        if($_POST["model"]==""){
            $_SESSION["greskaModel"]="Morate uneti model vozila";
            $greske+=1;
        }
        if($_POST["godinaProizvodnje"]==""){
            $_SESSION["greskaGodina"]="Morate uneti godinu proizvodnje vozila";
            $greske+=1;
        }
        if($_POST["gorivo"]==""){
            $_SESSION["greskaGorivo"]="Morate uneti vrstu goriva koje koristi vozilo";
            $greske+=1;
        }
        if($_POST["zapremina"]==""){
            $_SESSION["greskaZapremina"]="Morate uneti zapreminu motora vozila";
            $greske+=1;
        }
        if($_POST["snaga"]==""){
            $_SESSION["greskaSnaga"]="Morate uneti snagu motora vozila";
            $greske+=1;
        }
        if($_POST["registracija"]==""){
            $_SESSION["greskaRegistracija"]="Morate uneti registracijsku oznaku vozila";
            $greske+=1;
        }

        if($greske==0){
			$provera=sacuvajVozilo($_POST["marka"],$_POST["model"],$_POST["gorivo"],$_POST["godinaProizvodnje"],
			$_POST["zapremina"],$_POST["snaga"],$_POST["registracija"]);
            if($provera==true){
                echo "<script>location.replace('index.php?opcija=bazaKlijenata')</script>";
            }
            else{
                echo "Neuspesno dodato vozilo";
            }
        }

    }
    function sacuvajVozilo($marka,$model,$gorivo,$godinaProizvodnje,$snagaMotora,$zapreminaMotora,$registracija){
        $idklijenta=$_SESSION["idklijenta"];
        $upit="INSERT INTO `vozilo`(`marka`, `model`, `gorivo`, `godinaProizvodnje`, `SnagaMotora`, `ZapreminaMotora`,`RegistarskaOznaka`,`idKlijenta`) 
		VALUES ('$marka','$model','$gorivo','$godinaProizvodnje','$snagaMotora','$zapreminaMotora','$registracija','$idklijenta')";

       $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


        if ($rez = mysqli_query($konekcija, $upit)) {


            if($rez==1){
                return true;
            }
            else{
                return false;
            }
        }
    }


?>
<section id="contact-colab1" class="pb-5">
    <div class="container d-flex flex-column justify-content-center">
        <div class="text-center mb-5 mt-4">
            <h1>Dodaj novo vozilo</h1>
            <?php
            if(isset($_POST['korIme'])){
                $korImeKlijenta=$_POST["korIme"];
                $_SESSION['korIme']=$korImeKlijenta;

                           }
            else{
                $korImeKlijenta=$_SESSION["korIme"];
            }


            $query="SELECT idklijenta,imeprezime,adresa,mesto,brojtelefona,email FROM `klijenti` WHERE korisnickoIme='$korImeKlijenta' ";
            $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


            if ($rez = mysqli_query($konekcija, $query)) {
                $brojZapisa = mysqli_num_rows($rez);
                while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {


                    echo "<h3>Podaci o vlasniku:</h3>";
                    echo "<p class='lead'>Ime i prezime:".$red["imeprezime"]."</p>";
                    echo "<p class='lead'>Adresa:".$red["adresa"]."</p>";
                    echo "<p class='lead'>Mesto:".$red["mesto"]."</p>";
                    echo "<p class='lead'>Broj telefona:".$red["brojtelefona"]."</p>";
                    echo "<p class='lead'>Email:".$red["email"]."</p>";

                    $_SESSION["idklijenta"]=$red["idklijenta"];

                }



            }

            ?>

        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form  method="post" action="index.php?opcija=dodajNovoVozilo">

                    <div class="form-group">
                        <label for="imeprezime">Marka</label>
                        <input type="text" name="marka" class="form-control" placeholder="<?php  if(isset($_SESSION['greskaMarka'])) {echo $_SESSION["greskaMarka"];} else{echo 'Unesite marku vozila klijenta';} ?>">
                    </div>
                    <div class="form-group">
                        <label for="adresa">Model</label>
                        <input type="text" name="model" class="form-control" placeholder="<?php  if(isset($_SESSION['greskaModel'])) {echo $_SESSION["greskaModel"];} else{echo 'Unesite model vozila klijenta';} ?>">
                    </div>
                    <div class="form-group">
                        <label for="mesto">Godina proizvodnje</label>
                        <input type="text" name="godinaProizvodnje" class="form-control"  placeholder="<?php  if(isset($_SESSION['greskaGodina'])) {echo $_SESSION["greskaGodina"];} else{echo 'Unesite godinu proizvodnje vozila klijenta';} ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="brojtelefona">Gorivo</label>
                        <input type="text" name="gorivo" class="form-control"  placeholder="<?php  if(isset($_SESSION['greskaGorivo'])) {echo $_SESSION["greskaGorivo"];} else{echo 'Unesite vrstu goriva koje vozilo klijenta koristi';} ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="email">Zapremina motora</label>
                        <input type="text"  name="zapremina" class="form-control"  placeholder="<?php  if(isset($_SESSION['greskaZapremina'])) {echo $_SESSION["greskaZapremina"];} else{echo 'Unesite zapreminu motora vozila klijenta';} ?>">
                    </div>

                    <div class="form-group">
                        <label for="korIme">Snaga motora</label>
                        <input type="text"  name="snaga" class="form-control"  placeholder="<?php  if(isset($_SESSION['greskaSnaga'])) {echo $_SESSION["greskaSnaga"];} else{echo 'Unesite snagu motora vozila klijenta';} ?>">
                    </div>
                    <div class="form-group">
                        <label for="lozinka">Registarska oznaka</label>
                        <input type="text"  name="registracija" class="form-control"  placeholder="<?php  if(isset($_SESSION['greskaRegistracija'])) {echo $_SESSION["greskaRegistracija"];} else{echo 'Unesite registracionu oznaku vozila klijenta';} ?>">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-success my-2" name="dodajVozilo" >Pošalji</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

