<?php 
	session_start();
	$db = oci_connect('APARTMENT', 'house', 'localhost/XE');


	// initialize variables
	$RENT_ID = "";
	$BUILDING_ID = "";
	$FLAT_NO = "";
	$MEMBER_ID = "";
	$R_AMOUNT = "";
	$FACILITY_FEE = "";
	$PASSWORD = "";
	$update = false;

	if (isset($_POST['save'])) {
		$RENT_ID = $_POST['RENT_ID'];
		$BUILDING_ID = $_POST['BUILDING_ID'];
		$FLAT_NO = $_POST['FLAT_NO'];
		$MEMBER_ID = $_POST['MEMBER_ID'];
		$R_AMOUNT = $_POST['R_AMOUNT'];
		$FACILITY_FEE = $_POST['FACILITY_FEE'];
		$PASSWORD = $_POST['PASSWORD'];

		$a = oci_parse($db, "INSERT INTO RENTDB (RENT_ID, BUILDING_ID, FLAT_NO, MEMBER_ID, R_AMOUNT, FACILITY_FEE, PASSWORD) VALUES ('$RENT_ID', '$BUILDING_ID', '$FLAT_NO', '$MEMBER_ID', '$R_AMOUNT', '$FACILITY_FEE', '$PASSWORD')"); 
		oci_execute($a);
		$_SESSION['message'] = "DATA ADDED SUCCESSFULLY"; 
		header('location: MEMCOPY.php');
	}
    if (isset($_POST['update'])) {
		$RENT_ID = $_POST['RENT_ID'];
		$BUILDING_ID = $_POST['BUILDING_ID'];
		$FLAT_NO = $_POST['FLAT_NO'];
		$MEMBER_ID = $_POST['MEMBER_ID'];
		$R_AMOUNT = $_POST['R_AMOUNT'];
		$FACILITY_FEE = $_POST['FACILITY_FEE'];
		$PASSWORD = $_POST['PASSWORD'];
		
        $b=oci_parse($db, "UPDATE RENTDB SET RENT_ID='$RENT_ID', BUILDING_ID='$BUILDING_ID', FLAT_NO='$FLAT_NO', MEMBER_ID='$MEMBER_ID', R_AMOUNT='$R_AMOUNT', FACILITY_FEE='$FACILITY_FEE', PASSWORD='$PASSWORD' WHERE RENT_ID=$RENT_ID");
		oci_execute($b);
        $_SESSION['message'] = "DATA UPDATED SUCCESSFULLY"; 
        header('location: MEMCOPY.php');
    }
    if (isset($_GET['del'])) {
        $cid = $_GET['del'];
        $c = oci_parse($db, "DELETE FROM RENTDB WHERE RENT_ID=$cid");
		oci_execute($c);
        $_SESSION['message'] = "DATA DELETED SUCCESSFULLY"; 
        header('location: MemberInfo.php');
    }
?>