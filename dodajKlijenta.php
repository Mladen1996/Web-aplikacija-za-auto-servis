<?php
if(isset($_SESSION["greskaIme"])){
    if($_SESSION["greskaIme"]=="Morate uneti ime i prezime klijenta"){
        $_SESSION["greskaIme"]="Unesite ime i prezime klijenta";
    }
}
if(isset($_SESSION["greskaAdresa"])){
    if($_SESSION["greskaAdresa"]=="Morate uneti adresu klijenta"){
        $_SESSION["greskaAdresa"]="Unesite adresu klijenta";
    }
}
if(isset($_SESSION["greskaMesto"])){
    if($_SESSION["greskaMesto"]=="Morate uneti mesto stanovanja klijenta"){
        $_SESSION["greskaMesto"]="Unesite mesto stanovanja klijenta";
    }
}
if(isset($_SESSION["greskaTelefon"])){
    if($_SESSION["greskaTelefon"]=="Morate uneti telefon klijenta"){
        $_SESSION["greskaTelefon"]="Unesite broj telefona klijenta";
    }
}

if(isset($_SESSION["greskaEmail"])){
    if($_SESSION["greskaEmail"]=="Morate uneti email adresu klijenta"){
        $_SESSION["greskaEmail"]="email@primer.rs";
    }
}

if(isset($_SESSION["greskaKorIme"])){
    if($_SESSION["greskaKorIme"]=="Morate uneti korisnicko ime klijenta"){
        $_SESSION["greskaKorIme"]="Unesite korisnicko ime klijenta";
    }
}
if(isset($_SESSION["greskaLozinka"])){
    if($_SESSION["greskaLozinka"]=="Morate uneti lozinku klijenta"){
        $_SESSION["greskaLozinka"]="Unesite lozinku klijenta";
    }
}


if(isset($_POST["dodajKlijenta"])) {
    $greske = 0;
    if ($_POST["imeprezime"] == "") {
        $_SESSION["errorLogin"] = "";
        $_SESSION["greskaIme"] = "Morate uneti ime i prezime klijenta";
        $greske += 1;
    }
    else{
        $_SESSION["imeprezime"]=$_POST["imeprezime"];
    }
    if ($_POST["adresa"] == "") {
        $_SESSION["errorLogin"] = "";
        $_SESSION["greskaAdresa"] = "Morate uneti adresu klijenta";
        $greske += 1;
    }
    else{
        $_SESSION["adresa"]=$_POST["adresa"];
    }
    if ($_POST["mesto"] == "") {
        $_SESSION["errorLogin"] = "";
        $_SESSION["greskaMesto"] = "Morate uneti mesto stanovanja klijenta";
        $greske += 1;
    }
    else{
        $_SESSION["mesto"]=$_POST["mesto"];
    }

    if ($_POST["brojtelefona"] == "") {
        $_SESSION["errorLogin"] = "";
        $_SESSION["greskaTelefon"] = "Morate uneti telefon klijenta";
        $greske += 1;
    }
    else{
        $_SESSION["brojtelefona"]=$_POST["brojtelefona"];
    }

    if ($_POST["email"] == "") {
        $_SESSION["errorLogin"] = "";
        $_SESSION["greskaEmail"] = "Morate uneti email adresu klijenta";
        $greske += 1;
    }
    else{
        $_SESSION["email"]=$_POST["email"];
    }

    if ($_POST["korIme"] == "") {
        $_SESSION["errorLogin"] = "";
        $_SESSION["greskaKorIme"] = "Morate uneti korisnicko ime klijenta";
        $greske += 1;
    }
    if ($_POST["lozinka"] == "") {
        $_SESSION["errorLogin"] = "";
        $_SESSION["greskaLozinka"] = "Morate uneti lozinku klijenta";
        $greske += 1;
    }

    if ($greske == 0) {
        $provera=sacuvajKorisnika($_POST["korIme"],$_POST["lozinka"]);
        if($provera==true)
        {
            $_SESSION["errorLogin"]="";
            $proveraKlijenta=sacuvajKlijenta($_POST["imeprezime"],$_POST["adresa"],$_POST["mesto"],$_POST["brojtelefona"],$_POST["email"],$_POST["korIme"]);
            if($proveraKlijenta==true){
                $_SESSION["korIme"]=$_POST["korIme"];
                $_SESSION["imeprezime"]="";
                $_SESSION["adresa"]="";
                $_SESSION["mesto"]="";
                $_SESSION["brojtelefona"]="";
                $_SESSION["email"]="";
                echo "<script>location.replace('index.php?opcija=dodajNovoVozilo')</script>";
            }
            else{
                echo "Novi klijent nije sacuvan";
            }
        }
        else{
            $_SESSION["errorLogin"]="Korisnicko ime je zauzeto";

        }
    }
}

