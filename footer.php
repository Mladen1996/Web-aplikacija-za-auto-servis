<footer id="footer">
    <div class="text-white contactSmall">
        <div class="container">
            <div class="row">
                <div class="col-md-2 offset-lg-1 text-center">
                    <h5 class="text-uppercase font-weight-bold mb-3">Meni</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a class="text-white" href="index.php">Početna
                            </a>
                        </li>
                        <li>
                            <a class="text-white" href="index.php?opcija=o nama">O nama</a>
                        </li>
                        <li>
                            <a class="text-white" href="index.php?opcija=kontakt">Kontakt</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 text-center">
                    <h5 class="text-uppercase font-weight-bold mb-3">Usluge</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a class="text-white" href="index.php?opcija=autoservis">Auto servis
                            </a>
                        </li>
                        <li>
                            <a class="text-white" href="index.php?opcija=limarija">Limarija i farbanje</a>
                        </li>
                        <li>
                            <a class="text-white" href="index.php?opcija=perionica">Perionica</a>
                        </li>
                        <li>
                            <a class="text-white" href="index.php?opcija=vulkanizer">Vulkanizer</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 text-center">
                    <h5 class="text-uppercase font-weight-bold mb-3">Kontakt</h5>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fas fa-map-marker-alt"><span class="pl-2">Vojvode Stepe bb,Vozdovac</span></i>


                        </li>
                        <li>
                            <i class="fas fa-envelope"><span class="pl-2">info@autoservismladen.com</span></i>

                        </li>
                        <li>
                            <i class="fas fa-phone"><span class="pl-2"> 011/ 123 - 4567</span></i>

                        </li>

                    </ul>
                </div>
                <div class="col-md-3 text-center">
                    <h5 class=" d-block text-uppercase font-weight-bold mb-3 pr-lg-3">pratite nas</h5>
                    <ul class="list-inline text-dark pr-lg-3">
                        <a href="https://www.facebook.com/" class="list-inline-item" target="_blank">
                            <i class="fab fa-facebook fa-2x hvr-sink"></i>
                        </a>
                        <a href="https://www.twitter.com/" class="list-inline-item" target="_blank">
                            <i class="fab fa-twitter fa-2x hvr-sink"></i>
                        </a>
                        <a href="https://www.instagram.com/" class="list-inline-item" target="_blank">
                            <i class="fab fa-instagram fa-2x hvr-sink"></i>
                        </a>
                        <a href="https://www.linkedin.com/" class="list-inline-item" target="_blank">
                            <i class="fab fa-linkedin fa-2x hvr-sink"></i>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-white">
            <div class="container">
                <div class="row d-flex justify-content-center pt-2 pt-lg-3">
                    <h6>Živojinović Mladen © 2018</h6>
                </div>
            </div>
        </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script>
    // Add slideDown animation to Bootstrap dropdown when expanding.
    $('.dropdown').on('show.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $('.dropdown').on('hide.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        offset:200,
        duration:1000
    });
</script>



</body>
</html>