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
    }
     .SBoyyy1{
        font-family: "Audiowide", sans-serif;
        /*font-size: 100%;*/
        font-style: italic;
        font-weight: bolder;
        color: black;   
    }
 </style>
 <style> 
body {
  background-image: url("../photos/33.jpg");
  background-size: 100%;
}
</style>
</head>
<body>
<table border="1" width="100%">
<tr height="100px">
<td colspan="2">    
<span class="SBoyyy" style="font-size:40px;color:green"><b>A</b></span><span class="SBoyyy" style="font-size:25px">partment Management 
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
	$query = "SELECT * FROM manager";
                    $result = oci_parse($conn, $query);
                    oci_execute($result);
                    $row = oci_fetch_array($result, OCI_BOTH);
                    $num_rows = oci_num_rows($result);
                    
                    ?>
<table border="1">
			<tr>
                <h2 style="color: purple;">Available Managers of the system below: </h2>
				<td class="SBoyyy"  style="font-size:12px;color:blue" >ID</td>
				<td class="SBoyyy" style="font-size:12px;color:blue" >NAME </td>
				<td class="SBoyyy" style="font-size:12px;color:blue" >PHONE</td>
				<td class="SBoyyy" style="font-size:12px;color:blue" >SALARY</td>
				<td class="SBoyyy" style="font-size:12px;color:blue" >PASSWORD</td> 
				<td class="SBoyyy" style="font-size:12px;color:blue" >BUILDING ID</td>
			</tr>
<tr>

	<?php while($row =oci_fetch_array($result,OCI_BOTH)){ ?>

	<td><?=$row['MANAGER_ID']?></td>
	<td><?=$row['MANAGER_NAME']?></td>
	<td><?=$row['M_PHONE']?></td>
	<td><?=$row['M_SAL']?></td>
	<td><?=$row['PASSWORD']?></td> 
	<td><?=$row['BUILDING_ID']?></td>	
</tr>
<?php } ?>
</table>
<tr height="50px">
<td colspan="3"><Center> <li class="SBoyyy1"> CopyRight@Apartment Management 
System2022</li>  </Center> </td>
</tr>
</table>
</body>
</html>