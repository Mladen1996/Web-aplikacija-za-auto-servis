<h1 class="text-center mt-3 mb-4">Baza klijenata</h1>
<div class="container">
    <form method="post" action="index.php?opcija=bazaKlijenata">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="sortiranje">Sortiraj po</label>
                <select id="sortiranje" name="sortiranje" class="form-control">
                    <option selected>Po imenu rastuće</option>
                    <option>Po imenu opadajuće</option>
                    <option>Po marci rastuće</option>
                    <option>Po marci opadajuće</option>
                </select>
            </div>
        <div class="form-group col-md-3">
            <label for="inputState">Nacin pretrage</label>
            <select id="inputState" name="Nacinpretrage" class="form-control">
                <option selected>Po imenu i prezimenu</option>
                <option>Po registraciji</option>
                <option>Po marci vozila</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="pretraga">Pretraga:</label>

            <input type="text" name="pretraga" class="form-control">
        </div>
        </div>

        <div class="text-center">
            <input type="submit" class="btn btn-lg btn-success my-2" name="dugme" value="Pretrazi">
        </div>
    </form>


<?php
if(!isset($_POST["pretraga"])){
    $query="SELECT korisnickoIme,klijenti.idklijenta,imePrezime,adresa,marka,model,godinaProizvodnje,RegistarskaOznaka 
	FROM `klijenti` LEFT JOIN `vozilo` on klijenti.idklijenta=vozilo.idklijenta ORDER BY imePrezime";
  $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");
   echo "<h5>Podaci o vozilu i vlasniku</h5>";
    echo "<table class=\"table mb-5\">
  <thead class=\"thead bg-info\">
    <tr>
        <th scope=\"col\">R.br</th>
      <th scope=\"col\">Ime i prezime</th>
      <th scope=\"col\">Adresa</th>
      <th scope=\"col\">Marka</th>
      <th scope=\"col\">Model</th>
      <th scope=\"col\">God. proizv.</th>
      <th scope=\"col\">Reg.Oznaka</th>
      <th scope=\"col\"></th>
    </tr>
  </thead>
  <tbody>";
    $brojac=0;
    if ($rez = mysqli_query($konekcija, $query)) {
        $brojZapisa = mysqli_num_rows($rez);
        while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {
            $_SESSION['idklijenta']=$red['idklijenta'];
            $korIme=$red['korisnickoIme'];
            $idklijenta=$_SESSION['idklijenta'];
            $brojac+=1;
            echo "<tr>
      <th scope=\"row\">$brojac</th>";
            if ($red['marka']==""){
                echo "<td>".$red['imePrezime']."</td>
        <td>".$red['adresa']."</td>
      <td>".$red['marka']."</td>
      <td>".$red['model']."</td>
      <td>".$red['godinaProizvodnje']."</td>
       <td>".$red['RegistarskaOznaka']."</td>
      <td><form method='post' action='index.php?opcija=dodajNovoVozilo'><input type='text' class='d-none' name='korIme' value='$korIme'> 
	  <input type='submit'  class='btn btn - lg btn - success my - 2 text - right' name='dodajVozila' value='Dodaj vozilo'></form></td>
    </tr>";  }
      else{echo "<td>".$red['imePrezime']."</td>
        <td>".$red['adresa']."</td>
      <td>".$red['marka']."</td>
      <td>".$red['model']."</td>
      <td>".$red['godinaProizvodnje']."</td>
      <td>".$red['RegistarskaOznaka']."</td>
      <td><form method='post' action='index.php?opcija=prikazVozila'><input type='text' class='d-none' name='idklijenta' value='$idklijenta'>
	  <input type='submit'  class='btn btn - lg btn - success my - 2 text - right' name='detalji' value='Više detalja'></form></td>
    </tr>";}



        }

        echo "</tbody></table>";

    }
}


if(isset($_POST["dugme"])){
    if($_POST["Nacinpretrage"]=="Po registraciji"){
        $pretraga=$_POST["pretraga"];
        $query="SELECT klijenti.idklijenta,korisnickoIme,imePrezime,adresa,marka,model,godinaProizvodnje,RegistarskaOznaka 
		FROM `klijenti` LEFT JOIN `vozilo` on klijenti.idklijenta=vozilo.idklijenta WHERE RegistarskaOznaka='$pretraga'";
    }
    elseif ($_POST["Nacinpretrage"]=="Po marci vozila"){
        $pretraga=$_POST["pretraga"];
        $query="SELECT klijenti.idklijenta,korisnickoIme,imePrezime,adresa,marka,model,godinaProizvodnje,RegistarskaOznaka 
		FROM `klijenti` LEFT JOIN `vozilo` on klijenti.idklijenta=vozilo.idklijenta WHERE marka='$pretraga'";
    }
    else{
        $pretraga=$_POST["pretraga"];
        $query="SELECT klijenti.idklijenta,korisnickoIme,imePrezime,adresa,marka,model,godinaProizvodnje,RegistarskaOznaka 
		FROM `klijenti` LEFT JOIN `vozilo` on klijenti.idklijenta=vozilo.idklijenta WHERE imePrezime='$pretraga'";
    }
    if($_POST["sortiranje"]=="Po imenu rastuće"){
        $query.=" ORDER BY imePrezime";
    }
    elseif ($_POST["sortiranje"]=="Po imenu opadajuće"){
        $query.=" ORDER BY imePrezime DESC";
    }
    elseif ($_POST["sortiranje"]=="Po marci rastuće"){
        $query.=" ORDER BY marka";
    }
    else{
        $query.=" ORDER BY marka DESC";
    }

	$konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");
    echo "<h5>Podaci o vozilu i vlasniku</h5>";
    echo "<table class=\"table\">
    
  <thead class=\"thead bg-info\">
    <tr>
        <th scope=\"col\">R.br</th>
      <th scope=\"col\">Ime i prezime</th>
      <th scope=\"col\">Adresa</th>
      <th scope=\"col\">Marka</th>
      <th scope=\"col\">Model</th>
      <th scope=\"col\">God. proizv.</th>
      <th scope=\"col\">Reg. Oznaka.</th>
      <th scope=\"col\"></th>
    </tr>
  </thead>
  <tbody>";
    $brojac=0;
    if ($rez = mysqli_query($konekcija, $query)) {
        $brojZapisa = mysqli_num_rows($rez);
        while ($red = mysqli_fetch_array($rez, MYSQLI_BOTH)) {

            $_SESSION['idklijenta']=$red['idklijenta'];
            $idklijenta=$_SESSION['idklijenta'];
            $korIme=$red['korisnickoIme'];
            $brojac+=1;
            if($red['marka']==""){
                echo "<tr>
      <th scope=\"row\">$brojac</th>
      <td>".$red['imePrezime']."</td>
      <td>".$red['adresa']."</td>
      <td>".$red['marka']."</td>
      <td>".$red['model']."</td>
      <td>".$red['godinaProizvodnje']."</td>
       <td>".$red['RegistarskaOznaka']."</td>
      <td><form method='post' action='index.php?opcija=dodajNovoVozilo'><input type='text' class='d-none' name='korIme' value='$korIme'> <input type='submit'  class='btn btn - lg btn - success my - 2 text - right' name='dodaj Vozila' value='Dodaj vozilo'></form></td>
      
    </tr>";
            }
            else {
                echo "<tr>
      <th scope=\"row\">$brojac</th>
      <td>" . $red['imePrezime'] . "</td>
      <td>" . $red['adresa'] . "</td>
      <td>" . $red['marka'] . "</td>
      <td>" . $red['model'] . "</td>
      <td>" . $red['godinaProizvodnje'] . "</td>
       <td>" . $red['RegistarskaOznaka'] . "</td>
      <td><form method='post' action='index.php?opcija=prikazVozila'><input type='text' class='d-none' name='idklijenta' value='$idklijenta'> <input type='submit'  class='btn btn - lg btn - success my - 2 text - right' name='detalji' value='Više detalja'></form></td>
      
    </tr>";
            }




        }



    }
    echo "</tbody></table>";
}


?>
</div>
