<?php


if(isset($_SESSION["errorName"])){
    if($_SESSION["errorName"]=="Morate uneti korisnicko ime"){
        $_SESSION["errorName"]="Vase ime";
    }
}
if(isset($_SESSION["errorpassword"])){
    if($_SESSION["errorpassword"]=="Morate uneti lozinku"){
        $_SESSION["errorpassword"]="Vasa lozinka";
    }
}

if(isset($_POST["dugme"])) {

    $greske=0;
    if($_POST["contactName"]=="") {
        $_SESSION["errorLogin"]="";
        $_SESSION["errorName"] = "Morate uneti korisnicko ime";
        $greske += 1;
    }
    if($_POST["password"]==""){
        $_SESSION["errorLogin"]="";
        $_SESSION["errorpassword"]="Morate uneti lozinku";
        $greske+=1;
    }

    if($greske==0){
        $proveraPodataka=proveriPodatke($_POST["contactName"],$_POST["password"]);
        if($proveraPodataka==true){
            if($_SESSION["tipKorisnika"]=="serviser"){
                $_SESSION["navigacijaServiser"]=true;
                echo" <script> location.replace('index.php'); </script>";
            }
            else{
                $_SESSION["navigacijaKlijent"]=true;
                echo" <script> location.replace('index.php'); </script>";

            }
        }
        else{
            $_SESSION["errorLogin"]="Uneli ste pogresno korisnicko ime ili lozinku";
            echo" <script> location.replace('index.php?opcija=logovanjeServisera); </script>";
        }
	}
}

function proveriPodatke($korisnickoIme,$lozinka){
    $query="SELECT korisnickoIme,tipKorisnika FROM `korisnici` WHERE korisnickoIme='$korisnickoIme' and lozinka='$lozinka'";
    $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


    if ($rez = mysqli_query($konekcija, $query)) {
        $brojZapisa = mysqli_num_rows($rez);
        while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {

            if($brojZapisa==1){
                $_SESSION["korisnickoIme"]=$red["korisnickoIme"];
                $_SESSION["tipKorisnika"]=$red["tipKorisnika"];
                return true;
            }
            else{
                return false;
            }
        }
    }
}


?>


<section id="logovanje" class="pb-5">
    <div class="container d-flex flex-column justify-content-center">
        <div class="text-center mb-5 mt-4">

            <h1 class="text-white">Prijavi se</h1>

            <h1 class="lead text-white">Imaćete priliku da pogledate istoriju servisiranja vašeg vozila u našem servisu.</h1>
            <h5 class="lead font-italic text-danger font-weight-bold">* Korisničko ime i šifra se dobijaju prilikom prve posete našem servisu.</h5>
            <p class="text-white text-danger"><?php  if(isset($_SESSION['errorLogin'])) {echo $_SESSION["errorLogin"];} ?></p>

        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post" action="index.php?opcija=logovanjeServisera">
                    <div class="form-group">
                        <label for="contactName" class="text-white">Korisničko ime</label>
                        <input type="text" name="contactName" class="form-control" placeholder="<?php  if(isset($_SESSION['errorName'])) 
						{echo $_SESSION["errorName"];} else{echo 'Vase ime';} ?>">
                    </div>
                    <div class="form-group">
                        <label for="contactName" class="text-white">Lozinka</label>
                        <input type="password" name="password" class="form-control" placeholder="<?php  if(isset($_SESSION['errorpassword']))
							{echo $_SESSION["errorpassword"];} else{echo 'Vasa lozinka';} ?>">
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-lg btn-success my-2" name="dugme" value="Prijavi se">
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

