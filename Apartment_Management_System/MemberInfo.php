<?php  include('MEMDB.php'); ?>



<!DOCTYPE html>
<html>
<head>
	<head>
        <title>Member</title>
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
    <table border="1" style="margin-left: 420px;">
    <div style="text-align: center;">
	<h1>MEMBER DATA</h1>
	<form  method="POST" action="#">
		<input type="search" id="search" class="search_box" name="sea" placeholder="SEARCH BY ID...">
		<button name="search" class="SBoyyy">SEARCH</button>
		<br> <br>
      </div>
    </form>
	<?php

         if (isset($_POST['search'])) {
	    	 $MEMBER_ID=$_POST['sea'];
    
	    	 $sql = "SELECT * FROM MEMBER WHERE MEMBER_ID=$MEMBER_ID order by MEMBER_ID ASC";
	    	 $stid = oci_parse($db, $sql);
	    	 oci_execute($stid);
	    	
	    	while ($row=oci_fetch_array($stid)) {
	    		?>
	  
	<thead>
		<tr>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >ID</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >NAME</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >PHONE</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >EMAIL</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >FLAT NO</th>
			<th colspan="2" class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >ACTION</th>
		</tr>
	</thead>
	    		<td style="font-weight: bolder;"><?php echo $row['MEMBER_ID']; ?></td>
	    		<td><?php echo $row['MEMBER_NAME']; ?></td>
	    		<td><?php echo $row['PHONE']; ?></td>
	    		<td><?php echo $row['EMAIL']; ?></td>
	    		<td><?php echo $row['FLAT_NO']; ?></td>
			    <td><a href="MEMDB.php?del=<?php echo $row['MEMBER_ID']; ?>" class="del_btn">DELETE</a></td>
	   
	    		<?php
	        }
	    	
	    	
	    }
	
	?>
</table>
     <?php if (isset($_SESSION['message'])): ?>
     	<div class="msg">
     		<?php 
     			echo $_SESSION['message']; 
     			unset($_SESSION['message']);
     		?>
     	</div>
     <?php endif ?>

     <?php $results = oci_parse($db, "SELECT * FROM MEMBER"); 
         oci_execute($results);  
     ?>
<table border="1" style="margin-left: 420px;">
	<thead>
		<tr>
		<h2 style="color: black;margin-left: 520px;">Current Member list! </h2>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >ID</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >NAME</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >PHONE</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >EMAIL</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >FLAT NO</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >ACTION</th>
		</tr>
	</thead>
    <?php while ($row = oci_fetch_array($results)) { ?>
		<tr>
			<td style="font-weight: bolder;"><?php echo $row['MEMBER_ID']; ?></td>
			<td><?php echo $row['MEMBER_NAME']; ?></td>
			<td><?php echo $row['PHONE']; ?></td>
			<td><?php echo $row['EMAIL']; ?></td>
			<td><?php echo $row['FLAT_NO']; ?></td>
			
			
			<td>
				<a href="MEMDB.php?del=<?php echo $row['MEMBER_ID']; ?>" class="del_btn">DELETE</a>
			</td>
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