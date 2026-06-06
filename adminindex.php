<?php
include("header.php");
if(!isset($_SESSION['email'])){ //check
    echo "<script>window.location.assign('adminlogin.php?msg=Please Login!!')</script>";
}
?>
<section class="my-5 p-5 w3l-specification-6">
<div class="card py-5">
    <div class="container py-lg-5">
        <div class="row story-6-grids">
            <div class="col-lg-10 story-gd pl-lg-4 text-center mx-auto">
                <div class="px-lg-5">
                    <h1 class="sub-title">Dashboard</h1>
                    <h3 class="hny-title two">Welcome Admin</h3>
                    <p class="mt-3 mb-lg-5 px-lg-5 counter-para"></p>
                </div>
                <div class="skill_info mt-lg-5 mt-4 pt-lg-4">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 stats_left">
                            <div class="counter_grid">
                                <div class="icon_info">
                                    <?php
                                    include("config.php");
                                    $query="SELECT count(*) as total_user from `user`";
                                    $result=mysqli_query($connect,$query);
                                    $data=mysqli_fetch_assoc($result);
                                    echo "<p class='counter'>$data[total_user]</p>";
                                    ?>
                                    <h4 class="text-dark">Number of Donors</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 stats_left">
                            <div class="counter_grid">
                                <div class="icon_info">
                                    <?php
                                    $query="SELECT count(*) as total_ngo from `ngo`";
                                    $result=mysqli_query($connect,$query);
                                    $data=mysqli_fetch_assoc($result);
                                    echo "<p class='counter'>$data[total_ngo]</p>";
                                    ?>
                                    <h4 class="text-dark">NGO Connected</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 stats_left">
                            <div class="counter_grid">
                                <div class="icon_info">
                                    <?php
                                    $query="SELECT count(*) as total_food from `food`";
                                    $result=mysqli_query($connect,$query);
                                    $data=mysqli_fetch_assoc($result);
                                    echo "<p class='counter'>$data[total_food]</p>";
                                    ?>
                                    <h4 class="text-dark">Donations</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 stats_left">
                            <div class="counter_grid">
                                <div class="icon_info">
                                    <?php
                                    $query="SELECT count(*) as total_enquiry from `enquiry`";
                                    $result=mysqli_query($connect,$query);
                                    $data=mysqli_fetch_assoc($result);
                                    echo "<p class='counter'>$data[total_enquiry]</p>";
                                    ?>
                                    <h4 class="text-dark">Enquiries</h4>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End of row -->
                </div>
            </div>
        </div>
    </div>
</div>

	</section>
<?php
include("footer.php");
?>