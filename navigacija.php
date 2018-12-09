<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand text-white" href="index.html" id="meni">Meni</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fas fa-bars text-white"></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Početna <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?opcija=onama">O nama</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usluge
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?opcija=autoservis">Auto servis</a>
                    <a class="dropdown-item" href="index.php?opcija=limarija">Limarija i farbanje/lakiranje</a>
                    <a class="dropdown-item" href="index.php?opcija=perionica">Perionica</a>
                    <a class="dropdown-item" href="index.php?opcija=vulkanizer">Vulkanizer</a>
                </div>
            </li>
            <?php if(isset($_SESSION["navigacijaServiser"])){
                echo " <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    Serviser
                </a>
                <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                    <a class=\"dropdown-item\" href=\"index.php?opcija=bazaKlijenata\">Baza klijenata</a>
                    <a class=\"dropdown-item\" href=\"index.php?opcija=dodajKlijenta\">Dodaj klijenta</a>
                </div>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?opcija=kontakt\">Kontakt</a>
            </li>
            </ul>
            <form class=\"form-inline my-2 my-lg-0\">
            <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\"><a href=\"index.php?opcija=logout\">Odjavi se</a></button>
        </form>";
            }            else if(isset($_SESSION["navigacijaKlijent"])){
                echo "<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?opcija=istorijaServisiranja\">Istorija servisiranja</a>
            </li><li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?opcija=kontakt\">Kontakt</a>
            </li>
            </ul>
            <form class=\"form-inline my-2 my-lg-0 mr-3\">
            <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\"><a href=\"index.php?opcija=logout\">Odjavi se</a></button>
        </form>";
            }
            else{
                echo " <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"index.php?opcija=kontakt\">Kontakt</a>
            </li>
        </ul>
      
        <form class=\"form-inline my-2 my-lg-0\">
           <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\" > <a href=\"index.php?opcija=logovanjeServisera\">Uloguj se</a></button>
        </form>";
            }?>

    </div>
</nav>