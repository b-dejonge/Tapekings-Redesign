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
          <h1>SPORTS WE'VE DONE</h1>
          <h5>We can tape pretty much anything!</h5>
          <div class="row">
            <div class="col-sm-4">
              <div class="baseball-option">
                <a href="#">
                  <img src="css/img/baseball-option.png" class="img-fluid" alt="">
                </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="softball-option">
                <a href="#">
                  <img src="css/img/softball-option.png" class="img-fluid" alt="">
                </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="endless-possibilities">
                <a href="#">
                  <img src="css/img/endless-possibilities.png" class="img-fluid ep" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="row alt-sports">
            <div class="col-sm-4">
              <div class="hockey-option">
                <a href="#">
                  <img src="css/img/hockey-option.png" class="img-fluid" alt="">
                </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="tennis-option">
                <a href="#">
                  <img src="css/img/tennis-option.png" class="img-fluid" alt="">
                </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="lacrosse-option">
                <a href="#">
                  <img src="css/img/lacrosse-option.png" class="img-fluid" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row creations">
        <div class="col-sm-12">
          <h1>OUR LATEST CREATIONS</h1>
          <h5>Follow us on Instagram <span style="font-family:'Roboto';">@</span>tapekings</h5>
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
              <button type="button" class="btn btn-default" name="button">Shop Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section id="prices">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-center prices-headline">
            <h2><span class="ion-minus"></span>Prices<span class="ion-minus"></span></h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis  dis parturient montes, nascetur ridiculus </p><br>
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
                <a class="btn btn-default" href="#">Buy Now</a>
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
                <a class="btn btn-default" href="#">Buy Now</a>
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
                <a class="btn btn-default" href="#">Buy Now</a>
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
                <a class="btn btn-default" href="#">Buy Now</a>
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
    <div class="row video-player">
      <div class="col-sm-12 embed-container">
        <iframe src="https://www.youtube.com/embed/aCdgM1UE0O0?rel=0&amp;showinfo=0"   frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>













    <!-- End Body -->

    <?php include 'inc/footer.php'; ?>
