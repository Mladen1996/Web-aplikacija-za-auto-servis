<?php
echo "<h1 class='text-center'>Izmeni vozilo</h1>";
echo "<div class='container mb-5'>";
    echo " <div class=\"row\">
            <div class=\"col-md-6 offset-3\">
                <form method=\"post\" action='index.php?opcija=izmeniVozilo'>";


    if(isset($_SESSION['IDvozila'])){
        $idvozila=$_SESSION['IDvozila'];
    }
    else{
        $idvozila=$_POST["idvozila"];
        $_SESSION['IDvozila']=$_POST['idvozila'];
    }

    $query="SELECT marka,model,godinaProizvodnje,gorivo,ZapreminaMotora,SnagaMotora,RegistarskaOznaka FROM `vozilo` WHERE idvozila='$idvozila'";
   $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");
    if ($rez = mysqli_query($konekcija, $query)) {
        $brojZapisa = mysqli_num_rows($rez);

        while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {
            $marka=$red['marka'];
            $model=$red['model'];
            $godinaProizvodnje=$red['godinaProizvodnje'];
            $gorivo=$red['gorivo'];
            $zapremina=$red['ZapreminaMotora'];
            $snaga=$red['SnagaMotora'];
            $registracija=$red['RegistarskaOznaka'];

            echo "<div class=\"form-group\">
                        <label for=\"marka\">Marka</label>
                        <input type=\"text\" name=\"marka\" class=\"form-control\" value='$marka' placeholder='Morate uneti marku vozila'>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"model\">Model</label>
                        <input type=\"text\" name=\"model\" class=\"form-control\" value='$model' placeholder='Morate uneti model vozila'>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"godinaProizvodnje\">Godina proizvodnje</label>
                        <input type=\"text\" name=\"godinaProizvodnje\" class=\"form-control\" value='$godinaProizvodnje' placeholder='Morate uneti godinu proizvodnje vozila'>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"gorivo\">Gorivo</label>
                        <input type=\"text\" name=\"gorivo\" class=\"form-control\" value='$gorivo' placeholder='Morate uneti vrstu goriva koje vozilo koristi'>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"zapremina\">Zapremina motora</label>
                        <input type=\"text\"  name=\"zapremina\" class=\"form-control\" value='$zapremina' placeholder='Morate uneti zapreminu motora'>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"snaga\">Snaga motora</label>
                        <input type=\"text\"  name=\"snaga\" class=\"form-control\" value='$snaga' placeholder='Morate uneti snagu motora'>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"registracija\">Registarska oznaka</label>
                        <input type=\"text\"  name=\"registracija\" class=\"form-control\" value='$registracija' placeholder='Morate uneti registarsku oznaku vozila'>
                    </div>

                    <div class=\"text-center\">
                        <button type=\"submit\" class=\"btn btn-lg btn-success my-2\" name=\"SacuvajVozilo\" >Sačuvaj</button>
                    </div>
                </form>
            </div>
        </div>";
        }
    }

echo "</div>";

if(isset($_POST['SacuvajVozilo'])){
    $marka=$_POST['marka'];
    $model=$_POST['model'];
    $godinaProizvodnje=$_POST['godinaProizvodnje'];
    $gorivo=$_POST['gorivo'];
    $zapremina=$_POST['zapremina'];
    $snaga=$_POST['snaga'];
    $registracija=$_POST['registracija'];
    $idvozila=$_SESSION["idvozila"];

    $greske=0;
    if($_POST["marka"]=="") {

        $greske += 1;
    }
    if($_POST["model"]==""){

        $greske+=1;
    }
    if($_POST["godinaProizvodnje"]==""){

        $greske+=1;
    }
    if($_POST["gorivo"]==""){

        $greske+=1;
    }
    if($_POST["zapremina"]==""){

        $greske+=1;
    }
    if($_POST["snaga"]==""){

        $greske+=1;
    }
    if($_POST["registracija"]==""){
        $greske+=1;
    }

    if($greske==0){
        $upit="UPDATE `vozilo` SET `marka`='$marka',`model`='$model',`godinaProizvodnje`='$godinaProizvodnje',`gorivo`='$gorivo',`ZapreminaMotora`='$zapremina',`SnagaMotora`='$snaga',`RegistarskaOznaka`='$registracija' WHERE `idvozila`=$idvozila";

        $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


        if ($rez = mysqli_query($konekcija, $upit)) {


            if($rez==1){
                echo "<script>location.replace('index.php?opcija=prikazVozila')</script>";
            }
            else{
                echo "Vozilo nije sacuvano";
            }



        }
    }
    else{
        echo "<script>location.replace('index.php?opcija=izmeniVozilo')</script>";
    }



}