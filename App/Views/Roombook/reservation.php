<?php

use App\Models\Roombook; // Updated namespace for Roombook model

require_once "./autoloader.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new Roombook();

    $code1 = $_POST['code1'];
    $code = $_POST['code'];

    if ($code1 != $code) {
        $msg = "Invalid code";
    } else {
        $email = $_POST['email'];
        $existingUser = Roombook::where('email', $email)->first(); // Use Eloquent to find by email

        if ($existingUser) {
            echo "<script type='text/javascript'> alert('User Already Exists')</script>";
        } else {
            $guest = new Roombook();

            // Set Eloquent model attributes
            $guest->title = $_POST['title'];
            $guest->fname = $_POST['fname'];
            $guest->lname = $_POST['lname'];
            $guest->email = $_POST['email'];
            $guest->nation = $_POST['nation'];
            $guest->country = $_POST['country'];
            $guest->phone = $_POST['phone'];
            $guest->troom = $_POST['troom'];
            $guest->bed = $_POST['bed'];
            $guest->nroom = $_POST['nroom'];
            $guest->meal = $_POST['meal'];
            $guest->cin = $_POST['cin'];
            $guest->cout = $_POST['cout'];
            $guest->calculateNumberOfDays();

            if ($guest->save()) {
                echo "<script type='text/javascript'> alert('Your Booking application has been sent')</script>";
            } else {
                echo "<script type='text/javascript'> alert('Error adding user to the database')</script>";
            }
        }
        $msg = "Your code is correct";
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESERVATION SUNRISE HOTEL</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="../index.php"><i class="fa fa-home"></i> Homepage</a>
                    </li>

                </ul>

            </div>

        </nav>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            RESERVATION <small></small>
                        </h1>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-5 col-sm-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                PERSONAL INFORMATION
                            </div>
                            <div class="panel-body">
                                <form name="form" method="post">
                                    <div class="form-group">
                                        <label>Title*</label>
                                        <select name="title" class="form-control" required>
                                            <option value="" selected></option>
                                            <option value="Dr.">Dr.</option>
                                            <option value="Miss.">Miss.</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Prof.">Prof.</option>
                                            <option value="Rev .">Rev .</option>
                                            <option value="Rev . Fr">Rev . Fr .</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="fname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="lname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nationality</label>
                                        <input name="nation" class="form-control" required>
                                    </div>
                                    <?php
                                    $countries = array(/* ... List of countries ... */);
                                    ?>
                                    <div class="form-group">
                                        <label>Passport Country*</label>
                                        <select name="country" class="form-control" required>
                                            <option value="" selected></option>
                                            <?php
                                            foreach ($countries as $key => $value) :
                                                echo '<option value="' . $value . '">' . $value . '</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input name="phone" type="text" class="form-control" required>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    RESERVATION INFORMATION
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Type Of Room *</label>
                                        <select name="troom" class="form-control" required>
                                            <option value="" selected></option>
                                            <option value="Superior Room">SUPERIOR ROOM</option>
                                            <option value="Deluxe Room">DELUXE ROOM</option>
                                            <option value="Guest House">GUEST HOUSE</option>
                                            <option value="Single Room">SINGLE ROOM</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bedding Type</label>
                                        <select name="bed" class="form-control" required>
                                            <option value="" selected></option>
                                            <option value="Single">Single</option>
                                            <option value="Double">Double</option>
                                            <option value="Triple">Triple</option>
                                            <option value="Quad">Quad</option>
                                            <option value="None">None</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>No.of Rooms *</label>
                                        <select name="nroom" class="form-control" required>
                                            <option value="" selected></option>
                                            <?php
                                            for ($i = 1; $i <= 7; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Meal Plan</label>
                                        <select name="meal" class="form-control" required>
                                            <option value="" selected></option>
                                            <option value="Room only">Room only</option>
                                            <option value="Breakfast">Breakfast</option>
                                            <option value="Half Board">Half Board</option>
                                            <option value="Full Board">Full Board</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Check-In</label>
                                        <input name="cin" type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Check-Out</label>
                                        <input name="cout" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="well">
                                <h4>HUMAN VERIFICATION</h4>
                                <p>Type Below this code <?php $Random_code = rand();
                                                        echo $Random_code; ?> </p><br />
                                <p>Enter the random code<br /></p>
                                <input type="text" name="code1" title="random code" />
                                <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>

</html>
