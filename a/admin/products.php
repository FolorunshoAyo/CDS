<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- JQUERY DATATABLES CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <!-- DROP DOWN MENU CSS -->
    <link rel="stylesheet" href="../../assets/css/dropdown.css" />
    <!-- Custom Fonts (Inter) -->
    <link rel="stylesheet" href="../../assets/fonts/fonts.css" />
    <!-- BASE CSS -->
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <!-- ADMIN DASHBOARD MENU CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash-menu.css" />
    <!-- ADMIN TABLE CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash/admin-table.css">
    <!-- ADMIN PRODUCTS CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard/admin-dash/products.css">
    <!-- DASHHBOARD MEDIA QUERIES -->
    <link rel="stylesheet" href="../../assets/css/media-queries/admin-dash-mediaqueries.css" />
    <title>Products - CDS</title>
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
            <div class="table-wrapper">
                <h2 class="table-title">All Products</h2>

                <div class="table-container">
                    <table id="products-table" class="main-table">
                        <thead>
                            <tr>
                                <th>
                                    Product Details
                                </th>
                                <th>
                                    Product ID
                                </th>
                                <th>
                                    Date added
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="product-details-container">
                                        <div class="product-img-container">
                                            <img src="../../assets/images/4-runner.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-details">
                                            <span class="product-title">Toyota RAV 4</span>
                                            <span class="product-span">Added a month ago</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="productid-container">
                                        <span class="id-number">#09878</span>
                                        <span class="productid-date">Aug 19 2022</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-added-container">
                                        <span class="date-added">Aug 19, 2022</span>
                                        <span class="time-added">6:30PM</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge danger">OFS</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" data-dd-target="1" aria-label="Dropdown Menu">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" data-dd-path="1">
                                            <a class="dropdown-menu__link" href="#">Edit product</a>
                                            <a class="dropdown-menu__link deleteEl" href="#" data-productId="3">Delete
                                                product</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-details-container">
                                        <div class="product-img-container">
                                            <img src="../../assets/images/4-runner.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-details">
                                            <span class="product-title">Toyota RAV 4</span>
                                            <span class="product-span">Added a month ago</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="productid-container">
                                        <span class="id-number">#09878</span>
                                        <span class="productid-date">Aug 19 2022</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-added-container">
                                        <span class="date-added">Aug 19, 2022</span>
                                        <span class="time-added">6:30PM</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge danger">OFS</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" data-dd-target="2" aria-label="Dropdown Menu">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" data-dd-path="2">
                                            <a class="dropdown-menu__link" href="#">Edit product</a>
                                            <a class="dropdown-menu__link deleteEl" href="#" data-productId="3">Delete
                                                product</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-details-container">
                                        <div class="product-img-container">
                                            <img src="../../assets/images/4-runner.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-details">
                                            <span class="product-title">Toyota RAV 4</span>
                                            <span class="product-span">Added a month ago</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="productid-container">
                                        <span class="id-number">#09878</span>
                                        <span class="productid-date">Aug 19 2022</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-added-container">
                                        <span class="date-added">Aug 19, 2022</span>
                                        <span class="time-added">6:30PM</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge danger">OFS</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" data-dd-target="3" aria-label="Dropdown Menu">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" data-dd-path="3">
                                            <a class="dropdown-menu__link" href="#">Edit product</a>
                                            <a class="dropdown-menu__link deleteEl" href="#" data-productId="3">Delete
                                                product</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-details-container">
                                        <div class="product-img-container">
                                            <img src="../../assets/images/4-runner.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-details">
                                            <span class="product-title">Toyota RAV 4</span>
                                            <span class="product-span">Added a month ago</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="productid-container">
                                        <span class="id-number">#09878</span>
                                        <span class="productid-date">Aug 19 2022</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-added-container">
                                        <span class="date-added">Aug 19, 2022</span>
                                        <span class="time-added">6:30PM</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge danger">OFS</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" data-dd-target="4" aria-label="Dropdown Menu">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" data-dd-path="4">
                                            <a class="dropdown-menu__link" href="#">Edit product</a>
                                            <a class="dropdown-menu__link deleteEl" href="#" data-productId="3">Delete
                                                product</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-details-container">
                                        <div class="product-img-container">
                                            <img src="../../assets/images/4-runner.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-details">
                                            <span class="product-title">Toyota RAV 4</span>
                                            <span class="product-span">Added a month ago</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="productid-container">
                                        <span class="id-number">#09878</span>
                                        <span class="productid-date">Aug 19 2022</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-added-container">
                                        <span class="date-added">Aug 19, 2022</span>
                                        <span class="time-added">6:30PM</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge danger">OFS</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" data-dd-target="5" aria-label="Dropdown Menu">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" data-dd-path="5">
                                            <a class="dropdown-menu__link" href="#">Edit product</a>
                                            <a class="dropdown-menu__link deleteEl" href="#" data-productId="3">Delete
                                                product</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-details-container">
                                        <div class="product-img-container">
                                            <img src="../../assets/images/4-runner.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-details">
                                            <span class="product-title">Toyota RAV 4</span>
                                            <span class="product-span">Added a month ago</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="productid-container">
                                        <span class="id-number">#09878</span>
                                        <span class="productid-date">Aug 19 2022</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-added-container">
                                        <span class="date-added">Aug 19, 2022</span>
                                        <span class="time-added">6:30PM</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge danger">OFS</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" data-dd-target="6" aria-label="Dropdown Menu">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" data-dd-path="6">
                                            <a class="dropdown-menu__link" href="#">Edit product</a>
                                            <a class="dropdown-menu__link deleteEl" href="#" data-productId="3">Delete
                                                product</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-details-container">
                                        <div class="product-img-container">
                                            <img src="../../assets/images/4-runner.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-details">
                                            <span class="product-title">Toyota RAV 4</span>
                                            <span class="product-span">Added a month ago</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="productid-container">
                                        <span class="id-number">#09878</span>
                                        <span class="productid-date">Aug 19 2022</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-added-container">
                                        <span class="date-added">Aug 19, 2022</span>
                                        <span class="time-added">6:30PM</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge danger">OFS</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" data-dd-target="7" aria-label="Dropdown Menu">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" data-dd-path="7">
                                            <a class="dropdown-menu__link" href="#">Edit product</a>
                                            <a class="dropdown-menu__link deleteEl" href="#" data-productId="3">Delete
                                                product</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="add-container">
                    <a href="add_product">Add Product</a>
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
    <!-- Sweet Alert JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- JQUERY DATATABLE SCRIPT -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <!-- DROP DOWN JS -->
    <script type="text/javascript" src="../../assets/js/dropdown/dropdown.min.js"></script>
    <!-- DASHBOARD SCRIPT -->
    <script src="../../assets/js/admin-dash.js"></script>
    <script>
        $(function () {
            $("#products-table").DataTable({
                "pageLength": 10
            });

            // HANDLE PRODUCT DELETION
            $(".deleteEl").each(function () {
                $(this).on("click", function (e) {
                    e.preventDefault();

                    const selectedProductId = $(this).attr("data-productId");

                    $.post("controllers/deleteProduct.php", { pid: selectedProductId, submit: true }, function (response) {
                        if (reponse.success === 1) {
                            // ALERT ADMIN
                            Swal.fire({
                                title: response.title,
                                icon: "success",
                                text: response.message,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                            });

                            // REMOVE PRODUCT FROM RECORDS
                            $(this).parent().parent().parent().parent()[0].remove();
                        } else {
                            Swal.fire({
                                title: response.error_title,
                                icon: "error",
                                text: response.error_message,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                            });
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>