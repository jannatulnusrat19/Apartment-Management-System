<html>
<head>
	<title>Login</title>

<head>
	<title>Login Admin</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="css/owl.theme.default.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<style>
		.SBoyyy{
        font-family: "Audiowide", sans-serif;
        font-style: italic;
        font-weight: bolder;
        color: black;
		
    }
	.submit{
		/* position: absolute; */
		top: 55%;
		left: 55%;
		width: 25%;
		height: 25px;
		border: 2px solid;
		background: #9932CC;
        border-radius: 25px;
        font-size: 15px;
        color: whitesmoke;
        font-weight: 700;
        cursor: pointer;
        outline: none;
		
	}
	.alert{
		color: red;
		text-decoration-style: double;
	}
.submit:hover {color: 9932CC;}
.submit:hover {background: white}
</style>
<style> 
body {
  background-image: url("../photos/l.png");
  background-size: 100%;
}
</style>
</head>

<body>
	<Center> <span class="SBoyyy" style="font-size:40px;color:green"><b>A</b></span><span class="SBoyyy" style="font-size:25px">partment Management 
System</span> &nbsp &nbsp &nbsp 
</Center> 



<?php
	$db_username = "APARTMENT";
	$db_password = "house";
	$connection_string="localhost/xe";
	$conn=oci_connect($db_username, $db_password, $connection_string);

	if($conn)
	{
		if(isset($_POST['submit']))
		{
			if(isset($_POST['MANAGER_ID']) && isset($_POST['PASSWORD']))
			{
				$MANAGER_ID = $_POST['MANAGER_ID'];
				$PASSWORD = $_POST['PASSWORD'];

				$query = "SELECT * FROM manager WHERE (MANAGER_ID = '$MANAGER_ID' AND PASSWORD = '$PASSWORD')";
				$result = oci_parse($conn, $query);
				oci_execute($result);
				$row = oci_fetch_array($result, OCI_BOTH);
				$num_rows = oci_num_rows($result);
				if($num_rows == 1)
				{
					header('location: PHome.php?msg=null');
				}
				else
				{
					echo "<div class='alert'>Invalid username or password!</div>";
				}
			}


			echo "<br><br>";
		}
	}
	else
	{
		echo "<div class='alert'>Connection Failed!</div>";
	}
	/*PHP END PAGE DESIGN START*/	
?>


	<form method="POST" action="">
		<fieldset>
			<legend class="SBoyyy">Manager Login</legend>
			<label class="SBoyyy"for="MANAGER_ID">MANAGER ID</label><br>
			<input type="text" name="MANAGER_ID">
			<br><br>
			<label class="SBoyyy" for="PASSWORD">Password</label><br>
			<input type="PASSWORD" name="PASSWORD">
			<br><br>
			<input class="submit" type="submit" name="submit" id="submit-btn" value="Login">
			<input class="submit" type="reset" name="submit" id="submit-btn" value="Reset">
			  <br> <br>
			  </td>
		</fieldset>
	</form>












	<div class="brand-carousel owl-carousel">
		
		<div class="box"><img alt="" src="../photos/11.jpg"></div>
		<div class="box"><img alt="" src="../photos/22.jpg"></div>
		<div class="box"><img alt="" src="../photos/33.jpg"></div>
		<div class="box"><img alt="" src="../photos/44.jpg"></div>
		<div class="box"><img alt="" src="../photos/55.jpg"></div>
		<div class="box"><img alt="" src="../photos/66.jpg"></div>
	
	</div>
	<!-- 1st row picture add design -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
	</script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
	</script> 
	<script>
	       $('.brand-carousel').owlCarousel({
	           loop:true,
	           margin:10,
	           autoplay:true,
	           responsive:{
	               0:{
	                   items:1
	               },
	               600:{
	                   items:3
	               },
	               1000:{
	                   items:5
	               }
	           }
	       })
	</script>
</body>
</html>
 <tr height="50px">
                <td colspan="3"><li class="SBoyyy"> CopyRight@Apartment Management 
System2022</li> </td>
            </tr>