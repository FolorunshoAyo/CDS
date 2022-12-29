<?php 
  require(dirname(dirname(__DIR__)) . '/auth-library/resources.php');
  AdminAuth::User("a/login");
  $admin_id = $_SESSION['admin_id'];
  //==================================================================
  //Check users last saving date

  $date_time = $db->query("SELECT NOW() AS nowdate");
  $row = $date_time->fetch_assoc();
  $dated = $row['nowdate'];
  $now = strtotime($dated);
  // $time = date("M d Y, h:i A", $now);

  $current_date = date('Y-m-d');
  $str_current_date = strtotime(date('Y-m-d'));

  $admin_sql = $db->query("SELECT * FROM admin WHERE admin_id={$admin_id}");
  if($admin_sql->num_rows == 1){
      $row_admin = $admin_sql->fetch_assoc();
  }else{
      header("Location: ../login");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Custom Fonts (Inter) -->
  <link rel="stylesheet" href="../../assets/fonts/fonts.css" />
  <!-- BASE CSS -->
  <link rel="stylesheet" href="../../assets/css/base.css" />
  <!-- ADMIN DASHBOARD MENU CSS -->
  <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash-menu.css" />
  <!-- ADMIN DASHBOARD STYLESHEET -->
  <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash/index.css" />
  <!-- DASHHBOARD MEDIA QUERIES -->
  <link rel="stylesheet" href="../../assets/css/media-queries/admin-dash-mediaqueries.css" />
  <title>Admin Dashboard: CDS ADMIN</title>
</head>

<body style="background-color: #fafafa">
  <div class="dash-wrapper">
    <div class="mobile-backdrop"></div>
    <aside class="dash-menu">
      <div class="logo">
        <div class="menu-icon">
          <i class="fa fa-bars"></i>
          <i class="fa fa-times"></i>
        </div>
        <a href="./" class="logo">
          <i class="fa fa-home"></i>
          <span> CDS ADMIN </span>
        </a>
      </div>
      <ul class="side-menu" id="side-menu">
        <li class="nav-item">
          <a href="./">
            <i class="fa fa-tachometer"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="javascript:void(0">
            <i class="fa fa-signal"></i>
            <span>Statistics</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="./orders">
            <i class="fa fa-usd"></i>
            <span>Orders</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="javascript:void(0">
            <i class="fa fa-recycle"></i>
            <span>Shipping</span>
          </a>
        </li>
        <li class="nav-item active">
          <a href="./products">
            <i class="fa fa-shopping-bag"></i>
            <span>Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="./agents">
            <i class="fa fa-users"></i>
            <span>Agents</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="javascript:void(0">
            <i class="fa fa-commenting-o"></i>
            <span>Messages</span>
          </a>
        </li>
      </ul>

      <ul class="side-menu-bottom">
        <li class="nav-tem">
          <a href="javascript:void(0)">
            <i class="fa fa-gear"></i>
            <span>Settings</span>
          </a>
        </li>
        <li class="nav-item logout">
          <a href="../logout">
            <i class="fa fa-sign-out"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </aside>
    <section class="page-wrapper">
      <header class="dash-header">
        <h1 class="welcome-message">Welcome
          <?php echo(ucfirst($row_admin['first_name'])); ?>,
        </h1>
        <div class="select-container">
          <form id="selected-date-form" action="#" method="GET">
            <select id="selected-date" name="selected-date">
              <option>29 Sept, 2022</option>
            </select>
          </form>
        </div>
      </header>
      <section class="card-widgets">
        <div class="card today-card">
          <div class="card-details">
            <h2 class="title">Today's payments</h2>
            <span class="card-figure">NGN 12.5K</span>
            <span class="card-more-info">76 wallets has been created today</span>
          </div>
          <div class="card-graph">
            <!-- GRAPH HERE -->
            GRAPH HERE
          </div>
        </div>
        <div class="card today-card">
          <div class="card-details">
            <h2 class="title">Today's Impressions</h2>
            <span class="card-figure">7.9K</span>
            <span class="card-more-info">Through click rate</span>
          </div>
          <div class="card-graph">
            <!-- GRAPH HERE -->
            GRAPH HERE
          </div>
        </div>
      </section>
      <section class="card-widgets">
        <div class="card total-revenue-card">
          <div class="title-and-keys-container">
            <div class="title-container">
              <h2 class="title">Total Revenue</h2>
            </div>
            <div class="keys-container">
              <div class="key key-1">
                <span class="key-dot blue"></span>
                Profit
              </div>
              <div class="key key-1">
                <span class="key-dot grey"></span>
                Loss
              </div>
            </div>
          </div>
          <div class="card-figure-container">
            <span class="card-figure">NGN4.6M</span>
            <span class="comparison-factor success">
              <i class="fa fa-arrow-up"></i>
              5% than last month
            </span>
          </div>
          <div class="graph-container">
            <!-- GRAPH HERE -->
            GRAPH HERE
          </div>
        </div>
        <div class="card top-categories-card">
          <h2 class="title">Top Selling Categories</h2>
          <div class="top-categories-container">
            <div class="top-categories-group">
              <div class="top-categories-details">
                <span class="top-categories-label"> Package Offers </span>
                <span class="top-categories-value"> 70% </span>
              </div>
              <div class="top-categories-progress">
                <div class="progress-body">
                  <div class="progress-thumb" data-percent="70%"></div>
                </div>
              </div>
            </div>
            <div class="top-categories-group">
              <div class="top-categories-details">
                <span class="top-categories-label"> Phones </span>
                <span class="top-categories-value"> 40% </span>
              </div>
              <div class="top-categories-progress">
                <div class="progress-body">
                  <div class="progress-thumb" data-percent="40%"></div>
                </div>
              </div>
            </div>
            <div class="top-categories-group">
              <div class="top-categories-details">
                <span class="top-categories-label"> Laptops </span>
                <span class="top-categories-value"> 60% </span>
              </div>
              <div class="top-categories-progress">
                <div class="progress-body">
                  <div class="progress-thumb" data-percent="60%"></div>
                </div>
              </div>
            </div>
            <div class="top-categories-group">
              <div class="top-categories-details">
                <span class="top-categories-label"> Cars </span>
                <span class="top-categories-value">
                  80%
                </span>
              </div>
              <div class="top-categories-progress">
                <div class="progress-body">
                  <div class="progress-thumb" data-percent="80%"></div>
                </div>
              </div>
            </div>
            <div class="top-categories-group">
              <div class="top-categories-details">
                <span class="top-categories-label"> Home appliances </span>
                <span class="top-categories-value"> 20% </span>
              </div>
              <div class="top-categories-progress">
                <div class="progress-body">
                  <div class="progress-thumb" data-percent="20%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="payment-table-section card">
        <h2 class="title">Latest Orders</h2>
        <div class="payment-table-container">
          <table>
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Total</th>
                <th>Confirm</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  #112234
                </td>
                <td>
                  Sept 9, 2022
                </td>
                <td>
                  Shodiya Folorunsho
                </td>
                <td>
                  <span class="dot pending-dot"></span>
                  pending
                </td>
                <td>
                  NGN6000
                </td>
                <td>
                  <!-- Link to flutterwave -->
                  <a href="order-details">View Order</a>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="view-orders-container">
            <a href="./all-orders" class="view-orders">View all orders</a>
          </div>
        </div>
      </section>
    </section>
  </div>

  <!-- FONT AWESOME JIT SCRIPT-->
  <script src="https://kit.fontawesome.com/3ae896f9ec.js" crossorigin="anonymous"></script>
  <!-- JQUERY SCRIPT -->
  <script src="../../assets/js/jquery/jquery-3.6.min.js"></script>
  <!-- JQUERY MIGRATE SCRIPT (FOR OLDER JQUERY PACKAGES SUPPORT)-->
  <script src="../../assets/js/jquery/jquery-migrate-1.4.1.min.js"></script>
  <!-- METIS MENU JS -->
  <script src="../../assets/js/metismenujs/metismenujs.js"></script>
  <!-- DASHBOARD SCRIPT -->
  <script src="../../assets/js/admin-dash.js"></script>
  <script>
    //PROGRESS LOADERS FOR TOP SELLING CATEGORIES
    const progressThumbs = $(".progress-thumb");

    progressThumbs.each(function () {
      const dataPercent = $(this).attr("data-percent");

      $(this).css("width", dataPercent);
    });
  </script>
</body>

</html>