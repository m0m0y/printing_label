<!DOCTYPE html>
<html lang="en">

<head>
	<title>Inmed Printing Label</title>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="lib/dist/sweetalert2.min.css">
    <script src="lib/dist/sweetalert2.min.js"></script>

    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="lib/bootstrap/js/bootstrap.min.js"></script> -->

    <script src="lib/jquery/jquery.js"></script>
</head>

<style>
.container {
    max-width: 850px;
}
</style>

<body>
    <div class="wrapper">
        <div class="container">

            <?php 
                if (isset($_GET["watson"])) {
                    ?>
                    <div class="card mt-3">

                        <div class="bg-color">
                            <div class="logo_container">
                                <img class="inmed_logo" src="https://inmed.com.ph/static/inmed_logo.png" alt="inmed logo">
                                <p class="address">Inmed Corporation <br>
                                    5 Calle Industria, Bagumbayan, <br>
                                    Quezon City 1110 Philippines</p>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="alert alert-warning" role="alert">
                                <b>Warning!</b> Please avoid using '#' to this form. 
                            </div>

                            <div class="form-floating mt-3">
                                <input type="text" name="supplier_name" id="supplier_name" class="form-control" autocomplete="off" required>
                                <label for="floatingSelect">Supplier Name: <span class="required">*</span></label>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="number" name="po_number" id="po_number" class="form-control" autocomplete="off" required>
                                        <label for="floatingSelect">PO Number: <span class="required">*</span></label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="number" name="si_number" id="si_number" class="form-control" autocomplete="off" required>
                                        <label for="floatingSelect">SI Number: <span class="required">*</span></label>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-4">
                                <div class="col col-sm-6 line-right">
                                    <div class="form-floating mb-3">
                                        <input type="date" name="date" id="date" class="form-control" value="<?= date("Y-m-d") ?>"autocomplete="off" required>
                                        <label for="floatingSelect">Printing Date: <span class="required">*</span></label>
                                    </div>
                                </div>
                                
                                <div class="col col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="quantity" id="quantity" class="form-control" autocomplete="off" required>
                                        <label for="floatingSelect">Quantity <span class="required">*</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Description: <span class="required">*</span></label>
                                <textarea class="form-control" id="description" rows="3"></textarea>
                            </div>

                            <div class="footer_container mt-3">
                                <small>© 2022. INMED CORPORATION ALL RIGHTS RESERVED.</small>

                                <div class="d-flex justify-content-between">
                                    <a href="index.php" class="btn btn-link text-decoration-none">Back</a>
                                    <button type="submit" class="btn btn-md btn-primary align-right" id="submitt">Print</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php
                } else {
                    ?>
                    <div class="card mt-3">

                        <div class="bg-color">
                            <div class="logo_container">
                                <img class="inmed_logo" src="https://inmed.com.ph/static/inmed_logo.png" alt="inmed logo">
                                <p class="address">Inmed Corporation <br>
                                    5 Calle Industria, Bagumbayan, <br>
                                    Quezon City 1110 Philippines</p>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="alert alert-warning" role="alert">
                                <b>Warning!</b> Please avoid using '#' to this form. 
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="number" name="order_referenceNo" id="order_referenceNo" class="form-control" autocomplete="off" required>
                                        <label for="floatingSelect">Order Reference: <span class="required">*</span></label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating">
                                        <input type="number" name="our_referenceNo" id="our_referenceNo" class="form-control" autocomplete="off" required>
                                        <label for="floatingSelect">Invoice Number: <span class="required">*</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mt-3">
                                <input type="text" name="customer_name" id="customer_name" class="form-control" autocomplete="off" required>
                                <label for="floatingSelect">Customer Name: <span class="required">*</span></label>
                            </div>

                            <div class="form-floating mt-3">
                                <input type="text" name="ship_address" id="ship_address" class="form-control" autocomplete="off" required>
                                <label for="floatingSelect">Shipping Address: <span class="required">*</span></label>
                            </div>

                            <hr>

                            <div class="row mt-4">
                                <div class="col col-sm-6 line-right">
                                    <div class="form-floating mb-3">
                                        <input type="date" name="order_date" id="order_date" class="form-control" autocomplete="off" required>
                                        <label for="floatingSelect">Order Date: <span class="required">*</span></label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="number" name="package" id="package" class="form-control" autocomplete="off" required>
                                        <label for="floatingSelect">Package: <span class="required">*</span></label>
                                    </div>
                                </div>
                                
                                <div class="col col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" name="print_date" id="print_date" class="form-control" value="<?= date("Y-m-d") ?>"autocomplete="off" required>
                                        <label for="floatingSelect">Print Date: <span class="required">*</span></label>
                                    </div>

                                    <div class="form-floating">
                                        <select name="ship_via" id="ship_via" class="form-control">
                                            <option value="" selected disabled>-- Select Courier -- </option>
                                            <option value="Lalamove">Lalamove</option>
                                            <option value="Grab">Grab</option>
                                            <option value="Lex PH">Lex PH</option>
                                            <option value="Pickup">Pickup</option>
                                            <option value="Van">Van</option>
                                            <option value="Forwarder">Forwarder</option>
                                            <option value="Sea">Sea</option>
                                            <option value="Air">Air</option>
                                        </select>
                                        <label for="floatingSelect">Ship via: <span class="required">*</span></label>
                                    </div>
                                </div>                            
                            </div>

                            <div class="form-floating mt-3">
                                <input type="text" name="remarks" id="remarks" class="form-control" autocomplete="off" required>
                                <label for="floatingSelect">Remarks: </label>
                            </div>

                            <div class="footer_container mt-3">
                                <small>© 2022. INMED CORPORATION ALL RIGHTS RESERVED.</small>

                                <div class="d-flex justify-content-between">
                                    <a href="?watson" class="btn btn-link text-decoration-none">Watson Sticker Label</a>
                                    <button type="submit" class="btn btn-md btn-primary align-right" id="submit">Print</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php
                }
            ?>
        </div>
    </div>

    <script src="assets/js/main.js"></script>
</body>

</html>