<?php
    require(dirname(dirname(dirname(__DIR__))) . '/auth-library/resources.php');
    AgentAuth::User("a/login");

    $agent_id = $_SESSION['agent_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Custom Fonts (Inter) -->
    <link rel="stylesheet" href="../../../assets/fonts/fonts.css" />
    <!-- BASE CSS -->
    <link rel="stylesheet" href="../../../assets/css/base.css" />
    <!-- FORM CSS -->
    <link rel="stylesheet" href="../../../assets/css/form.css" />
    <!-- ADMIN FORM CSS -->
    <link rel="stylesheet" href="../../../assets/css/dashboard/admin-dash/admin-form.css">
    <!-- ADMIN DASHBOARD MENU CSS -->
    <link rel="stylesheet" href="../../../assets/css/dashboard/admin-dash-menu.css" />
    <!-- DASHHBOARD MEDIA QUERIES -->
    <link rel="stylesheet" href="../../../assets/css/media-queries/admin-dash-mediaqueries.css" />
    <title>Add a new agent - CDS ADMIN</title>
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
                <li class="nav-item">
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
                <li class="nav-item active">
                    <a href="./easybuy/">
                        <i class="fa fa-usd"></i>
                        <span>Easy Buy</span>
                    </a>
                </li>
            </ul>

            <ul class="side-menu-bottom">
                <li class="nav-item logout">
                    <a href="../../logout">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>
        <section class="page-wrapper">
            <header class="dash-header">
                <a href="./" class="back-link">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </header>
            <div class="product-form-wrapper">
                <h2 class="product-form-title">Register an EasyBuy Customer</h2>

                <div class="product-form-container">
                    <form id="customer-upload-form">
                        <div class="form-groupings">
                            <div class="form-group-container">
                                <div class="form-group-container">
                                    <div class="image-upload-container">
                                        <img src="../../../assets/images/default-picture.png" alt="profile" />
                                        <div class="action-container">
                                            <input type="file" name="customer-img" id="customer-img" onchange="previewImage(event)"/>
                                            <label for="customer-img"><i class="fa fa-pen"></i> Add image</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="text" name="fname" id="fname" class="form-input" placeholder=" "
                                            required />
                                        <label for="fname">First Name</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="text" name="lname" id="lname" class="form-input"
                                            placeholder=" " required />
                                        <label for="lname">Last Name</label>
                                    </div>
                                </div>

                                <!-- <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="text" name="oname" id="oname"
                                            class="form-input" placeholder=" " required />
                                        <label for="oname">Other Name</label>
                                    </div>
                                </div> -->

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="text" name="oaddress" id="oaddress" class="form-input" placeholder=" " />
                                        <label for="oaddress">Office Address</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="text" name="haddress" id="haddress" class="form-input" placeholder=" " />
                                        <label for="haddress">Home Address</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="email" name="email" id="email" class="form-input"
                                            placeholder=" " />
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="number" name="phoneno" id="phoneno" class="form-input" placeholder=" " required />
                                        <label for="phoneno">Phone</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="text" name="bvn" id="bvn" class="form-input" placeholder=" " required />
                                        <label for="bvn">BVN (Bank Verification Number)</label>
                                        <div class="confirmation-container hide">
                                            <img src="../../../assets/images/loading-gif.gif" class="" alt="loader">
                                            <i class="fa fa-check hide" title="This BVN is valid"></i>
                                            <i class="fa fa-times hide" title="Not a valid BVN"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-group-container">
                                    <div class="form-group animate">
                                        <select name="productId" id="productId" class="form-input">
                                            <option value="">Select product</option>
                                            <?php
                                                // $sql_all_products = $db->query("SELECT * FROM products");

                                                // while($product = $sql_all_products->fetch_assoc()){
                                            ?>
                                                <option value="<?php echo $product['product_id'] ?>"><?php echo $product['name'] . " (" . "NGN ". number_format($product['price']) . ")" ?></option>
                                            <?php
                                                // }
                                            ?>
                                        </select>
                                        <label for="productId">Select Product</label>
                                    </div>
                                </div> -->

                                <div class="submit-btn-container">
                                    <button type="submit" class="admin-submit-btn">Register Customer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- FONT AWESOME JIT SCRIPT-->
    <script src="https://kit.fontawesome.com/3ae896f9ec.js" crossorigin="anonymous"></script>
    <!-- JQUERY SCRIPT -->
    <script src="../../../assets/js/jquery/jquery-3.6.min.js"></script>
    <!-- JQUERY MIGRATE SCRIPT (FOR OLDER JQUERY PACKAGES SUPPORT)-->
    <script src="../../../assets/js/jquery/jquery-migrate-1.4.1.min.js"></script>
    <!-- METIS MENU JS -->
    <script src="../../../assets/js/metismenujs/metismenujs.js"></script>
    <!-- SWEET ALERT PLUGIN -->
    <script src="../../../auth-library/vendor/dist/sweetalert2.all.min.js"></script>
    <!-- JUST VALIDATE LIBRARY -->
    <script src="../../../assets/js/just-validate/just-validate.js"></script>
    <!-- DASHBOARD SCRIPT -->
    <script src="../../../assets/js/admin-dash.js"></script>
    <script>
        function previewImage(e){
            const [file] = e.target.files;

            if(file){
                $(".image-upload-container img").attr("src", URL.createObjectURL(file));
            }
        }
        //FORM VALIDATION WITH VALIDATE.JS

        const validation = new JustValidate("#customer-upload-form", {
            errorFieldCssClass: "is-invalid",
        });

        validation
            .addField("#customer-img", [
                {
                    rule: 'minFilesCount',
                    value: 1,
                },
                {
                    rule: 'maxFilesCount',
                    value: 1,
                },
                {
                    rule: 'files',
                    value: {
                        files: {
                            extensions: ['jpeg', 'png', 'jpg'],
                            maxSize: 3000000,
                            minSize: 1000,
                            types: ['image/jpeg', 'image/jpg', 'image/png'],
                        },
                    },
                },
            ])
            .addField("#fname", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            .addField("#lname", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            // .addField("#oname", [
            //     {
            //         rule: "required",
            //         errorMessage: "Field is required",
            //     },
            // ])
            .addField('#email', [
                {
                    rule: 'email',
                    errorMessage: 'Email is invalid!',
                },
            ])
            .addField("#phoneno", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            .addField("#bvn", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            .addField("#haddress", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            .addField("#oaddress", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            .onSuccess((event) => {
                const form = document.getElementById("customer-upload-form");

                // GATHERING FORM DATA
                const formData = new FormData(form);
                formData.append("submit", true);

                //SENDING FORM DATA TO THE SERVER
                $.ajax({
                    type: "post",
                    url: "controllers/add_customer.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {
                        $(".submit-btn-container button").html("Adding...");
                        $(".submit-btn-container button").attr("disabled", true);
                    },
                    success: function (response) {
                        setTimeout(() => {
                            if (response.success === 1) {
                                // ALERT USER UPON SUCCESSFUL UPLOAD
                                Swal.fire({
                                    title: "Customer Added",
                                    icon: "success",
                                    text: `You've added a customer successfully`,
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    confirmButtonColor: '#2366B5',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.href = "./"
                                    }
                                })
                            } else {
                                $(".submit-btn-container button").attr("disabled", false);
                                $(".submit-btn-container button").html("Register");

                                if (response.error_title === "fatal") {
                                    // REFRESH CURRENT PAGE
                                    location.reload();
                                } else {
                                    // ALERT USER
                                    Swal.fire({
                                        title: response.error_title,
                                        icon: "error",
                                        text: response.error_message,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                    });
                                }
                            }
                        }, 1500);
                    },
                });
            });
    </script>
</body>

</html>