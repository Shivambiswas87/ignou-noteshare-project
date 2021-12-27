
</div>

<!-- Upload Notes sections. -->
<div class="mb-0">
    <div class="py-4 text-center pt-5 pb-5" style="background-color: #e6e3da">
        <p class="lead font-weight-normal" >Upload your notes here</p>
        <a role="button" class="btn my-primary-btn text-white btn-lg" href="<?php echo \utils\Url::generateLink('upload-note', true);?>" style="width: 500px">
            Upload Notes
        </a>
    </div>
    <!-- Footer -->
    <footer class="text-center text-white my-background-dark text-dark">
        <!-- Grid container -->
        <div class="container">
            <!-- Section: Links -->
            <section class="">
                <!-- Grid row-->
                <div class="row text-center d-flex justify-content-center pt-5">
                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a class="text-dark"
                               href="<?php echo \utils\Url::generateLink('view-notes');?>">Notes</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="<?php echo \utils\Url::generateLink('upload-note', true);?>" class="text-dark">Upload Notes</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="<?php echo \utils\Url::generateLink('synopsis');?>"
                               class="text-dark">Synopsis</a>
                        </h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="<?php echo \utils\Url::generateLink('about-me');?>"
                               class="text-dark">About Developer</a>
                        </h6>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="my-5 bg-dark" />

            <!-- Section: Text -->
            <section class="mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <p>
                            This is a note sharing platform developed by Shibam Biswas. <br>
                            With the motive of helping students to share notes with friends or Juniors.
                            <br>
                            Student of IGNOU. Enrollment No: 176653027
                        </p>
                    </div>
                </div>
            </section>
            <!-- Section: Text -->

            <!-- Section: Social -->
            <section class="text-center pb-5 ">
                <a href="https://www.facebook.com/findshivam.biswas/" class="text-dark m-2" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/i_shivam97/" class="text-dark m-2" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/shivam-biswas-18107578/" class="text-dark m-2" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/Shivambiswas87" class="text-dark m-2" target="_blank">
                    <i class="fab fa-github"></i>
                </a>
            </section>
            <!-- Section: Social -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 text-white navbar-one"> © 2020 Copyright:
            <a class="text-white">Shibam Biswas</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</div>


<?php include BASE_PATH . '/screens/layouts/_footer.php';?>


</body>
</html>