<?php
session_start();
if(!isset($_SESSION["email"])){
    echo "<script>window.location.assign('admin_login.php?msg=Please Login')</script>";
}
include("header.php");
?>
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Add <span>Category <?php echo $_SESSION["email"]?> </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>About</li>
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
    <h1 class="text-center">Add Category</h1>
    <form  method="post" enctype="multipart/form-data">
        <div class="row my-3">
            <div class="col-md-2">
                <label >Category Name</label>
            </div>
            <div class="col-md-8">
                <input class="form-control" type="text" name="category_name" required>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-2">
                <label >Image</label>
            </div>
            <div class="col-md-8">
                <input class="form-control" type="file" name="image" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 ">
                <button class="btn btn-primary form-control" name="submit_btn">Add</button>
            </div>
        </div>
    </form>
</div>
<?php
    if(isset($_POST["submit_btn"])){
       $category_name=$_POST["category_name"];
    //    echo $category_name;
       $image=$_FILES["image"] ;
       $img_name=$image["name"];
       $img_path=$image["tmp_name"];
       $new_name=rand().$img_name;
    //    echo $new_name;
    move_uploaded_file($img_path,"category_images/".$new_name);
    $connect=mysqli_connect("localhost","root","","sbbsu_project");
    $query="Insert into `category`(`category_name`,`category_image`)VALUES('$category_name','$new_name')";
    $result=mysqli_query($connect,$query);
    if($result>0){
        //url redirection
        echo "<script>window.location.assign('add_category.php?msg=Added Successfully')</script>";
    }
    else{
        echo "<script>window.location.assign('add_category.php?msg=Error while adding!!')</script>";
    }
    }

?>
<?php
include("footer.php");
?>