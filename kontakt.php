<?php
if(isset($_SESSION["greskaemail"])){
    if($_SESSION["greskaemail"]=="Morate uneti email adresu u formatu email@primer.rs"){
        $_SESSION["email"]="Unesite email adresu u formatu email@primer.rs";
    }
}
if(isset($_SESSION["greskaime"])){
    if($_SESSION["greskaime"]=="Morate uneti vaše ime"){
        $_SESSION["greskaime"]="Unesite vaše ime";
    }
}
if(isset($_SESSION["greskanaslov"])){
    if($_SESSION["greskanaslov"]=="Morate uneti naslov poruke"){
        $_SESSION["greskanaslov"]="Unesite vaš naslov poruke";
    }
}
if(isset($_SESSION["greskaporuka"])){
    if($_SESSION["greskaporuka"]=="Morate uneti sadržaj poruke"){
        $_SESSION["greskaporuka"]="Unesite vaš sadržaj poruke";
    }
}

if(isset($_POST['dugmeKontakt'])){
    $greske=0;
    if($_POST['email']==""){
        $_SESSION['greskaemail']="Morate uneti email adresu u formatu email@primer.rs";
        $greske++;
    }
    else{
        $_SESSION["email"]=$_POST["email"];
    }
    if($_POST['ime']==""){
        $_SESSION['greskaime']="Morate uneti vaše ime";
        $greske++;
    }
    else{
        $_SESSION["ime"]=$_POST["ime"];
    }
    if($_POST['naslov']==""){
        $_SESSION['greskanaslov']="Morate uneti naslov poruke";
        $greske++;
    }
    else{
        $_SESSION["naslov"]=$_POST["naslov"];
    }
    if($_POST['poruka']==""){
        $_SESSION['greskaporuka']="Morate uneti sadržaj poruke";
        $greske++;
    }
    else{
        $_SESSION["poruka"]=$_POST["poruka"];
    }
    if($greske==0){
        $_SESSION["email"]="";
        $_SESSION["ime"]="";
        $_SESSION["naslov"]="";
        $_SESSION["poruka"]="";

        echo "<script>alert('Uspesno poslata poruka.')</script>";
    }

}
?>

<head>
    <title>Auto Servis | Kontakt</title>
</head>
<div class="jumbotron jumbotron-fluid" id="jumbotronKontakt">
    <div class="container text-dark text-center">

        <h1 class="display-3 text-uppercase">Kontakt</h1>
    </div>
</div>
<div class="container mb-4">

    <div class="row">

        <div class="col-12 col-md-4">

            <i class="fas fa-map-marker-alt pt-3"></i><span class="pl-2">Vojvode Stepe bb,Vozdovac</span><br>
            <i class="fas fa-envelope"></i><span class="pl-2">info@autoservismladen.com</span></br>
            <i class="fas fa-phone"></i><span class="pl-2">+381 011 123 4567</span></br>
            <i class="fas fa-clock"></i><span class="pl-2">Radno vreme:</span><p class="mb-1 pl-4">Radnim danima:08:00-22:00</p><p class="pl-4">Subotom: 08:00-16:00</p>



        </div>
        <div class="col-12 col-md-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11330.453012488197!2d20.480016!3d44.7683016!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd12e2aad5590e385!2z0JLQuNGB0L7QutCwINGI0LrQvtC70LAg0LXQu9C10LrRgtGA0L7RgtC10YXQvdC40LrQtSDQuCDRgNCw0YfRg9C90LDRgNGB0YLQstCwINGB0YLRgNGD0LrQvtCy0L3QuNGFINGB0YLRg9C00LjRmNCw!5e0!3m2!1ssr!2srs!4v1535895909986" width="100%" height="450" frameborder="0" style="border:0;margin:0; " allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="container-fluid" >
    <div class="row">
        <div class="col-12">

        </div>
    </div>
</div>
<section id="contact-colab" class="pb-5">
    <div class="container d-flex flex-column justify-content-center">
        <div class="text-center mb-5 mt-4">
            <h1 class="lead">Imate pitanje, kritiku ili sugestiju?</h1>
            <h1>Pošaljite nam poruku!</h1>


        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form  method="post" action="index.php?opcija=kontakt">
                    <div class="form-group">
                        <label for="email">Email adresa</label>
                        <input type="email"  name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  placeholder="<?php  if(isset($_SESSION['greskaemail'])) {echo $_SESSION["greskaemail"];} else{echo 'Unesite email adresu u formatu email@primer.rs';} ?>"
                               value="<?php if(isset($_SESSION["email"])){echo $_SESSION["email"];}?>">
                    </div>
                    <div class="form-group">
                        <label for="ime">Ime</label>
                        <input type="text" name="ime" class="form-control" placeholder="<?php  if(isset($_SESSION['greskaime'])) {echo $_SESSION["greskaime"];} else{echo 'Unesite vaše ime';} ?>"
                               value="<?php if(isset($_SESSION["ime"])){echo $_SESSION["ime"];}?>">
                    </div>
                    <div class="form-group">
                        <label for="naslov">Naslov poruke</label>
                        <input type="text" name="naslov" class="form-control" placeholder="<?php  if(isset($_SESSION['greskanaslov'])) {echo $_SESSION["greskanaslov"];} else{echo 'Unesite vaš naslov poruke';} ?>"
                               value="<?php if(isset($_SESSION["naslov"])){echo $_SESSION["naslov"];}?>">
                    </div>
                    <div class="form-group">
                        <label for="poruka">Poruka</label>
                        <textarea type="text" name="poruka" class="form-control" placeholder="<?php  if(isset($_SESSION['greskaporuka'])) {echo $_SESSION["greskaporuka"];} else{echo 'Unesite vaš sadržaj poruke';} ?>" rows="4"><?php if(isset($_SESSION["poruka"])){echo $_SESSION["poruka"];}?></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-success my-2" name="dugmeKontakt" >Pošalji</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>