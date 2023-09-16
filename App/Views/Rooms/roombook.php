<?php
use App\Models\Rooms; // Updated namespace for Rooms model
include "inc/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $room = new Rooms();
    $room->setType($_POST['troom']);
    $room->setBedding($_POST['bed']);
    
    if ($room->create()) {
        echo "<script type='text/javascript'> alert('Room added successfully')</script>";
    } else {
        echo "<script type='text/javascript'> alert('Error adding room')</script>";
    }
}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    NEW ROOM <small></small>
                </h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        ADD NEW ROOM
                    </div>
                    <div class="panel-body">
                        <form name="form" method="post">
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
                            <input type="submit" name="add" value="Add New" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        ROOMS INFORMATION
                    </div>
                    <div class="panel-body">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Room ID</th>
                                                <th>Room Type</th>
                                                <th>Bedding</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rooms = Rooms::all(); // Use Eloquent to fetch all rooms
                                            foreach ($rooms as $room) {
                                                echo "<tr class='" . ($room->id % 2 == 0 ? "odd gradeX" : "even gradeC") . "'>";
                                                echo "<td>" . $room->id . "</td>";
                                                echo "<td>" . $room->type . "</td>";
                                                echo "<td>" . $room->bedding . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Advanced Tables -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
