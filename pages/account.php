<?php if(!isset($_SESSION['userID'])){
  header("Location: ./register");
} ?>

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
                <a class="nav-link active" href="account">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
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
                <a class="nav-link" href="productsDashboard">
                  <span data-feather="shopping-cart"></span>
                  Products
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
            <h1 class="h2">Dashboard</h1>
            <?php if(isset($_SESSION['search'])){print_r($_SESSION['search']);} ?>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>
          <?php if ($_SESSION['userID']==0){ ?>
          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
          <?php } ?>
          <h2>Recent Orders</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Order #</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Total</th>
                  <!-- <th>Total</th> -->
                </tr>
              </thead>
              <tbody>
                <?php if($_SESSION['userID'] == 0){
                  $sql = "SELECT * FROM orders ORDER BY orderID DESC LIMIT 10 ;";
                } else{
                  $sql = "SELECT * FROM orders WHERE $_SESSION[userID] = userID ORDER BY orderID DESC;";
                }
                $result = mysqli_query($conn, $sql);

                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                  while($row = $result->fetch_assoc()) { ?>
                    <tr>
                      <td><?php echo $row['orderID']; ?></td>
                      <td><?php echo $row['billingFirstName']." ".$row['billingLastName']; ?></td>
                      <td><?php echo $row['orderDate'] = date("m/d/y"); ?></td>
                      <td>$<?php echo number_format((float)$row['total'], 2, '.', '') ?></td>
                      <!-- <td></td> -->
                    </tr>

                  <?php }}else{ ?>
                  <tr>
                    <td colspan="4">No current orders</td>
                  </tr>
              <?php  }  ?>

                <!-- <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>augue</td>
                  <td>semper</td>
                  <td>porta</td>
                  <td>Mauris</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>massa</td>
                  <td>Vestibulum</td>
                  <td>lacinia</td>
                  <td>arcu</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>eget</td>
                  <td>nulla</td>
                  <td>Class</td>
                  <td>aptent</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                  <td>ad</td>
                  <td>litora</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                  <td>conubia</td>
                  <td>nostra</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>inceptos</td>
                  <td>himenaeos</td>
                  <td>Curabitur</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                </tr>
              </tbody> -->
            </table>
          </div>
        </main>
      </div>
    </div>
  </body>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
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
  </html>
