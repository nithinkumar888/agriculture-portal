
<?php
include('fsession.php');
ini_set('memory_limit', '-1');

if (!isset($_SESSION['farmer_login_user'])) {
    header("location: ../index.php");
    exit;
}

$query4 = "SELECT * FROM farmerlogin WHERE email='$user_check'";
$ses_sq4 = mysqli_query($conn, $query4);
$row4 = mysqli_fetch_assoc($ses_sq4);

$para1 = $row4['farmer_id'] ?? '';
$para2 = $row4['farmer_name'] ?? '';

$display_district = "SELECT F_District FROM farmerlogin WHERE email='$user_check'";
$display_district_result = mysqli_query($conn, $display_district);
$display_district_name = mysqli_fetch_array($display_district_result);

$District_name_farmer = $display_district_name[0] ?? '';

date_default_timezone_set("Asia/Kolkata");

$city_weather_id = "1253952";
$cityId = $city_weather_id;

// Weather API temporarily disabled until a new secure API key is configured.
$forecast = [];
?>

<!DOCTYPE html>
<html>

<?php include('fheader.php'); ?>

<body class="bg-white" id="top">

<?php include('fnav.php'); ?>

<section class="section section-shaped section-lg">

    <div class="shape shape-style-1 shape-primary">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <span class="badge badge-danger badge-pill mb-3">
                    Weather Forecast
                </span>
            </div>
        </div>

        <div class="row row-content">
            <div class="col-md-12 mb-3">

                <div class="card text-white bg-gradient-secondary mb-3">

                    <div class="card-header">
                        <span class="text-warning">
                            Weather Forecast
                        </span>
                    </div>

                    <div class="card-body text-dark">

                        <div class="alert alert-info text-center">
                            Weather forecast is temporarily unavailable.
                            It will be restored after secure API configuration.
                        </div>

                        <table class="table table-striped table-hover table-bordered bg-gradient-white text-center display" id="myTable">

                            <thead>
                                <tr class="font-weight-bold text-default">
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Temperature (Max / Min)</th>
                                    <th>Description</th>
                                    <th>Humidity</th>
                                    <th>Wind</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td colspan="6">
                                        No weather forecast data available.
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
        </div>

    </div>

</section>

<?php require("footer.php"); ?>

<script>
$(document).ready(function () {
    $('#myTable').DataTable();
});
</script>

</body>
</html>
