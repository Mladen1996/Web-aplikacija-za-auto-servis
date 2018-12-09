<div class="container">
    <h1 class="text-center">Dodaj novi servis</h1>
    <div class="row">
        <div class="col-md-12">
                <form method="post" action='index.php?opcija=dodajServis1'>
                    <div class="form-group">
                        <label for="nazivServisa">Naziv servisa</label>
                        <?php
                        if(isset($_SESSION['greskaNazivServisa'])){
                            $greskaNaziv=$_SESSION['greskaNazivServisa'];
                        }
                        if(isset($_SESSION['greskaOpisServisa'])){
                            $greskaOpis=$_SESSION['greskaOpisServisa'];
                        }

                        if(isset($_SESSION['nazivServisa1'])){
                            $nazivServisa1=$_SESSION['nazivServisa1'];
                        }


                        if(isset($_SESSION['opisServisa'])){
                            $opisServisa=$_SESSION['opisServisa'];
                        }





                    ?>
                        <input type="text" name="nazivServisa" class="form-control" placeholder=" <?php  if (isset($greskaNaziv)) {echo $greskaNaziv;} else{ echo 'Unesite naziv servisa';} ?>"  value="<?php if(isset($nazivServisa1)){echo $nazivServisa1;}?>">
                    </div>
                    <div class="form-group">
                        <label for="opisServisa">Opis servisa</label>
                        <textarea name="opisServisa" class="form-control" cols="30" rows="3" placeholder="<?php  if (isset($greskaOpis)) {echo $greskaOpis;} else{ echo 'Unesite opis servisa';} ?>"></textarea>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-lg btn-success my-2" name="sacuvajServis" value="Pošalji">
                    </div>
                </form>
            </div>
        </div>

</div>
