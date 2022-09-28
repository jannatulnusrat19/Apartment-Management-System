<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
<style>
      .SBoyyy{
        font-family: "Audiowide", sans-serif;
        /*font-size: 100%;*/
        font-style: italic;
        font-weight: bolder;
        color: black;  
        background: white; 
    }
    .SBoyyy1{
        font-family: "Audiowide", sans-serif;
        /*font-size: 100%;*/
        font-style: italic;
        font-weight: bolder;
        color: black;   
    }
    .SBoyyy:hover {color: 9932CC;}
    .SBoyyy:hover {background: white}
 </style>
 <style> 
body {
  background-image: url("../photos/22.jpg");
  background-size: 100%;
}
</style>
</head>
<body>
<table border="1" width="100%">
<tr height="100px">
<td colspan="2">    
<span class="SBoyyy1" style="font-size:40px;color:green"><b>A</b></span><span class="SBoyyy1" style="font-size:25px">partment Management 
System</span> &nbsp &nbsp &nbsp 

<br>
                 <a href="PHome.php"> Home |   </a>
                 <a href="PHome.php"> Back |   </a>
                 <a href="login.php">  Logout </a>
                 
</td></tr>




<?php
    $db_username = "APARTMENT";
    $db_password = "house";
    $connection_string="localhost/xe";
    $conn=oci_connect($db_username, $db_password, $connection_string);
	                $query = "SELECT * FROM member";
                    $result = oci_parse($conn, $query);
                    oci_execute($result);
                    $row = oci_fetch_array($result, OCI_BOTH);
                    $num_rows = oci_num_rows($result);
                    
?>
<table border="1" style="margin-left: 450px;">
    <div style="text-align: center;">
    <h1>MEMBER DATA</h1>
    <form  method="POST" action="#">
        <input type="search" id="search" class="search_box" name="sea" placeholder="SEARCH BY ID...">
        <button name="search" class="SBoyyy">SEARCH</button>
    </form>
    </div>

			<tr>
                <h2 style="color: black;margin-left: 520px;">Current Member list! </h2>
				<td class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >ID</td>
				<td class="SBoyyy" style="font-size:12px;color:blue;text-align: center; text-decoration-style: solid;" >NAME </td>
				<td class="SBoyyy" style="font-size:12px;color:blue;text-align: center;" >PHONE</td>
				<td class="SBoyyy" style="font-size:12px;color:blue; text-align: center;" >EMAIL</td>
				<!--<td class="SBoyyy" style="font-size:12px;color:blue" >PASSWORD</td> -->
				<td class="SBoyyy" style="font-size:12px;color:blue;text-align: center;" >FLAT_NO</td>
			</tr>

<tr>

	<?php while($row =oci_fetch_array($result,OCI_BOTH)){ ?>

	<td><?=$row['MEMBER_ID']?></td>
	<td><?=$row['MEMBER_NAME']?></td>
	<td><?=$row['PHONE']?></td>
	<td><?=$row['EMAIL']?></td>
	<!-- <td><?=$row['PASSWORD']?></td> -->
	<td><?=$row['FLAT_NO']?></td>	
</tr>
<?php } ?>
</table>
<br>
<tr height="50px" >
<td colspan="3"><Center> <li class="SBoyyy1"> CopyRight@Apartment Management 
System2022</li> </Center> </td>
</tr>
</table>
</body>
</html>