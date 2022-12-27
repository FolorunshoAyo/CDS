<?php
    require(dirname(dirname(__DIR__)) . '/auth-library/resources.php');
    AgentAuth::User("a/login");

    
  // NUMBER FORMATTER
  // $human_readable = new \NumberFormatter(
  //   'en_US', 
  //   \NumberFormatter::PADDING_POSITION
  // );

    $agent_id = $_SESSION['agent_id'];

    if(isset($_GET['cid']) && !empty($_GET['cid'])){
        $cid = $_GET['cid'];
    
        $sql_agent_customer_details = $db->query("SELECT * FROM agent_customers WHERE agent_customer_id={$cid}");
    
        $customer_details = $sql_agent_customer_details->fetch_assoc();
    }else{
        header("Location: ./");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- JQUERY DATATABLES CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <!-- Custom Fonts (Inter) -->
    <link rel="stylesheet" href="../../assets/fonts/fonts.css" />
    <!-- BASE CSS -->
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <!-- FORM CSS -->
    <link rel="stylesheet" href="../../assets/css/form.css" />
    <!-- ADMIN DASHBOARD MENU CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash-menu.css" />
    <!-- ADMIN TABLE CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash/admin-table.css">
    <!-- ADMIN AGENT CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash/agent.css">
    <!-- ADMIN PRODUCTS CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash/products.css">
    <!-- MAIN TABLE CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash/main-table.css">
    <!-- WALLETS CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash/wallets.css" />
    <!-- DASHHBOARD MEDIA QUERIES -->
    <link rel="stylesheet" href="../../assets/css/media-queries/admin-dash-mediaqueries.css" />
    <title>Customer Wallets - CDS AGENT</title>
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
                    <span> CDS AGENT </span>
                </a>
            </div>
            <ul class="side-menu" id="side-menu">
                <li class="nav-item active">
                    <a href="./">
                        <i class="fa fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)">
                        <i class="fa fa-truck"></i>
                        <span>Shipping</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./wallets">
                        <i class="fa fa-usd"></i>
                        <span>Wallets</span>
                    </a>
                </li>
            </ul>

            <ul class="side-menu-bottom">
                <li class="nav-item logout">
                    <a href="../logout">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>
        <section class="page-wrapper">
            <div class="table-wrapper">
                <h2 class="table-title"><?php echo ucfirst($customer_details['last_name']) . " " . ucfirst($customer_details['first_name']) ?> Wallets</h2>

                <?php
                    $sql_customer_wallets = $db->query("SELECT *
                    FROM agent_wallets
                    INNER JOIN products ON agent_wallets.product_id = products.product_id
                    WHERE agent_customer_id='$cid' AND agent_id='$agent_id';");

                    if($sql_customer_wallets->num_rows === 0){
                ?>
                <div class="no-wallet-container">
                    <span>No wallets yet</span>
                    <a href="add_customer.html">Create new Wallet</a>
                </div>
                <?php
                    }else{
                ?>

                <div class="existing-wallet-view">
                    <div class="table-container">
                        <table id="view-wallets-table" class="main-table wallet-table">
                            <thead>
                                <tr>
                                    <th>
                                        Item picked
                                    </th>
                                    <th>
                                        Product ID
                                    </th>
                                    <th>
                                        Current balance
                                    </th>
                                    <th>
                                        Target
                                    </th>
                                    <th>
                                        Wallet Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($wallet_details = $sql_customer_wallets->fetch_assoc()){
                                ?>
                                <tr wallet-id="<?= $wallet_details['wallet_id'] ?>">
                                    <td>
                                        <div class="product-details-container">
                                            <div class="product-img-container">
                                                <?php
                                                    $product_image = explode(",", $wallet_details['pictures'])[0];
                                                ?>
                                                <img src="../admin/images/<?= $product_image ?>" alt="Product Image">
                                            </div>
                                            <div class="product-details">
                                                <span class="product-title"><?= $wallet_details['name'] ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="id-number">#<?php echo str_pad($wallet_details['product_id'], 4, "0", STR_PAD_LEFT) ?></span>
                                    </td>
                                    <td>
                                        NGN
                                        <?php 
                                            // echo($human_readable->format(intval($wallet_details['total_amount']))) 
                                            echo number_format(intval($wallet_details['total_amount']));
                                        ?>
                                    </td>
                                    <td>
                                        NGN 
                                        <?php 
                                            // echo($human_readable->format(intval($wallet_details['price']))) 
                                            echo number_format(intval($wallet_details['price']));
                                        ?>
                                    </td>
                                    <td>
                                        <span class="status-badge success">active</span>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="add-container">
                        <a href="javascript:void(0)" class="add-btn">Add to Wallet</a>
                        <a href="javascript:void(0)" class="delete-btn">Delete Wallet</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="add-to-account-wrapper hide">
        <div class="add-to-account-container">
            <div class="close-button">
                <i class="fa fa-times"></i>
            </div>
            <form id="add-to-account-form">
                <h1 class="form-title">Add to savings for <span id="product-name">Toyota Rav 4</span></h1>

                <p class="form-text">
                    Please make sure the information provided here are accurate
                </p>

                <div class="form-groupings">
                    <div class="form-group-container">
                        <h3 class="static-label">Current Balance</h3>
                        <span class="static-value">NGN <span id="curr-balance">2,000</span></span>
                    </div>

                    <div class="form-group-container">
                        <div class="form-group animate">
                            <input type="text" name="amount" id="amount" class="form-input format" placeholder=" "
                                required />
                            <label for="amount">Enter Amount</label>
                        </div>
                    </div>

                    <div class="form-group-container">
                        <div class="form-group animate">
                            <input type="password" name="pwd" id="pwd" class="form-input" placeholder=" " required />
                            <label for="pwd">Enter your password</label>
                        </div>
                    </div>

                    <div class="submit-btn-container">
                        <button type="submit">Confirm action</button>
                    </div>
                </div>
        </div>
        </form>
    </div>

    <div class="loader-wrapper hide">
        <div class="loader"></div>
    </div>

    <!-- FONT AWESOME JIT SCRIPT-->
    <script src="https://kit.fontawesome.com/3ae896f9ec.js" crossorigin="anonymous"></script>
    <!-- JQUERY SCRIPT -->
    <script src="../../assets/js/jquery/jquery-3.6.min.js"></script>
    <!-- JQUERY MIGRATE SCRIPT (FOR OLDER JQUERY PACKAGES SUPPORT)-->
    <script src="../../assets/js/jquery/jquery-migrate-1.4.1.min.js"></script>
    <!-- METIS MENU JS -->
    <script src="../../assets/js/metismenujs/metismenujs.js"></script>
    <!-- Sweet Alert JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- JQUERY DATATABLE SCRIPT -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <!-- JUST VALIDATE LIBRARY -->
        <script src="../../assets/js/just-validate/just-validate.js"></script>
    <!-- DASHBOARD SCRIPT -->
    <script src="../../assets/js/admin-dash.js"></script>
    <script>
        $(function () {
            let selectedWalletId = null;

            $("#view-wallets-table").DataTable({
                "pageLength": 10
            });

            // COVERT NUMBER TO READABLE FORM
            $('input.format').keyup(function (event) {
                // skip for arrow keys
                if (event.which >= 37 && event.which <= 40) return;

                // format number
                $(this).val(function (index, value) {
                    return value
                        .replace(/\D/g, "")
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });
            });

            // HANDLE PRODUCT DELETION
            $("#view-wallets-table tbody tr").each(function (e) {
                $(this).on("click", function (e) {
                    $("#view-wallets-table tbody tr").each(function () {
                        $(this).removeClass("active")
                    });

                    $(this).addClass("active");

                    selectedWalletId = $(this).attr("wallet-id");

                    console.log(selectedWalletId);
                });
            });


            // CLOSE BUTTON CLICK EVENT FOR MODAL
            $(".close-button").on("click", function(){
                $(".add-to-account-wrapper").addClass("hide");
            });

            $(".add-btn").on("click", function (e) {
                if (selectedWalletId === null) {
                    Swal.fire({
                        title: "No wallet selected",
                        icon: "info",
                        text: "please select a wallet",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    });
                } else {
                    const formData = new FormData();

                    formData.append("submit", true);
                    formData.append("wid", selectedWalletId);

                    // SENDING FORM DATA TO THE SERVER
                    $.ajax({
                        type: "post",
                        url: "controllers/fetch_wallet_details.php",
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        beforeSend: function () {
                            $(".loader-wrapper").removeClass("hide");
                        },
                        success: function (response) {
                            setTimeout(() => {
                                if (response.success === 1) {
                                    $(".loader-wrapper").addClass("hide");
                                    $("#curr-balance").html(response.balance.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                                    $("#product-name").html(response.name);
                                    $(".add-to-account-wrapper").removeClass("hide");
                                } else {
                                    $(".loader-wrapper").addClass("hide");

                                    if (response.error_title === "fatal") {
                                        // REFRESH CURRENT PAGE
                                        location.reload();
                                    } else {
                                        // ALERT USER
                                        Swal.fire({
                                            title: response.error_title,
                                            icon: "error",
                                            text: response.error_msg,
                                            allowOutsideClick: false,
                                            allowEscapeKey: false,
                                        });
                                    }
                                }
                            }, 1500);
                        },
                    });
                }
            });

            $(".delete-btn").on("click", function (e) {
                if (selectedWalletId === null) {
                    Swal.fire({
                        title: "No wallet selected",
                        icon: "info",
                        text: "please select a wallet",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    });
                } else {
                    const formData = new FormData();

                    formData.append("submit", true);
                    formData.append("wid", selectedWalletId);

                    // SENDING FORM DATA TO THE SERVER
                    $.ajax({
                        type: "post",
                        url: "controllers/delete_wallet.php",
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        beforeSend: function () {
                            $(".loader-wrapper").removeClass("hide");
                        },
                        success: function (response) {
                            setTimeout(() => {
                                if (response.success === 1) {
                                    $(".loader-wrapper").addClass("hide");

                                    // ALERT USER
                                    Swal.fire({
                                        title: "Wallet Delete",
                                        icon: "success",
                                        text: "Wallet deleted successfully",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                    });

                                    $(`tr[wallet-id='${selectedWalletId}']`).remove();
                                } else {
                                    $(".loader-wrapper").addClass("hide");

                                    if (response.error_title === "fatal") {
                                        // REFRESH CURRENT PAGE
                                        location.reload();
                                    } else {
                                        // ALERT USER
                                        Swal.fire({
                                            title: response.error_title,
                                            icon: "error",
                                            text: response.error_msg,
                                            allowOutsideClick: false,
                                            allowEscapeKey: false,
                                        });
                                    }
                                }
                            }, 1500);
                        },
                    });
                }
            });

            const validation = new JustValidate("#add-to-account-form", {
                errorFieldCssClass: "is-invalid",
            });

            validation
                .addField("#amount", [
                    {
                        rule: "required",
                        errorMessage: "Field is required",
                    },
                ])
                .addField("#pwd", [
                    {
                        rule: "minLength",
                        value: 6,
                    },
                    {
                        rule: "required",
                        errorMessage: "Please provide a password",
                    },
                ])
                .onSuccess((event) => {
                    const form = document.getElementById("add-to-account-form");

                    const formData = new FormData(form);
                    formData.append("submit", true);
                    formData.append("wid", selectedWalletId);
                    // CONVERTING FORMATTED(HUMAN READABLE) FIELDS BACK TO NUMBER 
                    const formatedFields = [];

                    for(let [key, value] of formData.entries()){
                        if(key === "amount"){
                            formatedFields.push(value);
                        }
                        console.log(`${key}: ${value}`);
                    }

                    const modifiedFormatedFields = formatedFields.map(value => value.replace(/,/g, ""));

                    formData.set("amount", modifiedFormatedFields[0]);


                    //SENDING FORM DATA TO ADD SAVINGS TO WALLET
                    $.ajax({
                        type: "post",
                        url: "controllers/update_wallet.php",
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        beforeSend: function () {
                            $(".submit-btn-container button").html("Updating...")
                            $(".submit-btn-container button").attr("disabled", true);
                        },
                        success: function (response) {
                            if (response.success === 1) {
                                // ALERT USER UPON SUCCESSFUL UPDATE
                                Swal.fire({
                                    title: "Wallet Updated",
                                    icon: "success",
                                    text: `You've updated this savings successfully`,
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    confirmButtonColor: '#2366B5',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.href = "./wallets?cid=<?= $cid ?>"
                                    }
                                })
                            } else {
                                $(".submit-btn-container button").html("Confirm action")
                                $(".submit-btn-container button").attr("disabled", false);

                                if (response.error_title === "fatal") {
                                    // REFRESH CURRENT PAGE
                                    location.reload();
                                } else {
                                    // ALERT USER
                                    Swal.fire({
                                        title: response.error_title,
                                        icon: "error",
                                        text: response.error_msg,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                    });
                                }
                            }
                        },
                    });

                });
        });
    </script>
</body>

</html>