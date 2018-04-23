<?php include 'inc/head.php';
require_once 'app/database.php'; ?>

<body class="product-page">
  <?php include 'inc/nav.php'; ?>

  <?php
  $slug = $_SESSION['product'];
  $sql = "SELECT * FROM products WHERE '$slug' = slug";
  $result = mysqli_query($conn, $sql);
  if ($row = mysqli_fetch_assoc($result)) {
    $image = $row['image'];
    $name = $row['title'];
    $id = $row['id'];
    $price = $row['price'];
    $desc = $row['description'];
    $slug = $row['slug'];
    $width = $row['width'];
    $length = $row['length'];
  }
  ?>

  <div class="container">
    <div class="row product-all">
      <div class="col-lg-5 product-image">
        <img src="<?php echo $image; ?>">
      </div>
      <div class="col-lg-7 product-details">
        <h1><?php echo $name; ?></h1>
        <p class="product-price">$<?php echo $price; ?></p>
        <hr>
        <form class="" action="inc/cartadd.php" method="post">
          <div class="row">
              <div class="col-lg-2 qty-select">
                <label for="qty">Quantity</label>
                <input type="number" id="qty" name="qty" value="1" min="1">
              </div>
              <div class="col-lg-10 add-to-cart-btn">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type='submit' class='btn' name='add-to-cart'>Add to Cart</button>
                <div class="share-product">
                  <span>Share: <i class="fab fa-facebook"></i><i class="fab fa-twitter"></i><i class="fab fa-pinterest"></i></span>
                </div>
              </div>
          </div>
        </form>
        <hr>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" href="#description" role="tab" data-toggle="tab">Description</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#specs" role="tab" data-toggle="tab">Specs</a>
          </li>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade active show" id="description">
            <p><?php echo $desc; ?></p>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="specs">
            <ul>
              <li><?php echo $width; ?> inch<?php if ($width==1.5) {echo "es";}; ?> wide x <?php echo $length; ?> yards long</li>
              <li>Highest thread count</li>
              <li>Most water resistant</li>
              <li>Stickiest adhesive</li>
              <li>Made in USA</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row insta-feed">
    <div class="col-lg-6 text-center insta-feed-header">
      <h2 class="heading">See Our Lastest Designs</h2>
      <div class="insta-feed-link">
        <a href="//instagram.com/tapekings"><i class="fab fa-instagram"></i>tapekings</a><br>
      </div>
    </div>
    <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/e6d821de27085c33af262a8aa36f8d6a.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
  </div>


  <?php include 'inc/footer.php'; ?>
</body>
