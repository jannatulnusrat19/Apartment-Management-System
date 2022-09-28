<?php  include('RENTDB.php'); ?>



<!DOCTYPE html>
<html>
<head>
	<head>
        <title>RENT</title>
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
    .del_btn:hover {color: red;}
    .del_btn:hover {background: white}

 </style>
 <style> 
body {
  background-image: url("../photos/22.jpg");
  background-size: 150%;
}
</style>
</head>
	<title>MEMBER</title>
   
</head>
<body>
	<table border="1" width="100%">
<tr height="100px">
<td colspan="2">    
<span class="SBoyyy1" style="font-size:40px;color:green; margin-left: 20px;"><b>A</b></span><span class="SBoyyy1" style="font-size:25px">partment Management 
System</span> &nbsp &nbsp &nbsp 

<br>
                 <a href="PHome.php" class="del_btn" style="margin-left: 20px"> Home |   </a>
                 <a href="PHome.php" class="del_btn"> Back |   </a>
                 <a href="login.php" class="del_btn">  Logout </a>
                 
</td></tr>
    
     <?php if (isset($_SESSION['message'])): ?>
     	<div class="msg">
     		<?php 
     			echo $_SESSION['message']; 
     			unset($_SESSION['message']);
     		?>
     	</div>
     <?php endif ?>

     <?php $results = oci_parse($db, "SELECT * FROM RENTAL_VIEW"); 
         oci_execute($results);  
     ?>
<table border="1" style="margin-left: 500px;">
	<thead>
		<tr>
		<h2 style="color: black;margin-left: 540px;">RENTAL_VIEW! </h2>

			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >PAYEE NAME</th>
            <th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >RENT ID</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >FLAT NO</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >RENT AMOUNT</th>
		</tr>
	</thead>
    <?php while ($row = oci_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['MEMBER_NAME']; ?></td>
			<td style="font-weight: bolder;text-align: center"><?php echo $row['RENT_ID']; ?></td>
			<td style="font-weight: bolder;text-align: center"><?php echo $row['FLAT_NO']; ?></td>
			<td style="font-weight: bolder;text-align: center"><?php echo $row['R_AMOUNT']; ?></td>
			
			
		</tr>
	<?php } ?>
	
	
</table>

<br>
<tr height="50px" >
<td colspan="3"><Center> <li class="SBoyyy1"> CopyRight@Apartment Management 
System2022</li> </Center> </td>
</tr>
	
</body>
</html>