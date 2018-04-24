<!DOCTYPE html>
<html>
  <head>
    <base href="http://localhost/tapekings-redesign/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TapeKings | <?php echo $_SESSION['title']; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="../tapekings-redesign/favicon.ico">
    <link rel="stylesheet" href="lib/normalize/normalize.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.css">
    <!-- <link rel="stylesheet" href="css/bootstrap/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:500,900|Cabin:400,500,600" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>


  </head>
  <?php include 'app/database.php' ?>

<body class="dashboard">
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="sports"><img src="./css/img/logo-top.png" alt="Logo" style="height:40px;"/></a>
      <form action="inc/search.php" method="post" style="max-width: 1485px;width: 100%;"><input class="form-control form-control-dark w-100" type="text" name="search" placeholder="Search" aria-label="Search"></form>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="account">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <?php if ($_SESSION['userID']==0){ ?>
              <li class="nav-item">
                <a class="nav-link active" href="productsDashboard">
                  <span data-feather="shopping-cart"></span>
                  Products <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="customers">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <?php } ?>
            </ul>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2>Products</h2>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>PrdocutID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Slug</th>
                  <th>Sort #</th>
                  <th>Width</th>
                  <th>Length</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM products;";
                  $result = mysqli_query($conn, $sql);
                  while($row = $result->fetch_assoc()) { ?>
                    <tr>
                      <td><img src="<?php echo $row['image']; ?>" alt="product image" style="height:80px;"></td>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['title']; ?></td>
                      <td><?php echo $row['price']; ?></td>
                      <td style="max-width:450px;"><?php echo $row['description']; ?></td>
                      <td><?php echo $row['slug']; ?></td>
                      <td><?php echo $row['sort']; ?></td>
                      <td><?php echo $row['width']; ?></td>
                      <td><?php echo $row['length']; ?></td>
                    </tr>
                <?php } ?>

            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>




  <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <script src="js/common.js"></script>
  </body>
  </html>
