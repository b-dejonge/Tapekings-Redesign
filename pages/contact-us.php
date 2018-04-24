  <?php include 'inc/head.php'; ?>

  <body>
    <?php include 'inc/nav.php'; ?>

    <section id="contact">
      <div class="container">
        <div class="well well-sm">
          <h3><strong>Contact Us</strong></h3>
        </div>

    	<div class="row">
    	  <div class="col-md-7">
          <iframe
            width="100%"
            height="355"
            frameborder="0" style="border:0"
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD8Ip5MoKU2iopHU1OMv6RJpYK6a6UP2SA
              &q=TapeKings,Fort+Wayne+IN&zoom=11" allowfullscreen>
          </iframe>
        </div>

          <div class="col-md-5">
              <h4><strong>Get in Touch</strong></h4>
            <form>
              <div class="form-group">
                <input type="text" class="form-control" name="" value="" placeholder="Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="" value="" placeholder="E-mail">
              </div>
              <div class="form-group">
                <input type="tel" class="form-control" name="" value="" placeholder="Phone">
              </div>
              <div class="form-group">
                <textarea class="form-control" name="" rows="3" placeholder="Message"></textarea>
              </div>
              <button class="btn btn-default" type="submit" name="button">
                  <i class="fas fa-paper-plane" aria-hidden="true"></i> Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- start insta -->
    <div class="row insta-feed">
      <div class="col-lg-6 text-center insta-feed-header">
        <h2 class="heading">See Our Lastest Designs</h2>
        <div class="insta-feed-link">
          <a href="//instagram.com/tapekings"><i class="fab fa-instagram"></i>tapekings</a><br>
        </div>
      </div>
      <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/e6d821de27085c33af262a8aa36f8d6a.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
    </div>
    <style media="screen">
    #contact{
    margin-bottom: 80px;
}

#contact .well{
  margin-top:30px;
  border-radius:0;
}

#contact .form-control{
  border-radius: 0;
  border:2px solid #1e1e1e;
}

#contact button{
  border-radius:0;
  border:2px solid #1e1e1e;
}

#contact .row{
  margin-bottom:30px;
}

@media (max-width: 768px) {
  #contact iframe {
      margin-bottom: 15px;
  }

}
    </style>

  <?php include 'inc/footer.php'; ?>
