<?php  include('FLATDB.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$cid = $_GET['edit'];
		$update = true;
		$record = oci_parse($db, "SELECT * FROM FLAT WHERE FLAT_NO=$cid");
		oci_execute($record);

		if($record){

			$n = oci_fetch_array($record);
			$FLAT_NO = $_POST['FLAT_NO'];
			$BATHROOM_COUNT = $_POST['BATHROOM_COUNT'];
			$BEDROOM_COUNT = $_POST['BEDROOM_COUNT'];
			$BUILDING_ID = $_POST['BUILDING_ID'];
			$RENTAL_PRICE = $_POST['RENTAL_PRICE'];
			
		}
		
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<head>
        <title>Flatdetails</title>
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
	<h1>FLAT DETAILS</h1>
	<form  method="POST" action="#">
		<input type="search" id="search" class="search_box" name="sea" placeholder="SEARCH BY FLAT_NO...">
		<button name="search" class="SBoyyy">SEARCH</button>
		<br> <br>
      </div>
    </form>
	<?php

         if (isset($_POST['search'])) {
	    	 $FLAT_NO=$_POST['sea'];
    
	    	 $sql = "SELECT * FROM FLAT WHERE FLAT_NO=$FLAT_NO";
	    	 $stid = oci_parse($db, $sql);
	    	 oci_execute($stid);
	    	
	    	while ($row=oci_fetch_array($stid)) {
	    		?>
	  
	<thead>
		<tr>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >FLAT_NO</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >BATHROOM_COUNT</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >BEDROOM_COUNT</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >RENTAL_PRICE</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >BUILDING_ID</th>
            <th class="SBoyyy" colspan="2" style="font-size:12px;color:blue;text-align: center;" >ACTION</th>		
        </tr>
	</thead>
	    		<td style="font-weight: bolder;"><?php echo $row['FLAT_NO']; ?></td>
	    		<td><?php echo $row['BATHROOM_COUNT']; ?></td>
	    		<td><?php echo $row['BEDROOM_COUNT']; ?></td>
	    		<td><?php echo $row['RENTAL_PRICE']; ?></td>
	    		<td><?php echo $row['BUILDING_ID']; ?></td>
	    		<td>
	    			<a href="FLATDB.php?del=<?php echo $row['FLAT_NO']; ?>" class="del_btn">EDIT</a>
			        <a href="FLATDB.php?del=<?php echo $row['FLAT_NO']; ?>" class="del_btn">DELETE</a>
			    </td>
	   
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

     <?php $results = oci_parse($db, "SELECT * FROM FLAT"); 
         oci_execute($results);  
     ?>
<table border="1" style="margin-left: 320px;">
	<thead>
		<tr>
		<h2 style="color: black;margin-left: 520px;">FLAT list! </h2>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >FLAT_NO</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >BATHROOM_COUNT</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >BEDROOM_COUNT</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >RENTAL_PRICE</th>
			<th class="SBoyyy"  style="font-size:12px;color:blue;text-align: center;" >BUILDING_ID</th>
			<th class="SBoyyy" colspan="2" style="font-size:12px;color:blue;text-align: center;" >ACTION</th>
		</tr>
	</thead>
    <?php while ($row = oci_fetch_array($results)) { ?>
		<tr>
			    <td style="font-weight: bolder;"><?php echo $row['FLAT_NO']; ?></td>
	    		<td><?php echo $row['BATHROOM_COUNT']; ?></td>
	    		<td><?php echo $row['BEDROOM_COUNT']; ?></td>
	    		<td><?php echo $row['RENTAL_PRICE']; ?></td>
	    		<td><?php echo $row['BUILDING_ID']; ?></td>
			
			
			<td>
				<a href="FLAT.php?del=<?php echo $row['FLAT_NO']; ?>" class="del_btn">EDIT</a>
				<a href="FLAT.php?del=<?php echo $row['FLAT_NO']; ?>" class="del_btn">DELETE</a>
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