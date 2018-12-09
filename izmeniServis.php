<?php
echo "<h1 class='text-center'>Izmeni servis</h1>";
echo "<div class='container'>";


    echo " <div class=\"row\">
            <div class=\"col-md-12\">
                <form method=\"post\" action='index.php?opcija=izmeniServis'>";

    if(isset($_SESSION['IDservisa'])){
        $idservisa=$_SESSION['IDservisa'];
    }
    else{
        $idservisa=$_POST["idservisa"];
        $_SESSION['IDservisa']=$_POST['idservisa'];
    }
    $query="SELECT nazivServisa,opisServisa FROM `servis` WHERE idservisa='$idservisa'";
 $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");
    if ($rez = mysqli_query($konekcija, $query)) {
        $brojZapisa = mysqli_num_rows($rez);

        while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {
        $nazivServisa=$red["nazivServisa"];
        $opisServisa=$red["opisServisa"];
          if(isset($_SESSION['greskaNazivServisa'])){
                $greskaNaziv=$_SESSION['greskaNazivServisa'];
            }
            if(isset($_SESSION['greskaOpisServisa'])){
                $greskaOpis=$_SESSION['greskaOpisServisa'];
            }
                   echo "<div class=\"form-group\">
                        <label for=\"contactName\">Naziv servisa</label>
                        <input type=\"text\" name=\"nazivServisa\" class=\"form-control\" value='$nazivServisa' placeholder=\"Morate uneti naziv servisa\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"contactName\">Opis servisa *(obavezno polje)</label>
                       <textarea class=\"form-control\" name=\"opisServisa\" type='text' rows=\"3\">$opisServisa</textarea>
                    </div>
                    <div class=\"text-center\">
                        <input type=\"submit\" class=\"btn btn-lg btn-success my-2\" name=\"sacuvajServis\" value=\"Sačuvaj\">
                    </div>";

        }
             echo "   </form></div></div>";
}

echo "</div>";


if(isset($_POST["sacuvajServis"])){
    $greske=0;
    if($_POST['nazivServisa']==""){
        $greske+=1;
    }

    if($_POST['opisServisa']==""){
        $greske+=1;
    }
   if($greske==0){
    $idvozila=$_SESSION["idvozila"];
    $nazivServisa=$_POST["nazivServisa"];
    $opisServisa=$_POST["opisServisa"];
    $idServisa=vratiIdServisa($nazivServisa,$idvozila);
    $upit="UPDATE `servis` SET `nazivServisa`='$nazivServisa',`opisServisa`='$opisServisa' WHERE `idservisa`=$idServisa";

    $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


    if ($rez = mysqli_query($konekcija, $upit)) {


        if ($rez == 1) {
            echo "<script>location.replace('index.php?opcija=prikazVozila')</script>";
        } else {
            echo "Servis nije sacuvan";
        }


    }
    }
    else {
        echo "<script>location.replace('index.php?opcija=izmeniServis')</script>";
    }
}

function vratiIdServisa($nazivServisa,$idvozila){
    $upit="SELECT idservisa FROM `servis` WHERE nazivServisa='$nazivServisa' and idvozila=$idvozila";
    $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");
if ($rez = mysqli_query($konekcija, $upit)) {
    while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {
        return $red['idservisa'];
    }
}
}
?>

