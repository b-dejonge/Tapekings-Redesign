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
