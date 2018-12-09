		<?php session_start();
		include_once ("header.php");
		include_once ("navigacija.php");


		if(isset($_GET['opcija'])){
			$opcija=$_GET['opcija'];
			$fajl=$opcija.".php";

			if(file_exists($fajl)){
				include_once ($fajl);
			}
			else{
				echo "Stranica ne postoji";
			}
		}
		else{
			include_once('pocetna.php');
		}
		include_once ("footer.php");
		?>