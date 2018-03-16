  <?php include 'inc/head.php'; ?>
  <?php require_once 'app/database.php'; ?>
  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Add your site or application content here -->
    <?php include 'inc/nav.php'; ?>
    <div class="hero-img">
      <img src="css/img/hero-sports-home.jpg" class="hero" alt="">
    </div>
    <div class="container">
      <div class="row main-sports">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-4">
              <div class="baseball-option">
                <a href="#">
                  <img src="css/img/baseball-option.png" class="img-fluid" alt="">
                  <!-- <div class="sports-options-title-overlay">
                    <span>BASEBALL</span>
                  </div> -->
                </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="softball-option">
                <a href="#">
                  <img src="css/img/softball-option.png" class="img-fluid" alt="">
                  <!-- <div class="sports-options-title-overlay">
                    <span>BASEBALL</span>
                  </div> -->
                </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="endless-possibilities">
                <a href="#">
                  <img src="http://via.placeholder.com/470x535" class="img-fluid ep" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      <!-- </div>
      <div class="row alt-sports"> -->
        <div class="col-sm-8">
          <div class="row alt-sports">
            <div class="col-sm-4">
              <div class="hockey-option">
                <a href="#">
                  <img src="css/img/hockey-option.png" class="img-fluid" alt="">
                  <!-- <div class="sports-options-title-overlay">
                    <span>BASEBALL</span>
                  </div> -->
                </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="tennis-option">
                <a href="#">
                  <img src="css/img/tennis-option.png" class="img-fluid" alt="">
                  <!-- <div class="sports-options-title-overlay">
                    <span>BASEBALL</span>
                  </div> -->
                </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="lacrosse-option">
                <a href="#">
                  <img src="css/img/lacrosse-option.png" class="img-fluid" alt="">
                  <!-- <div class="sports-options-title-overlay">
                    <span>BASEBALL</span>
                  </div> -->
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row creations">
        <div class="col-sm-12">
          <h1>OUR LATEST CREATIONS</h1>
          <h5>Follow us on Instagram @tapekings</h5>
        </div>
        <div class="col-sm-10 offset-1">
          <!-- LightWidget WIDGET --><script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/475b8f732dec5a93932d549faad0c1f5.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
        </div>
      </div>
    </div>
    <div class="row difference">
      <div class="col-sm-12 banner">
        <div class="container">
          <div class="col-lg-5 col-sm-12">
            <div class="difference-content">
              <h2>The Difference</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <button type="button" class="btn btn-danger flat" name="button">Shop Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>












    <!-- End Body -->

    <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>window.jQuery || document.write('<script src="lib/jquery/jquery-2.1.3.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
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
  </body>
</html>