function sacuvajKorisnika($korisnickoIme,$lozinka){
    $upit="INSERT INTO `korisnici`(`korisnickoIme`, `lozinka`, `tipKorisnika`) VALUES ('$korisnickoIme','$lozinka','korisnik')";
    $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");

    if ($rez = mysqli_query($konekcija, $upit)) {


        if($rez==1){
            return true;
        }
        else{
            $_SESSION["errorLogin"]="Korisnicko ime je zauzeto";
            return false;
        }




    }
}

function sacuvajKlijenta($imeprezime,$adresa,$mesto,$brojtelefona,$email,$korisnickoIme){
    $upit="INSERT INTO `klijenti`(`imePrezime`, `adresa`, `mesto`, `brojtelefona`, `email`, `korisnickoIme`) VALUES ('$imeprezime','$adresa','$mesto','$brojtelefona','$email','$korisnickoIme')";

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
            <h1>Dodaj novog klijenta</h1>

            <p class="text-white text-danger"><?php  if(isset($_SESSION['errorLogin'])) {echo $_SESSION["errorLogin"];} ?></p>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form  method="post" action="index.php?opcija=dodajKlijenta">

                    <div class="form-group">
                        <label for="imeprezime">Ime i prezime</label>
                        <input type="text" name="imeprezime" class="form-control" placeholder="<?php  if(isset($_SESSION['greskaIme'])) {echo $_SESSION["greskaIme"];} else{echo 'Unesite ime i prezime klijenta';} ?>"
                        value="<?php if(isset($_SESSION["imeprezime"])){echo $_SESSION["imeprezime"];}?>">
                    </div>
                    <div class="form-group">
                        <label for="adresa">Adresa</label>
                        <input type="text" name="adresa" class="form-control" placeholder="<?php  if(isset($_SESSION['greskaAdresa'])) {echo $_SESSION["greskaAdresa"];} else{echo 'Unesite adresu klijenta';} ?>"
                               value="<?php if(isset($_SESSION["adresa"])){echo $_SESSION["adresa"];}?>">
                    </div>
                    <div class="form-group">
                        <label for="mesto">Mesto</label>
                        <input type="text" name="mesto" class="form-control" placeholder="<?php  if(isset($_SESSION['greskaMesto'])) {echo $_SESSION["greskaMesto"];} else{echo 'Unesite mesto stanovanja klijenta';} ?>"
                               value="<?php if(isset($_SESSION["mesto"])){echo $_SESSION["mesto"];}?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="brojtelefona">Broj telefona</label>
                        <input type="text" name="brojtelefona" class="form-control" placeholder="<?php  if(isset($_SESSION['greskaTelefon'])) {echo $_SESSION["greskaTelefon"];} else{echo 'Unesite broj telefona klijenta';} ?>"
                               value="<?php if(isset($_SESSION["brojtelefona"])){echo $_SESSION["brojtelefona"];}?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="email">Email adresa</label>
                        <input type="email"  name="email" class="form-control" placeholder="<?php  if(isset($_SESSION['greskaEmail'])) {echo $_SESSION["greskaEmail"];} else{echo 'email@primer.rs';} ?>"
                               value="<?php if(isset($_SESSION["email"])){echo $_SESSION["email"];}?>">
                    </div>

                    <div class="form-group">
                        <h3 >Podaci za logovanje klijenta</h3>
                        <label for="korIme">Korisničko ime</label>
                        <input type="text"  name="korIme" class="form-control" placeholder="<?php  if(isset($_SESSION['greskaKorIme'])) {echo $_SESSION["greskaKorIme"];} else{echo 'Unesite korisnicko ime klijenta';} ?>">
                    </div>
                    <div class="form-group">
                        <label for="lozinka">Lozinka</label>
                        <input type="password"  name="lozinka" class="form-control" placeholder="<?php  if(isset($_SESSION['greskaLozinka'])) {echo $_SESSION["greskaLozinka"];} else{echo 'Unesite lozinku klijenta';} ?>">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-success my-2" name="dodajKlijenta" >Pošalji</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>




