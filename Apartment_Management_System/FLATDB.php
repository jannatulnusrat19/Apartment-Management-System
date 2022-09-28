<?php 
	session_start();
	$db = oci_connect('APARTMENT', 'house', 'localhost/XE');


	// initialize variables
	$FLAT_NO = "";
	$BATHROOM_COUNT = "";
	$BEDROOM_COUNT = "";
	$RENTAL_PRICE = "";
	$BUILDING_ID = "";
	
	$update = false;

	if (isset($_POST['save'])) {
		$FLAT_NO = $_POST['FLAT_NO'];
		$BATHROOM_COUNT = $_POST['BATHROOM_COUNT'];
		$BEDROOM_COUNT = $_POST['BEDROOM_COUNT'];
		$RENTAL_PRICE = $_POST['RENTAL_PRICE'];
		$BUILDING_ID = $_POST['BUILDING_ID'];


		$a = oci_parse($db, "INSERT INTO FLAT (FLAT_NO, BATHROOM_COUNT, BEDROOM_COUNT, RENTAL_PRICE, BUILDING_ID) VALUES ('$FLAT_NO', '$BATHROOM_COUNT', '$BEDROOM_COUNT', '$RENTAL_PRICE', '$BUILDING_ID)"); 
		oci_execute($a);
		$_SESSION['message'] = "DATA ADDED SUCCESSFULLY"; 
		header('location: FLAT.php');
	}
    if (isset($_POST['update'])) {
		$FLAT_NO = $_POST['FLAT_NO'];
		$BATHROOM_COUNT = $_POST['BATHROOM_COUNT'];
		$BEDROOM_COUNT = $_POST['BEDROOM_COUNT'];
		$RENTAL_PRICE = $_POST['RENTAL_PRICE'];
		$BUILDING_ID = $_POST['BUILDING_ID'];
	
		
        $b=oci_parse($db, "UPDATE FLAT SET FLAT_NO='$FLAT_NO', BATHROOM_COUNT='$BATHROOM_COUNT', BEDROOM_COUNT='$BEDROOM_COUNT', RENTAL_PRICE='$RENTAL_PRICE', BUILDING_ID='$BUILDING_ID'");
		oci_execute($b);
        $_SESSION['message'] = "DATA UPDATED SUCCESSFULLY"; 
        header('location: FLAT.php');
    }
    if (isset($_GET['del'])) {
        $cid = $_GET['del'];
        $c = oci_parse($db, "DELETE FROM FLAT WHERE FLAT_NO=$FLAT_NO");
		oci_execute($c);
        $_SESSION['message'] = "DATA DELETED SUCCESSFULLY"; 
        header('location: FLAT.php');/*Change req */
		
    }
?>