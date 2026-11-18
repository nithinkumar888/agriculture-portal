
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

?>

<!DOCTYPE html>
<html>

<?php require('fheader.php'); ?>

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

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <span class="badge badge-danger badge-pill mb-3">News</span>
            </div>
        </div>

        <div class="row row-content">
            <div class="col-md-12 mb-3">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card text-white bg-gradient-secondary mb-3">

                            <div class="card-header">
                                <span class="text-warning display-4">News List</span>
                            </div>

                            <div class="card-body text-dark">

                                <table class="table table-striped table-hover table-responsive table-bordered bg-gradient-white text-center display" id="myTable">

                                    <thead>
                                        <tr class="font-weight-bold text-default">
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Published</th>
                                            <th>Visit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                News feed temporarily unavailable.
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>

                            </div>

                        </div>

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
