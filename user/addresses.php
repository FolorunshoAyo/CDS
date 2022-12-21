<?php
  require(dirname(__DIR__).'/auth-library/resources.php');
  Auth::User("../login");

  $userID = $_SESSION['user_id'];

  $sql_all_address = $db->query("SELECT *
  FROM addresses INNER JOIN user_addresses ON 
  addresses.address_id = user_addresses.address_id WHERE user_id={$userID}");

  $sql_active_address = $db->query("SELECT *
  FROM addresses INNER JOIN user_addresses ON 
  addresses.address_id = user_addresses.address_id WHERE user_id={$userID} AND active=1");

  $sql_other_addresses = $db->query("SELECT *
  FROM addresses INNER JOIN user_addresses ON 
  addresses.address_id = user_addresses.address_id WHERE user_id={$userID} AND active=0");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <!-- Custom Fonts (Inter) -->
  <link rel="stylesheet" href="../assets/fonts/fonts.css" />
  <!-- BASE CSS -->
  <link rel="stylesheet" href="../assets/css/base.css" />
  <!-- DASHBOARD MENU CSS -->
  <link rel="stylesheet" href="../assets/css/dashboard/user-dash-menu.css" />
  <!-- USER DASHBOARD STYLESHEET -->
  <link rel="stylesheet" href="../assets/css/dashboard/user-dash/addresses.css" />
  <!-- DASHHBOARD MEDIA QUERIES -->
  <link rel="stylesheet" href="../assets/css/media-queries/user-dash-mediaqueries.css" />
  <title>Your Address(es) - CDS</title>
</head>

<body>
  <div class="mobile-backdrop"></div>
  <aside class="mobile-menu">
    <div class="cross-icon-wrapper">
      <div class="cross-icon-container">
        <i class="fa fa-times"></i>
      </div>
    </div>
    <div class="nav-link-container">
      <ul class="nav-links">
        <li class="nav-link-item">
          <a href="./" class="nav-link"> Dashboard </a>
        </li>
        <li class="nav-link-item">
          <a href="#" class="nav-link"> Items picked </a>
        </li>
        <li class="nav-link-item">
          <a href="./orders">Orders</a>
        </li>
        <li class="nav-link-item active">
          <a href="./address" class="nav-link"> Address </a>
        </li>
        <li class="nav-link-item">
          <a href="./profile" class="nav-link"> My profile </a>
        </li>
        <li class="nav-link-item">
          <a href="#" class="nav-link logout"> Logout </a>
        </li>
      </ul>
    </div>
  </aside>
  <header>
    <div class="dash-header-container">
      <div class="menu-icon-container">
        <i class="fa fa-bars"></i>
      </div>
      <div class="header-navigation-container">
        <div class="dropdown">
          <a href="#" class="btn btn-secondary-outline dropdown-toggle header-link" type="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Browse
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>
        <div>
          <a class="header-link" href="../">Homepage</a>
        </div>
        <div>
          <a class="header-link" href="#">Help</a>
        </div>
      </div>
    </div>
  </header>
  <main>
    <div class="main-container">
      <div class="dashboard-links-wrapper">
        <div class="dashboard-links">
          <ul class="dashboard-nav-links">
            <li class="title">My Profile</li>
            <li class="dashboard-nav-link">
              <a href="./">Dashboard</a>
            </li>
            <li class="dashboard-nav-link">
              <a href="#">Items-picked</a>
            </li>
            <li class="dashboard-nav-link">
              <a href="./orders">Orders</a>
            </li>
            <li class="dashboard-nav-link active">
              <a href="./addresses">Address</a>
            </li>
            <li class="dashboard-nav-link">
              <a href="./profile">My profile</a>
            </li>
            <li class="dashboard-nav-link logout">
              <a href="#">Logout</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="dashboard-main-section">
        <div class="dashboard-main-container">
          <h1 class="dashboard-main-title">Address/Delivery Details</h1>

          <p class="dashboard-main-text">
            Here is your address details, you can delete or remove one or more addresses. <br>
            If you already have a registered address, you can still add another address (Max is 3).
          </p>

          <div class="addresses-container">
            <?php
              if($sql_all_address->num_rows === 0){
            ?>
            <div style="flex: 1; display: flex; align-items: center; justify-content: center; height: 200px;">
                <b>You don't have any address. Click the button below to add a new address.</b>
            </div>
            <?php 
              }elseif($sql_all_address->num_rows === 1){
                $default_address_details = $sql_active_address->fetch_assoc(); 
            ?>
            <div class="address-card default">
              <address class="main-address">
                <p class="recipient-name"><?php echo $default_address_details['recipient_name']?></p>
                <?php echo $default_address_details['delivery_address'] . ", " . $default_address_details['city_name'] . ". " . $default_address_details['address_state'] . "."?>
                <b class="postal-code"><?php echo $default_address_details['address_postalcode']?></b><br><br>
                <?php echo $default_address_details['additional_info']?><br><br>
                <span><?php echo $default_address_details['recipient_phone_no']?></span>
              </address>
              <footer class="address-action-container">
                <button disabled class="set-as-default-button">
                  Set as default
                </button>

                <div class="address-action-icon-group">
                  <a href="./edit-address?aid=<?php echo $default_address_details['address_id']?>" class="edit-btn">
                    <i class="fa fa-pen"></i>
                  </a>
                </div>
              </footer>
            </div>
            <?php 
              }else{

                while($row_address = $sql_other_addresses->fetch_assoc()){
            ?>
            <div class="address-card">
              <address class="main-address">
                <p class="recipient-name"><?php echo $row_address['recipient_name'] ?></p>
                <?php echo $row_address['delivery_address'] . ", " . $row_address['city_name'] . ". " . $row_address['address_state'] . "."?>
                <b class="postal-code"><?php echo $row_address['address_postalcode']?></b><br><br>
                <?php echo $row_address['additional_info']?><br><br>
                <span><?php echo $row_address['recipient_phone_no']?></span>
              </address>
              <footer class="address-action-container">
                <button class="set-as-default-button">
                  Set as default
                </button>

                <div class="address-action-icon-group">
                  <a href="./edit-address?aid=<?php echo $row_address['address_id']?>" class="edit-btn">
                    <i class="fa fa-pen"></i>
                  </a>
                  <button class="edit-btn">
                    <i class="fa fa-trash"></i>
                  </button>
                </div>
              </footer>
            </div>

            <?php
                }
              }
            ?>
          </div>

          <div class="btn-container">
            <a href="./add-address" class="new-address-btn">Add Address</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- FONT AWESOME JIT SCRIPT-->
  <script src="https://kit.fontawesome.com/3ae896f9ec.js" crossorigin="anonymous"></script>
  <!-- JQUERY SCRIPT -->
  <script src="../assets/js/jquery/jquery-3.6.min.js"></script>
  <!-- JQUERY MIGRATE SCRIPT (FOR OLDER JQUERY PACKAGES SUPPORT)-->
  <script src="../assets/js/jquery/jquery-migrate-1.4.1.min.js"></script>
  <!-- JAVASCRIPT BUNDLER WITH POPPER -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <!-- CUSTOM DASHBOARD SCRIPT -->
  <script src="../assets/js/user-dash.js"></script>
</body>

</html>