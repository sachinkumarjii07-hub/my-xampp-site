<?php
session_start();
include("header.php");
?>
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Editor <span>Login </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>Login</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
<div class="container my-5 myform">
    <?php
    if(isset($_GET['msg'])){
    echo "<div class='alert alert-info'>",$_GET['msg'],"</div>";
    }
    ?>
    <h1 class="text-center">Editor Login</h1>
    <form  method="post" >
        <div class="row my-3">
            <div class="col-md-2">
                <label >Email</label>
            </div>
            <div class="col-md-8">
                <input class="form-control" type="email" name="email" required>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-2">
                <label >Password</label>
            </div>
            <div class="col-md-8">
                <input class="form-control" type="password" name="password" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 ">
                <button class="btn btn-primary form-control" name="submit_btn">Login</button>
            </div>
        </div>
    </form>
</div>
<?php
    if(isset($_POST["submit_btn"])){
        $email=$_POST["email"];
        $password=md5($_POST["password"]);
        // echo $email, $password;
        include("config.php");
         $query="SELECT * from `Editor` where `email`='$email' and `password`='$password'";
         $result=mysqli_query($connect,$query);
        //  print_r($result);
        if(mysqli_num_rows($result)>0){
            $_SESSION["email"]=$email; //session created
            echo "<script>window.location.assign('index.php')</script>";
        }
        else{
            echo "<script>window.location.assign('Editor_login.php?msg=Please enter valid email or password!!')</script>";
        }
    }
?>
<?php
include("footer.php");
?>