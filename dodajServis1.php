<?php
if(isset($_SESSION["greskaNazivServisa"])){
    if($_SESSION["greskaNazivServisa"]=="Morate uneti naziv servisa"){
        $_SESSION["greskaNazivServisa"]="Unesite naziv servisa";
    }
}
if(isset($_SESSION["greskaOpisServisa"])){
    if($_SESSION["greskaOpisServisa"]=="Morate uneti opis servisa"){
        $_SESSION["greskaOpisServisa"]="Unesite opis servisa";
    }
}
if(isset($_POST["sacuvajServis"])){
    $greske=0;
    if($_POST['nazivServisa']==""){
        $_SESSION['greskaNazivServisa']="Morate uneti naziv servisa";
        $greske+=1;
    }
    else {
        $_SESSION['nazivServisa1']=$_POST['nazivServisa'];
    }
    if($_POST['opisServisa']==""){
        $_SESSION['greskaOpisServisa']="Morate uneti opis servisa";
        $greske+=1;
    }
    else {
        $_SESSION['opisServisa']=$_POST['opisServisa'];
    }
    if($greske==0){
        $idvozila=$_SESSION["idvozila"];
        $nazivServisa=$_POST["nazivServisa"];
        $opisServisa=$_POST["opisServisa"];
        $upit="INSERT INTO `servis`(`nazivServisa`, `OpisServisa`, `idvozila`) VALUES ('$nazivServisa','$opisServisa','$idvozila')";

        $konekcija = mysqli_connect("localhost", "id8168453_admin", "admin", "id8168453_autoservis");


        if ($rez = mysqli_query($konekcija, $upit)) {


            if($rez==1){
                echo "<script>location.replace('index.php?opcija=prikazVozila')</script>";
            }
            else{
                echo "Servis nije sacuvan";
            }



        }
    }
    else {
        echo "<script>location.replace('index.php?opcija=dodajServis')</script>";
    }

}
?>