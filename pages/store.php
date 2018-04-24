<?php include 'inc/head.php'; ?>
<?php require_once 'app/database.php'; ?>
<body class="store">
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <?php include 'inc/nav.php'; ?>

  <div class="store-header"></div>
  <section id="prices">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-center prices-headline">
          <h2 class="heading">Send Us Your Bat</h2>
          <p>Send your bat in to the professinals where we put on your desired colors and design. Pick from our tiered pricing where you can add great features like the Hydro Grip and also gain FREE shipping.</p><br>
        </div>
      </div>
      <div class="prices-box">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-6 pd0 price-table aos-init aos-animate" data-aos="fade-right">
            <div class="top-content text-center">
              <div class="title">
                <h3>Basic</h3>
              </div>
              <div class="price">
                <span>$10</span>
              </div>
              <a class="btn btn-default" href="store/send-us-your-bat/basic">Buy Now</a>
            </div>
            <div class="bottom-content text-center">
              <ul class="features list-unstyled">
                <li>Only Standard Designs</li>
                <li>Standard Grip</li>
                <li>You pay for shipping</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 pd0 price-table aos-init aos-animate" id="price1" data-aos="fade-right">
            <div class="top-content text-center">
              <div class="title">
                <h3>Standard</h3>
              </div>
              <div class="price">
                <span>$20</span>
              </div>
              <a class="btn btn-default" href="store/send-us-your-bat/standard">Buy Now</a>
            </div>
            <div class="bottom-content text-center">
              <ul class="features list-unstyled">
                <li>Any Design</li>
                <li>Standard Grip</li>
                <li>You pay for shipping</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 pd0 price-table aos-init aos-animate" id="price2" data-aos="fade-up">
            <div class="top-content text-center">
              <div class="title">
                <h3>Hydro</h3>
              </div>
              <div class="price">
                <span>$30</span>
              </div>
              <a class="btn btn-default" href="store/send-us-your-bat/hydro">Buy Now</a>
            </div>
            <div class="bottom-content text-center">
              <ul class="features list-unstyled">
                <li>Any Design</li>
                <li title="Clear coat over the tape to improve durability">Hydro Grip &#9432;</li>
                <li>FREE Shipping</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 pd0 price-table aos-init aos-animate" data-aos="fade-left">
            <div class="top-content text-center">
              <div class="title">
                <h3>Custom</h3>
              </div>
              <div class="price">
                <span>$40</span>
              </div>
              <a class="btn btn-default" href="store/send-us-your-bat/custom">Buy Now</a>
            </div>
            <div class="bottom-content text-center">
              <ul class="features list-unstyled">
                <li>Fully Custom Design</li>
                <li title="Clear coat over the tape to improve durability">Hydro Grip &#9432;</li>
                <li>FREE Shipping</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="store-professional">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="css/img/nic-besant.png" class="nic-besant img-fluid" alt="">
        </div>
        <div class="col-md-6">
          <h3 class="besant-quote">"We strive to meet the needs of our customers with brand new designs, fast service, and great customer support. TapeKings offers many possibilities so you can have a great looking grip no matter the sport you play."<br/><span class="besant-quote-name">-Nic Besant, Owner</span></h3>

        </div>
      </div>

    </div>
  </div>
  <div class="container">
    <div class="row">
      <!-- <div class="col-md-3">
        <?php //print_r($_SESSION['category']); ?>
      </div> -->
      <div class="col-md-12">
        <div class="row">
          <div class="col-lg-6 text-center prices-headline">
            <h2 class="heading">Tape Your Own Grip</h2>
            <p>Want to tape your own bat? We've got you covered with great tape from Howies Hockey which is the same tape our professinals use to tape bats. Think you have a great design, feel free to send us a picture!</p><br>
          </div>
        </div>
        <div class="row">
          <?php
            $sql = "SELECT * FROM products ORDER BY sort ASC LIMIT 8";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class='col-md-3 product'>
                <form action='inc/cart.php' method='post'>
                  <div class='product-thumb'>
                    <div class='image'>
                      <a href='store/<?php echo $row['category'] . "/" . $row['slug'] ?>'>
                      <!-- <a href='<?php echo $row['slug'] ?>'> -->
                        <img src='<?php echo $row['image'] ?>'>
                      </a>
                    </div>
                    <div class='product-contents'>
                      <h5><?php echo $row['title'] ?></h5>
                      <!-- <p><?php //echo $row['description'] ?></p> -->
                      <hr>
                      <span class='price'>$<?php echo $row['price'] ?></span><button type='button' onclick='cart.add(<?php echo $row['id'] ?>,1)' class='btn' name='add-to-cart'>Add to Cart</button>
                      <input class='d-none' name='price' value='<?php echo $row['price'] ?>'>
                      <input class='d-none' name='qty' value='1'>
                      <input class='id d-none' name='id' value='<?php echo $row['id'] ?>'></input>
                    </div>
                  </div>
                  </form>
                </div>
            <?php } ?>

        </div>
        <p id="view-all-btn" class="text-center view-all-btn">View All</p>
        <div id="view-all" class="row view-all">
          <?php
            $sql = "SELECT * FROM products WHERE sort>8 ORDER BY sort ASC LIMIT 12";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) { ?>
              <div class='col-md-3 product'>
              <form action='inc/cart.php' method='post'>
                <div class='product-thumb'>
                  <div class='image'>
                    <a href='store/<?php echo $row['category'] . "/" . $row['slug'] ?>'>
                    <!-- <a href='<?php echo $row['slug'] ?>'> -->
                      <img src='<?php echo $row['image'] ?>'>
                    </a>
                  </div>
                  <div class='product-contents'>
                    <h5><?php echo $row['title'] ?></h5>
                    <hr>
                    <span class='price'>$<?php echo $row['price'] ?></span><button type='button' onclick='cart.add(<?php echo $row['id'] ?>,1)' class='btn' name='add-to-cart'>Add to Cart</button>
                    <input class='d-none' name='price' value='<?php echo $row['price'] ?>'>
                    <input class='d-none' name='qty' value='1'>
                    <input class='id d-none' name='id' value='<?php echo $row['id'] ?>'></input>
                  </div>
                </div>
                </form>
              </div>
            <?php } ?>
          </div>
          <p id="view-less-btn" class="text-center view-less-btn">View Less</p>
      </div>
    </div>
  </div>

  <?php include 'inc/footer.php'; ?>
