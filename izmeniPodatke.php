<h1 class="text-center">Izmeni podatke o klijentu</h1>
<?php

    echo "<div class=\"row mb-5\">
            <div class=\"col-md-6 offset-md-3\">
                <form  method=\"post\" action=\"index.php?opcija=izmeniPodatke\">";

    if(isset($_POST['idklijenta'])){
        $idklijenta=$_POST["idklijenta"];
        $_SESSION['IDklijenta']=$_POST['idklijenta'];
    }
    else{
        $idklijenta=$_SESSION['IDklijenta'];
    }
    $query = "SELECT imePrezime,adresa,mesto,brojtelefona,email FROM `klijenti` WHERE idklijenta='$idklijenta'";
   $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");
    if ($rez = mysqli_query($konekcija, $query)) {
        $brojZapisa = mysqli_num_rows($rez);

        while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {

            $imePrezime=$red['imePrezime'];
            $adresa=$red['adresa'];
            $mesto=$red['mesto'];
            $brojtelefona=$red['brojtelefona'];
            $email=$red['email'];
            echo " <div class=\"form-group\">
                        <label for=\"imeprezime\">Ime i prezime</label>
                        <input type=\"text\" name=\"imeprezime\" class=\"form-control\" value='$imePrezime'>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"adresa\">Adresa</label>
                        <input type=\"text\" name=\"adresa\" class=\"form-control\" value='$adresa'>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"mesto\">Mesto</label>
                        <input type=\"text\" name=\"mesto\" class=\"form-control\" value='$mesto' ></input>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"brojtelefona\">Broj telefona</label>
                        <input type=\"text\" name=\"brojtelefona\" class=\"form-control\" value='$brojtelefona'></input>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"email\">Email adresa</label>
                        <input type=\"email\"  name=\"email\" class=\"form-control\" value='$email'>
                    </div>";
            echo "<input type='submit'  class='btn btn - lg btn - success my - 2 text - right' name='sacuvajPodatke' value='Sačuvaj podatke'></form>";
            echo "</div></div></div>";
        }
    }


if(isset($_POST['sacuvajPodatke'])){

    $imePrezime=$_POST['imeprezime'];
    $adresa=$_POST['adresa'];
    $mesto=$_POST['mesto'];
    $brojtelefona=$_POST['brojtelefona'];
    $email=$_POST['email'];
    $idklijenta=$_SESSION['idklijenta'];

    $greske = 0;
    if ($_POST["imeprezime"] == "") {


        $greske += 1;
    }

    if ($_POST["adresa"] == "") {

        $greske += 1;
    }

    if ($_POST["mesto"] == "") {


        $greske += 1;
    }


    if ($_POST["brojtelefona"] == "") {


        $greske += 1;
    }


    if ($_POST["email"] == "") {

        $greske += 1;
    }

    if($greske==0){
        $upit="UPDATE `klijenti` SET `imePrezime`='$imePrezime',`adresa`='$adresa',`mesto`='$mesto',`brojtelefona`='$brojtelefona',`email`='$email' WHERE `idklijenta`=$idklijenta";

        $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


        if ($rez = mysqli_query($konekcija, $upit)) {


            if($rez==1){
                $_SESSION['IDklijenta']="";
                echo "<script>location.replace('index.php?opcija=prikazVozila')</script>";
            }
            else{
                echo "Podaci o klijentu nisu izmenjeni zbog greske";
            }



        }
    }





}