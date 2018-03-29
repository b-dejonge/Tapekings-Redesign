<?php include 'inc/head.php'; ?>
<?php require_once 'app/database.php'; ?>
<body>
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <?php include 'inc/nav.php'; ?>

  <div class="container">
    <div class="row">
      <div class="col-md-3">

      </div>
      <div class="col-md-9">
        <h1><?php  ?>Tape</h1>
        <div class="row">
          <?php
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
              echo"
                <div class='col-md-4 product'>
                  <div class='product-thumb'>
                    <div class='image'>
                      <a href='store/$row[category]/$row[slug]'>
                        <img src='$row[image]'>
                      </a>
                    </div>
                    <div class='product-contents'>
                      <h4>$row[title]</h4>
                      <p>$row[description]</p>
                      <p class='price'>$$row[price]</p>
                    </div>
                    <button class='btn'>Add to Cart</button>
                  </div>
                </div>
              ";
            }
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php include 'inc/footer.php'; ?>
