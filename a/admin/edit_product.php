<?php
  require(dirname(dirname(__DIR__)) . '/auth-library/resources.php');
  AdminAuth::User("a/login");
  
  if(isset($_GET['pid']) && !empty($_GET['pid'])){
    $pid = $_GET['pid'];

    $sql_product = $db->query("SELECT * FROM products WHERE product_id={$pid}");
    $sql_product_meta = $db->query("SELECT * FROM product_meta WHERE product_id={$pid}");

    $product_details = $sql_product->fetch_assoc();
    $product_meta_details = $sql_product_meta->fetch_assoc();
  }else{
    header("Location: ./products");
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
    <!-- FORM CSS -->
    <link rel="stylesheet" href="../../assets/css/form.css" />
    <!-- ADMIN FORM CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash/admin-form.css">
    <!-- ADMIN DASHBOARD MENU CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash-menu.css" />
    <!-- DASHHBOARD MEDIA QUERIES -->
    <link rel="stylesheet" href="../../assets/css/media-queries/admin-dash-mediaqueries.css" />
    <title>Edit <?php echo($product_details['name']); ?> - CDS ADMIN</title>
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
                <a href="#" class="logo">
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
                    <a href="#">
                        <i class="fa fa-signal"></i>
                        <span>Statistics</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fa fa-usd"></i>
                        <span>Payments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fa fa-recycle"></i>
                        <span>Shipping</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="products">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Team</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fa fa-commenting-o"></i>
                        <span>Messages</span>
                    </a>
                </li>
            </ul>

            <ul class="side-menu-bottom">
                <li class="nav-tem">
                    <a href="#">
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
                <a href="products" class="back-link">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </header>
            <div class="product-form-wrapper">
                <h2 class="product-form-title">Edit Product Details</h2>

                <div class="product-form-container">
                    <form id="product-upload-form">
                        <div class="form-groupings">
                            <div class="form-group-container">
                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="text" name="pname" id="pname" class="form-input" placeholder=" "
                                            required value="<?php echo($product_details['name']); ?>" />
                                        <label for="pname">Product Name</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="text" name="pprice" id="pprice" class="form-input format"
                                            placeholder=" " required value="<?php echo(round(intval($product_details['price']), 0)); ?>" />
                                        <label for="pprice">Price</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="text" name="daily_payment" id="daily_payment"
                                            class="form-input format" placeholder=" " required value="<?php echo($product_meta_details['daily_payment']); ?>" />
                                        <label for="daily_payment">Daily Payment</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="number" name="duration" id="duration" class="form-input"
                                            placeholder=" " required value="<?php echo($product_meta_details['duration_in_months']); ?>" />
                                        <label for="duration">Duration in months</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group textarea animate">
                                        <textarea name="pdesc" id="pdesc" class="form-input" placeholder=" " required><?php echo($product_details['details']); ?></textarea>
                                        <label for="pdesc">Enter product details here</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <input type="file" multiple name="pimages[]" id="pimages" class="form-input"
                                            placeholder=" " required />
                                        <label for="pimages">Upload media</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                        <select name="category" id="category">
                                            <option value="">Choose category</option>
                                            <?php 
                                                $sql_categories = $db->query("SELECT * FROM product_categories");
                                                while($row_category = $sql_categories->fetch_assoc()){
                                            ?>
                                                <option <?php echo($product_details['category'] === $row_category['category_id']? "selected" : "");?> value="<?php echo($row_category['category_id']); ?>"><?php echo($row_category['category_name']); ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <label for="active">Active</label>
                                    </div>
                                </div>

                                <div class="form-group-container">
                                    <div class="form-group animate">
                                       <select name="active" id="active">
                                        <option value="">Choose option</option>
                                        <?php
                                            $isProductActive = $product_details['active'];
                                        ?>
                                        <option <?php echo($isProductActive == 1? "selected" : ""); ?> value="1">Yes</option>
                                        <option <?php echo($isProductActive == 0? "selected" : ""); ?> value="0">No</option>
                                       </select>
                                        <label for="active">Active</label>
                                    </div>
                                </div>

                                <div class="submit-btn-container">
                                    <button type="submit" class="admin-submit-btn">Save Changes</button>
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
    <script src="../../assets/js/jquery/jquery-3.6.min.js"></script>
    <!-- JQUERY MIGRATE SCRIPT (FOR OLDER JQUERY PACKAGES SUPPORT)-->
    <script src="../../assets/js/jquery/jquery-migrate-1.4.1.min.js"></script>
    <!-- METIS MENU JS -->
    <script src="../../assets/js/metismenujs/metismenujs.js"></script>
    <!-- SWEET ALERT PLUGIN -->
    <script src="../../auth-library/vendor/dist/sweetalert2.all.min.js"></script>
      <!-- JUST VALIDATE LIBRARY -->
  <script src="../../assets/js/just-validate/just-validate.js"></script>
    <!-- DASHBOARD SCRIPT -->
    <script src="../../assets/js/admin-dash.js"></script>
    <script>
        // CHANGE DEFAULT NUMBER TO READABLE FORM 
        $("input.format").val(function (index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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

        //RESET TEXTAREA CURSOR
        function setSelectionRange(input, selectionStart, selectionEnd) {
            if (input.setSelectionRange) {
                input.focus();
                input.setSelectionRange(selectionStart, selectionEnd);
            }
            else if (input.createTextRange) {
                var range = input.createTextRange();
                range.collapse(true);
                range.moveEnd('character', selectionEnd);
                range.moveStart('character', selectionStart);
                range.select();
            }
        }

        function setCaretToPos (input, pos) {
            setSelectionRange(input, pos, pos);
        }

        $("#pdesc").on("click", function(){
            if($("#pdesc").val().trim().length === 0) {
                setCaretToPos(document.getElementById("pdesc"));
            }
        });

        //FORM VALIDATION WITH VALIDATE.JS

        const validation = new JustValidate("#product-upload-form", {
            errorFieldCssClass: "is-invalid",
        });

        validation
            .addField("#pname", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            .addField("#pprice", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            .addField("#daily_payment", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            .addField("#duration", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            .addField("#pdesc", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            .addField("#active", [
                {
                    rule: "required",
                    errorMessage: "Field is required",
                },
            ])
            .addField("#pimages", [
                {
                    rule: 'minFilesCount',
                    value: 1,
                },
                {
                    rule: 'maxFilesCount',
                    value: 3,
                },
                {
                    rule: 'files',
                    value: {
                        files: {
                            extensions: ['jpeg', 'png', "jpg"],
                            maxSize: 3000000,
                            minSize: 1000,
                            types: ['image/jpeg', 'image/png'],
                        },
                    },
                },
            ])
            .onSuccess((event) => {
                const form = document.getElementById("product-upload-form");

                // GATHERING FORM DATA
                const formData = new FormData(form);
                formData.append("submit", true);
                formData.append("product_id", <?php echo($product_details['product_id']); ?>)

                // CONVERTING FORMATTED(HUMAN READABLE) FIELDS BACK TO NUMBER 
                const formatedFields = [];

                for (let [key, value] of formData.entries()) {
                    if (key === "daily_payment" || key === "pprice") {
                        formatedFields.push(value);
                    }
                }

                const modifiedFormatedFields = formatedFields.map(value => value.replace(/,/g, ""));

                formData.set("pprice", modifiedFormatedFields[0]);
                formData.set("daily_payment", modifiedFormatedFields[1]);

                for (let [key, value] of formData.entries()) {
                    console.log(`${key}: ${value}`);
                }

                //SENDING FORM DATA TO THE SERVER
                $.ajax({
                    type: "post",
                    url: "controllers/edit_product.php",
                    data: formData,
                    cache: false,
                    contentType: false,
                    enctype: "multipart/form-data",
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {
                        $(".submit-btn-container button").html("Editing...");
                        $(".submit-btn-container button").attr("disabled", true);
                    },
                    success: function (response) {
                        setTimeout(() => {
                            if (response.success === 1) {
                                // ALERT USER UPON SUCCESSFUL UPLOAD
                                Swal.fire({
                                    title: "Product Edited",
                                    icon: "success",
                                    text: `You've Edited ${response.product_name} successfully`,
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    confirmButtonColor: '#2366B5',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.href = "products"
                                    }
                                })
                            } else {
                                $(".submit-btn-container button").attr("disabled", false);
                                $(".submit-btn-container button").html("Save Changes");

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
            });
    </script>
</body>

</html>