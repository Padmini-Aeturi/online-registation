<!DOCTYPE html>
<html>
    <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <title>form</title>
    </head>
<body>
    <?php
    include("connections.php");
    if(isset($_POST["CreateAccount"]))
    {   $id=$_POST["Id"];
        $name=$_POST["firstname"];
        $branch=$_POST["branch"];
        $email=$_POST["email"];
        $phonenumber=$_POST["front"].$_POST["phonenumber"];
        if($id=='' || $name=='' || $branch=='')
            echo "<div class='alert alert-danger'>Id name and branch are required fields</div>";
        else
        {
            $query="INSERT INTO information VALUES('$id','$name','$email','$phonenumber','$branch');";
            $query2="SELECT * from information WHERE Admission_No='$id';";
            $result=mysqli_query($conn,$query2);
            if(mysqli_num_rows($result)>0)
                echo "<div class='alert alert-danger'>Already registered record</div>";
            else if(mysqli_query($conn,$query))
                echo "<div class='alert alert-success'>Registered Successfully!</div>";
            else
             echo "<div class='alert alert-danger'>Error:".$query."<br>".mysqli_error($connection)."</div>";
        }
    }
            mysqli_close($connection);
?>
<div class="container">
<br>  
<hr>





<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p>
		<a href="https://www.twitter.com/" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="https://www.facebook.com/" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="Id" class="form-control" placeholder="Admission_No" type="text">
        <div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="firstname" class="form-control" placeholder="Full name" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select name="front" class="custom-select" style="max-width: 120px;">
		    <option selected="">+971</option>
            <option value="+91-">+91</option>
		    <option value="+972-">+972</option>
		    <option value="+198-">+198</option>
		    <option value="+701-">+701</option>
		</select>
    	<input name="phonenumber" class="form-control" placeholder="Phone number" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select class="form-control" name="branch">
			<option selected=""> Select Branch</option>
			<option>Computer science and Engineering</option>
			<option>Electronics Communication and Engineering</option>
			<option>Electrical Engineering</option>
            <option>Mechanical Engineering</option>
            <option>Civil Engineering</option>
            <option>Chemical Engineering</option>
		</select>
	</div> <!-- form-group end.// -->                                    
    <div class="form-group">
        <button type="submit" name="CreateAccount" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->                                                                    
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

<br><br>
    </body>
</html>