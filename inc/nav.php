<nav class="navbar navbar-expand-lg mx-background-top-linear">
  <div class="logo-bg"></div>
  <a class="navbar-brand" href="#"><img src="css/img/logo-top.png" class="logo" alt="TapeKings Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class='nav-item'>
          <a href="store" class="nav-link" id="storeDropdown">Store</a>
          <!-- <div class="dropdown-menu" aria-labelledby="storeDropdown">
            <?php
              $sql = "SELECT * FROM categories WHERE parent=0";
              $result = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_assoc($result)) {
                echo
                "<a href='$row[category]' class='dropdown-item'>$row[category]</a>";
              }
            ?>
          </div> -->
        </li>
        <li class="nav-item">
          <a href="designs" class="nav-link">Designs</a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="moreDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
          <div class="dropdown-menu" aria-labelledby="moreDropdown">
            <a href="about-us" class="dropdown-item">About us</a>
            <a href="contact-us" class="dropdown-item">Contact us</a>
            <a href="faq" class="dropdown-item">FAQ</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="cart" class="nav-link"><i class="fa fa-shopping-cart" style="font-size:20px;"></i><span class="cartQty"><?php echo count($_SESSION['cart']); ?></span></a>
        </li>
        <?php if(isset($_SESSION['id'])){ ?>
        <li class="nav-item">
          <a href="account" class="nav-link">My Account</a>
        </li>
        <?php }else{ ?>
        <li class="nav-item">
          <a href="register" class="nav-link">Join</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" id="accountDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Log In</a>
          <div class="dropdown-menu dropdown-menu-right login-dropdown" aria-labelledby="accountDropdown">
            <div class="login-dropdown-content">
              <form class="" action="inc/login.php" method="post">
                <div class="container">
                  <h4>LOG IN TO TK+</h4>
                  <div class="emailSection">
                    <label for="emailAddress">Email</label><br>
                    <input type="email" name="emailAddress" value="">
                  </div>
                  <div class="passwordSection">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" value="">
                  </div>
                  <div class="login-button">
                    <button type="submit" name="loginButton">LOG IN</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </li>
        <?php }; ?>
      </ul>
    </div>
  </nav>
