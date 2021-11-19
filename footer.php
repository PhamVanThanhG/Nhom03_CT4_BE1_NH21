
  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
            Contact Us
            </h4>
            <?php foreach($getALLstore as $value):?>
            <div class="contact_link_box">
                <p style="text-align:left ;"> 
                 Name: <?php echo $value ['Name'] ?><br>
               </p>
                <p style="text-align:left ;">
                Location: <?php echo $value ['Location'] ?><br>
               </p>
                <p style="text-align:left ;"> 
                 <?php echo $value ['Phone_Number'] ?><br>
               </p>
                <p style="text-align:left ;" > 
                  <?php echo $value ['Email'] ?><br>
               </p>
                 <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
          <?php foreach($getALLstore as $value):?>
            <a href="" class="footer-logo">
              Feane
            </a>
            <p style="text-align:left;">
              <?php echo $value['Short description'] ?><br><br>
            </p>
            <div class="footer_social"><br><br>
            <a href="<?php echo $value ['Facebook'] ?>">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="<?php echo $value ['Twitter'] ?>">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            <link rel="stylesheet" href="facebook.com">
              </a>
              <a href="<?php echo $value ['Linkedin'] ?>">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="<?php echo $value ['Instagram'] ?>">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="<?php echo $value ['Pinterest'] ?>">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
          <?php echo $value ['Opening day'] ?><br>
          </p>
          <p>
          <?php echo $value ['Open time'] ?><br>
          </p>
          <p>
        </div>
        <?php endforeach ?>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>
</html>